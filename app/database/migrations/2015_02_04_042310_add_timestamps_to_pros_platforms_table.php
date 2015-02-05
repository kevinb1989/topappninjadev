<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimestampsToProsPlatformsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//add timestamps to pros_platform table
		Schema::table('pros_platforms', function($table){
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
		//drop timestamps fields from pros_platforms table
		Schema::table('pros_platforms', function($table){
			$table -> dropTimestamps();
		});
	}

}
