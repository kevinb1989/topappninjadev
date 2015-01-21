<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProsCreativefieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create Pros_CreativeFields table
		Schema::create('Pros_CreativeFields', function($table){
			$table -> integer('ProfessionalID') -> unsigned();
			$table -> integer('CreativeFieldID') -> unsigned();
			$table -> primary(array('ProfessionalID', 'CreativeFieldID'));
		});

		Schema::table('Pros_CreativeFields', function($table){
			$table -> foreign('ProfessionalID') -> references('ID') -> on('Professionals');
			$table -> foreign('CreativeFieldID') -> references('ID') -> on('CreativeFields');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//drop Pros_CreativeFields table
		Schema::drop('Pros_CreativeFields');
	}

}
