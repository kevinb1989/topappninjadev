<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreativeFieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create creative fields table
		Schema::create('CreativeFields', function($table){
			$table -> increments('ID');
			$table -> string('CreativeFieldName', 100);
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
		//drop creative fields table
		Schema::drop('CreativeFields');
	}

}
