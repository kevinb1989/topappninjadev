<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScreenshotsTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create screenshots table
		Schema::create('Screenshots', function($table){
			$table -> increments('ID');
			$table -> string('ScreenshotName', 100);
			$table -> string('ScreenshotURL', 200);
			$table -> integer('PortfolioID') -> references('ID') -> on('Portfolios');
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
		//drop screenshots table
		Schema::drop('screenshots');
	}

}
