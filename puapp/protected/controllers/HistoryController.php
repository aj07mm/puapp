<?php

class HistoryController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','all','score'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{

		$pua = Pua::model()->findByAttributes(array(
			'user_id'=>Yii::app()->user->getId()
		));

		$model = History::model()->findByAttributes(array(
			'date'=>date('Y-m-d'),
			'pua_id'=>$pua->id));

		if(is_null($model)){
			$model = new History;
		}
			

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);



		if(isset($_POST['History']))
		{
			
			$model->attributes=$_POST['History'];

			$model->date = date('Y-m-d');

			$pua = Pua::model()->findByAttributes(array(
				'user_id'=>Yii::app()->user->getId()
			));

			$model->pua_id = $pua->id;

			if($model->save())
				$this->redirect(array('site/index'));
		}


		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['History']))
		{
			$model->attributes=$_POST['History'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('History');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}


	public function actionAll(){

		$number_of_days_from_now = $_REQUEST['days_from_now'];
		$now = time();

		$arr_days = array();
		
		$i = 0;
		while($i <> $number_of_days_from_now){
			$str_stamp = "- $i day";
			$date = date('Y-m-d',strtotime($str_stamp,$now));
			$arr_days[$date] = 0;
			$i ++;
		}

		$historico = History::model()->findAll();
		$allPuas = Pua::model()->findAll();

		$pua_history = array();
		
		foreach($allPuas as $pua){
			$pua_history[$pua->alias] = $arr_days;	
			foreach($historico as $dia){
				if($dia->pua_id == $pua->id)
					$pua_history[$pua->alias][$dia->date] = $dia->num_de_sets;			
			}
		}
	
		foreach($pua_history as $key => $pua){
			$pua_history[$key] = array_values($pua_history[$key]);
		}

		$pua_history[] = array_values($arr_days);
		
		echo json_encode($pua_history);

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new History('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['History']))
			$model->attributes=$_GET['History'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return History the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=History::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param History $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='history-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
