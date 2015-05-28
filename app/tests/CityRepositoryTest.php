<?php
use TopAppNinja\Repositories\CityRepository;

class CityRepositoryTest extends PHPUnit_Framework_TestCase{

	public function setUp(){
		$this -> mock = Mockery::mock('TopAppNinja\Entities\Country');
	}

	public function test_get_all_cities_by_country_id(){
		$this -> mock -> shouldReceive('find') 
			-> with(3)
			-> once();

		$repo = new CityRepository($this -> mock);
		$repo -> getAllCitiesByCountryID(3);
	}

	public function tearDown(){
		Mockery::close();
	}
	
}