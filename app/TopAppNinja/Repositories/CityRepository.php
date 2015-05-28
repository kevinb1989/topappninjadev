<?php
namespace TopAppNinja\Repositories;
use TopAppNinja\Entities\Country;
use TopAppNinja\Repositories\CountryRepo;

class CityRepository implements CityRepositoryInterface{

	public function __construct(Country $country){
		$this -> country = $country;
	}

	public function getAllCitiesByCountryID($pCountryID){

		return $this -> country -> find($pCountryID) -> cities;

	}

}