<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimestampsToProsSpecsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//add timestamps to pros_specs table
		Schema::table('pros_specs', function($table){
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
		//drop timestamps fields from pros_specs table
		Schema::table('pros_specs', function($table){
			$table -> dropTimestamps();
		});
	}

}
