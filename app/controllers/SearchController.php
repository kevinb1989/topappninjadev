<?php
use TopAppNinja\Repositories\ProfessionalRepositoryInterface;

class SearchController extends \BaseController {
	/**
	 * simply inject a ProfessionalRepositoryInterface object into this controller
	 *
	 * @return void
	 */
	public function __construct(ProfessionalRepositoryInterface $professionalRepo){
		$this -> professionalRepo = $professionalRepo;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function search()
	{
		//retrieve search criteria
		return dd(Input::all());
	}

}
