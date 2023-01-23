<?php

class m230122_145603_create_popup_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('popup', array(
            'id' => 'pk',
            'body' => 'string NOT NULL',
            'is_active' => 'boolean',
			'counter' => 'integer DEFAULT 0',
        ));
	}

	public function down()
	{
		$this->dropTable('popup');
        return true;
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