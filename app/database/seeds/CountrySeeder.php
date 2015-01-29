<?php
use TopAppNinja\Entities\Country;

class CountrySeeder extends Seeder{
	public function run(){
		DB::table('countries') -> delete();

		$data = array('CountryName' => 'Australia');

		Country::create($data);
	}
}