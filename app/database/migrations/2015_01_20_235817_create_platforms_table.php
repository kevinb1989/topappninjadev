<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatformsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create platforms table
		Schema::create('Platforms', function($table){
			$table -> increments('ID');
			$table -> string('PlatformName', 100);
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
		//drop platforms table
		Schema::drop('Platforms');
	}

}
