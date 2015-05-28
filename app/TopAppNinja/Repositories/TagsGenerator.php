<?php
namespace TopAppNinja\Repositories;
use TopAppNinja\Entities\Specialization;
use TopAppNinja\Entities\City;
use TopAppNinja\Entities\CreativeField;
use TopAppNinja\Entities\Platform;

class TagsGenerator implements TagsGeneratorInterface {

	public function __construct(Specialization $specialization,
		City $city,
		CreativeField $creativeField,
		Platform $platform){

		$this -> specialization = $specialization;
		$this -> city = $city;
		$this -> creativeField = $creativeField;
		$this -> platform = $platform;

	}

	public function generateTags($pCriteria){
		$tags = array();

		//create a tag for company name
		if(!is_null($pCriteria['pCompanyName'])){
			array_push($tags, $pCriteria['pCompanyName']);
		}

		//create tags for specializations
		if(!is_null($pCriteria['pSpecializations'])){
			$specializations = $this -> specialization -> find($pCriteria['pSpecializations']);
			foreach ($specializations as $specialization) {
				array_push($tags, $specialization -> SpecializationName);
			}
		}

		//create tags for creative fields
		if(!is_null($pCriteria['pCreativeFields'])){
			$creativeFields = $this -> creativeField -> find($pCriteria['pCreativeFields']);
			foreach ($creativeFields as $creativeField) {
				array_push($tags, $creativeField -> CreativeFieldName);
			}
		}

		//create tags for cities
		if(!is_null($pCriteria['pCities'])){
			$cities = $this -> city -> find($pCriteria['pCities']);
			foreach ($cities as $city) {
				array_push($tags, $city -> CityName);
			}
		}

		//create tags for platforms
		if(!is_null($pCriteria['pPlatforms'])){
			$platforms = $this -> platform -> find($pCriteria['pPlatforms']);
			foreach ($platforms as $platform) {
				array_push($tags, $platform -> PlatformName);
			}
		}

		//create a tag for price range bottom
		array_push($tags, $pCriteria['pPriceRangeBottom']);

		//create a tag for price range top
		array_push($tags, $pCriteria['pPriceRangeTop']);
		
		return $tags;
	}
}