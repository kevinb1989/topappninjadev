<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create states table
		Schema::create('States', function($table){
			$table -> increments('ID');
			$table -> string('StateName', 100);
			$table -> integer('CountryID') -> unsigned();
		});

		//add a foreign key
		Schema::table('States', function($table){
			$table -> foreign('CountryID') -> references('ID') -> on('Countries');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//drop states table
		Schema::drop('States');
	}

}
