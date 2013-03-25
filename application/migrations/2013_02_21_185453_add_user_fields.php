<?php

class Add_User_Fields {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table)
        {
        	$table->string('second_major')->nullable();
        	$table->string('minor')->nullable();
        	$table->string('second_minor')->nullable();
        	$table->string('graduated');
            $table->boolean('alumni');
        });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
		{
			$table->drop_column('second_major');
        	$table->drop_column('minor');
       		$table->drop_column('second_minor');
       		$table->drop_column('graduated');
        	$table->drop_column('alumni');	
		});
	
	}

}