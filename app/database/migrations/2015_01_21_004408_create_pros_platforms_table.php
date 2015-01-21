<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProsPlatformsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create Pros_Platforms table
		Schema::create('Pros_Platforms', function($table){
			$table -> integer('ProfessionalID') -> unsigned();
			$table -> integer('PlatformID') -> unsigned();

			$table -> primary(array('ProfessionalID', 'PlatformID'));
		});

		Schema::table('Pros_Platforms', function($table){
			$table -> foreign('ProfessionalID') -> references('ID') -> on('Professionals');
			$table -> foreign('PlatformID') -> references('ID') -> on('Platforms');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//drop Pros_Platforms table
		Schema::drop('Pros_Platforms');
	}

}
