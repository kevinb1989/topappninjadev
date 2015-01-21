<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToProfessionalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//add foreign keys to professionals table
		Schema::table('Professionals', function($table){
			//firstly, set CityID column to unsigned
			DB::statement('ALTER TABLE Professionals MODIFY CityID INTEGER UNSIGNED NULL;');
			//now add the foreign keys
			$table -> foreign('CityID') -> references('ID') -> on('Cities');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//drop foreign keys
		Schema::table('Professionals', function($table){
			$table -> dropForeign('Professionals_CityID_foreign');
		});
	}

}
