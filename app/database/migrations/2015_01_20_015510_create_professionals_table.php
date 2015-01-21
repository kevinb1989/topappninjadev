<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create professionals table
		Schema::create('Professionals', function($table){
			$table -> increments('ID');
			$table -> string('FirstName', 100);
			$table -> string('LastName', 100);
			$table -> string('Email', 100);
			$table -> string('Password', 200);
			$table -> string('Address', 100);
			$table -> string('PostCode', 10);
			$table -> integer('CityID') -> references('ID') -> on ('Cities');
			$table -> string('ContactNo', 20);
			$table -> boolean('ProfessionalType');
			$table -> string('CompanyName', 100) -> nullable();
			$table -> string('CompanyURL', 200) -> nullable();
			$table -> string('Description', 500);
			$table -> string('Logo', 200);
			$table -> string('Facebook', 200) -> nullable();
			$table -> string('Twitter', 200) -> nullable();
			$table -> string('GooglePlus', 200) -> nullable();
			$table -> string('LinkedIn', 200) -> nullable();
			$table -> string('Behance', 200) -> nullable();
			$table -> string('Pinterest', 200) -> nullable();
			$table -> string('Blog', 200) -> nullable();
			$table -> integer('PriceRangeBottom');
			$table -> integer('PriceRangeTop');
			$table -> integer('Views');
			$table -> rememberToken();
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
		//drop professionals table
		Schema::drop('professionals');
	}

}
