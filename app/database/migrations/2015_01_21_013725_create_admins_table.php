<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create admins table
		Schema::create('Admins', function($table){
			$table -> increments('ID');
			$table -> string('Email', 100);
			$table -> string('Password', 200);
			$table -> string('MobileNumber', 20);
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
		//drop admins table
		Schema::drop('Admins');
	}

}
