<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProsSpecsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create pros_specs table
		Schema::create('Pros_Specs', function($table){
			$table -> integer('ProfessionalID') -> unsigned();
			$table -> integer('SpecializationID') -> unsigned();
			$table -> primary(array('ProfessionalID', 'SpecializationID'));
		});

		Schema::table('Pros_Specs', function($table){
			//adding foreign keys to Pros_Specs table
			$table -> foreign('ProfessionalID') -> references('ID') -> on('Professionals');
			$table -> foreign('SpecializationID') -> references('ID') -> on('Specializations');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//drop Pros_Specs table
		Schema::drop('Pros_Specs');
	}

}
