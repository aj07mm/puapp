<?php

class m140613_122228_user extends CDbMigration
{
	public function up()
	{
		 $this->createTable('user', array(
            'id' => 'pk',
            'login' => 'string NOT NULL',
            'password' => 'text',
            'last_login' => 'datetime'
        ));
	}

	public function down()
	{
		$this->dropTable('user');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}