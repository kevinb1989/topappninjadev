<?php
use TopAppNinja\Repositories\ProfessionalRepositoryInterface;
use TopAppNinja\Repositories\TagsGeneratorInterface;

class SearchController extends \BaseController {
	/**
	 * simply inject a ProfessionalRepositoryInterface object into this controller
	 *
	 * @return void
	 */
	public function __construct(ProfessionalRepositoryInterface $professionalRepo,
		TagsGeneratorInterface $generator){
		$this -> professionalRepo = $professionalRepo;
		$this -> generator = $generator;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function search()
	{
		//initialize the array of criteria
		$pCriteria = array();

		$pCriteria = array(
				'pCompanyName' => Request::input('name'),
				'pSpecializations' => Request::input('specializations'),
				'pCountry' => Request::input('countries'),
				'pCities' => Request::input('cities'),
				'pPriceRangeBottom' => Request::input('frm_price_range_bottom'),
				'pPriceRangeTop' => Request::input('frm_price_range_top'),
				'pCreativeFields' => Request::input('creative_fields'),
				'pPlatforms' => Request::input('platforms')
			);

		$foundProfessionals = $this -> professionalRepo -> searchProfessionals($pCriteria);
		$tags = $this -> generator -> generateTags($pCriteria);

		return View::make('search-results') -> with('professionals', $foundProfessionals)
			-> with('tags', $tags);
	}

}
