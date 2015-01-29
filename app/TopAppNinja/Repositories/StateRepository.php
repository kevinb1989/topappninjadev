<?php
namespace TopAppNinja\Repositories;
use TopAppNinja\Entities\Country;

class StateRepository implements StateRepositoryInterface{

	public function getAllStatesByCountryID($pCountryID){
		return Country::find($pCountryID) -> states;
	}
}