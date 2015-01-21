<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToScreenshotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Screenshots', function($table){
			//first set the PortfolioID column to unsigned
			DB::statement('ALTER TABLE Screenshots MODIFY PortfolioID INTEGER UNSIGNED NULL;');

			//now add the foreign key referencing Portfolios table
			$table -> foreign('PortfolioID') -> references('ID') -> on('Portfolios');

		});
		

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//drop the foreign key referencing Portfolios table
		Schema::table('Screenshots', function($table){
			$table -> dropForeign('screenshots_portfolioid_foreign');
		});

	}

}
