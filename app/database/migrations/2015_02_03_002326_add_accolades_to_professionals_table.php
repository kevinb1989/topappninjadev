<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAccoladesToProfessionalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//add accolades to professionals table
		DB::statement('')
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//drop accolades column from professionals table
		Schema::table('professionals', function($table){
			$table -> dropColumn('Accolades');
		});
	}

}
