<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStateidAndForeignKeyToCitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//add StateID field and create foreign key to cities table
		Schema::table('Cities', function($table){
			$table -> integer('StateID') -> unsigned();
			$table -> foreign('StateID') -> references('ID') -> on('States');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//drop column and foreign key stateid
		Schema::table('Cities', function($table){
			$table -> dropForeign('cities_stateid_foreign');
			$table -> dropColumn('StateID');
		});
	}

}
