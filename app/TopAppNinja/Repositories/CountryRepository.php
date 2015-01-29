<?php
namespace TopAppNinja\Repositories;
use TopAppNinja\Entities\Country;

class CountryRepository implements CountryRepositoryInterface{

	public function getAllCountries(){
		return Country::all();
	}

}