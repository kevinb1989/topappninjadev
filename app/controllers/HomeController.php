<?php
use TopAppNinja\Repositories\SpecializationRepositoryInterface;
use TopAppNinja\Repositories\CountryRepositoryInterface;
use TopAppNinja\Repositories\CityRepositoryInterface;
use TopAppNinja\Repositories\CreativeFieldRepositoryInterface;
use TopAppNinja\Repositories\PlatformRepositoryInterface;
use TopAppNinja\Repositories\ProfessionalRepositoryInterface;


class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	/**
	*	constructor: injecting repositories of specializations, countries, cities, 	creative fields, platforms and professionals
	*
	*	@param SpecializationRepositoryInterface specializationRepo
	*	@param CountryRepositoryInterface countryRepo
	*	@param CityRepositoryInterface cityRepo
	*	@param CreativeFieldRepositoryInterface creativeFieldRepo
	*	@param platformRepositoryInterface platformRepo
	*	@param professionalRepositoryInterface professionalRepo
	*	@return void
	*/
	public function __construct(SpecializationRepositoryInterface $specializationRepo,
		CountryRepositoryInterface $countryRepo,
		CityRepositoryInterface $cityRepo,
		CreativeFieldRepositoryInterface $creativeFieldRepo,
		PlatformRepositoryInterface $platformRepo,
		ProfessionalRepositoryInterface $professionalRepo){

		$this -> specializationRepo = $specializationRepo;
		$this -> countryRepo = $countryRepo;
		$this -> cityRepo = $cityRepo;
		$this -> creativeFieldRepo = $creativeFieldRepo;
		$this -> platformRepo = $platformRepo;
		$this -> professionalRepo = $professionalRepo;

	}

	/**
	*	Load all specializations, countries, creative fields, platforms and professionals
	*	to the search panel for the purpose of searching. All professionals are loaded as well
	*
	*	@return void
	*/
	public function showHomePage()
	{
		$specializations = $this -> specializationRepo -> getAllSpecializations();
		$countries = $this -> countryRepo -> getAllCountries();
		$creativeFields = $this -> creativeFieldRepo -> getAllCreativeFields();
		$platforms = $this -> platformRepo -> getAllPlatforms();
		$professionals = $this -> professionalRepo -> getAllProfessionals();
		
		return View::make('home')
			-> with('specializations', $specializations)
			-> with('countries', $countries)
			-> with('creativeFields', $creativeFields)
			-> with('platforms', $platforms)
			-> with('professionals', $professionals);
	}

}
