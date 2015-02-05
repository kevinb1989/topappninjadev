<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetColumnsToNullableInProfessionalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//set some columns to nullable in professionals table
		DB::statement('ALTER TABLE professionals MODIFY COLUMN PostCode VARCHAR(10) NULL;');
		DB::statement('ALTER TABLE professionals MODIFY COLUMN ContactNo VARCHAR(20) NULL;');
		DB::statement('ALTER TABLE professionals MODIFY COLUMN ProfessionalType TINYINT(1) NULL;');
		DB::statement('ALTER TABLE professionals MODIFY COLUMN Description VARCHAR(500) NULL;');
		DB::statement('ALTER TABLE professionals MODIFY COLUMN Logo VARCHAR(200) NULL;');
		DB::statement('ALTER TABLE professionals MODIFY COLUMN PriceRangeBottom INT(11) NULL;');
		DB::statement('ALTER TABLE professionals MODIFY COLUMN PriceRangeTop INT(11) NULL;');
		DB::statement('ALTER TABLE professionals MODIFY COLUMN Views INT(11) NULL;');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
