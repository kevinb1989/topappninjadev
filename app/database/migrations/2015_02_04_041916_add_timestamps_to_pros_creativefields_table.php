<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimestampsToProsCreativefieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//add timestamps to pros_creativefields table
		Schema::table('pros_creativefields', function($table){
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
		//drop timestamps fields from pros_creativefields table
		Schema::table('pros_creativefields', function($table){
			$table -> dropTimestamps();
		});
	}

}
