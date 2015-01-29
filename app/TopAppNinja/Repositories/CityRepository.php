<?php
namespace TopAppNinja\Repositories;
use TopAppNinja\Entities\Country;

class CityRepository implements CityRepositoryInterface{

	public function getAllCitiesByCountryID($pCountryID){

		return Country::find($pCountryID) -> cities;

	}

}