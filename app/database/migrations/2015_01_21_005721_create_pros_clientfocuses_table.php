<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProsClientfocusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create Pros_ClientFocuses table
		Schema::create('Pros_ClientFocuses', function($table){
			$table -> integer('ProfessionalID') -> unsigned();
			$table -> integer('ClientFocusID') -> unsigned();

			$table -> primary(array('ProfessionalID', 'ClientFocusID'));
		});

		Schema::table('Pros_ClientFocuses', function($table){
			$table -> foreign('ProfessionalID') -> references('ID') -> on('Professionals');
			$table -> foreign('ClientFocusID') -> references('ID') -> on('ClientFocuses');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//drop Pros_ClientFocuses table
		Schema::drop('Pros_ClientFocuses');
	}

}
