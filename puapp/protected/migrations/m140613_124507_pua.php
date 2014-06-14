<?php

class m140613_124507_pua extends CDbMigration
{
	public function up()
	{
		 $this->createTable('pua', array(
		 	'id' => 'pk',
            'user_id' => 'integer',
            'alias' => 'string NOT NULL',
            'pontuation' => 'text',
            'photo' => 'text'
        ));

		$this->execute("alter table pua add constraint user_id foreign key(user_id) references user(id);");
	}

	public function down()
	{
		$this->dropTable('pua');
	}

}