<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToPortfoliosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Portfolios', function($table){
			//first, set columns that are foreign keys to unsigned
			DB::statement('ALTER TABLE Portfolios MODIFY ProfessionalID INTEGER UNSIGNED NULL;');
			DB::statement('ALTER TABLE Portfolios MODIFY SpecializationID INTEGER UNSIGNED NULL;');

			//then, add foreign keys to Portfolios table
			$table -> foreign('ProfessionalID') -> references('ID') -> on('Professionals');
			$table -> foreign('SpecializationID') -> references('ID') -> on('Specializations');
		});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//drop foreign keys in portfolios table
		Schema::table('Portfolios', function($table){
			$table -> dropForeign('portfolios_professionalid_foreign');
			$table -> dropForeign('portfolios_specializationid_foreign');
		});
	}

}
