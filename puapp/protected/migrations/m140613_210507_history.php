<?php

class m140613_210507_history extends CDbMigration
{
	public function up()
	{

		 $this->createTable('history', array(
		 	'id' => 'pk',
		 	'pua_id' => 'integer',
            'date' => 'datetime',
            'status' => 'string NOT NULL',
            'comentario' => 'text'
        ));

		$this->execute("alter table pua add constraint pua_id foreign key(user_id) references pua(id);");
	}

	public function down()
	{
		$this->dropTable('history');
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