<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimestampsToProsClientfocusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//add timestamps to pros_clientfocuses table
		Schema::table('pros_clientfocuses', function($table){
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
		//drop timestamps fields from pros_clientfocuses table
		Schema::table('pros_clientfocuses', function($table){
			$table -> dropTimestamps();
		});
	}

}
