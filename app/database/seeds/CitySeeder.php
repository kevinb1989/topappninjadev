<?php
use TopAppNinja\Entities\City;

class CitySeeder extends Seeder{
	public function run(){
		DB::table('cities') -> delete();

		$data = array(
				array('CityName' => 'Adelaide',
					'StateID' => '1'),
				array('CityName' => 'Brisbane',
					'StateID' => '2'),
				array('CityName' => 'Darwin',
					'StateID' => '3'),
				array('CityName' => 'Hobart',
					'StateID' => '4'),
				array('CityName' => 'Melbourne',
					'StateID' => '5'),
				array('CityName' => 'Perth',
					'StateID' => '6'),
				array('CityName' => 'Sydney',
					'StateID' => '7'),
			);

		DB::table('cities') -> insert($data);
	}
}