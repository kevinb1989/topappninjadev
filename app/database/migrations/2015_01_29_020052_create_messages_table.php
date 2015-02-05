<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create messages table
		Schema::create('Messages', function($table){
			$table -> increments('ID');
			$table -> string('Email', 100);
			$table -> string('PhoneNumber', 20);
			$table -> string('Message', 500);
			$table -> integer('ProfessionalID') -> unsigned();
			$table -> timestamps();
		});

		Schema::table('Messages', function($table){
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
		//drop messages table
		Schema::drop('Messages');
	}

}
