<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainclientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create MainClients table
		Schema::create('MainClients', function($table){
			$table -> increments('ID');
			$table -> string('MainClientName', 100);
			$table -> integer('ProfessionalID') -> unsigned();
			$table -> timestamps();
		});

		Schema::table('MainClients', function($table){
			$table -> foreign('ProfessionalID') -> references('ID') -> on('Professionals');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//drop MainClients table
		Schema::drop('MainClients');
	}

}
