<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientfocusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create clientfocuses table
		Schema::create('ClientFocuses', function($table){
			$table -> increments('ID');
			$table -> string('ClientFocusName', 100);
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
		//drop ClientFocuses table
		Schema::drop('ClientFocuses');
	}

}
