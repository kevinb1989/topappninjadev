<?php
use TopAppNinja\Entities\State;

class StateSeeder extends Seeder{
	public function run(){
		DB::table('states') -> delete();

		$data = array(
				array('StateName' => 'South Australia',
					'CountryID' => '3'),
				array('StateName' => 'Queensland',
					'CountryID' => '3'),
				array('StateName' => 'Northern Territory',
					'CountryID' => '3'),
				array('StateName' => 'Tasmania',
					'CountryID' => '3'),
				array('StateName' => 'Victoria',
					'CountryID' => '3'),
				array('StateName' => 'Western Australia',
					'CountryID' => '3'),
				array('StateName' => 'New South Wales',
					'CountryID' => '3'),
			);

		DB::table('states') -> insert($data);
	}
}