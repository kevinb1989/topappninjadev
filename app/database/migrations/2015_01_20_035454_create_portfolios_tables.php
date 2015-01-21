<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create portfolios table
		Schema::create('Portfolios', function($table){
			$table -> increments('ID');
			$table -> integer('ProfessionalID') -> references('ID') -> on('Professionals');
			$table -> string('AppURL', 200);
			$table -> string('AppName', 100);
			$table -> integer('SpecializationID') -> references('ID') -> on('Specializations');
			$table -> string('VideoURL', 200);
			$table -> string('Description', 500);
			$table -> string('IconURL', 200);
			$table -> integer('NumOfViews') -> nullable();
			$table -> integer('NumOfLikes') -> nullable();
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
		//drop portfolios table
		Schema::drop('Portfolios');
	}

}
