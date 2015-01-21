<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecializationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create specializations table
		Schema::create('Specializations', function($table){
			$table -> increments('ID');
			$table -> string('SpecializationName', 200);
			$table -> timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//drop specializations table
		Schema::drop('Specializations');
	}

}
