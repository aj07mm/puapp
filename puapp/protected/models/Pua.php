<?php

/**
 * This is the model class for table "pua".
 *
 * The followings are the available columns in table 'pua':
 * @property integer $user_id
 * @property string $alias
 * @property string $pontuation
 * @property string $photo
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Pua extends User
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pua';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alias', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('alias', 'length', 'max'=>255),
			array('pontuation, photo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('alias, photo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'alias' => 'Nickname',
			'pontuation' => 'Pontuation',
			'photo' => 'Photo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('pontuation',$this->pontuation,true);
		$criteria->compare('photo',$this->photo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pua the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}