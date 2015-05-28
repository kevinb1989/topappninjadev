<?php
use TopAppNinja\Repositories\CityRepositoryInterface;

class CitiesController extends \BaseController {

	/**
	 * inject an instance of CityRepository
	 *
	 * @return void
	 */
	public function __construct(CityRepositoryInterface $cityRepo){
		$this -> cityRepo = $cityRepo;
	}

	/**
	 * Load all cities from a specific country.
	 *
	 * @return Collection
	 */
	public function getAllCitiesByCountryID()
	{
		//retrieve the country ID
		$pCountryID = Input::get('country_id');

		$cities = $this -> cityRepo -> getAllCitiesByCountryID($pCountryID);

		return json_encode($cities);
	}

}
