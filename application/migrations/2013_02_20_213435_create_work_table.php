<?php

class Create_Work_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('work', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('salary')->nullable();
			$table->string('company');
			$table->string('city');
			$table->string('position');
			$table->string('started');
			$table->string('ended');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('work');
	}

}