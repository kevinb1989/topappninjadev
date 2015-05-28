<?php
namespace TopAppNinja\Repositories;
use TopAppNinja\Entities\Professional;

class ProfessionalRepository implements ProfessionalRepositoryInterface{

	public function __construct(Professional $professional){
		$this -> professional = $professional;
	}

	public function getAllProfessionals(){
		return $this -> professional -> paginate(5);
	}

	public function changeEmail($pProfessionalID, $pOldEmail, $pNewEmail){
		$professional = $this -> professional -> find($pProfessionalID);

		if(strcmp($professional -> Email, $pOldEmail) == 0){
			$professional -> Email = $pNewEmail;
			$professional -> save();
			return true;
		}

		return false;
	}

	public function deleteAccount($pProfessionalID){
		return $this -> professional -> destroy($pProfessionalID);
	}

	public function getProfessionalByID($pProfessionalID){
		return $this -> professional -> find($pProfessionalID);
	}

	public function searchProfessionals($pCriteria){

		// return $this -> professional -> where('CompanyName', 'LIKE', '%' . $pCriteria['pCompanyName'] . '%')
		// 	-> get();

	// 	 return $this -> professional -> join('pros_specs', 'professionals.ID', '=', 'pros_specs.professionalID')
	// 		 -> join('specializations', 'specializations.ID', '=', 'pros_specs.specializationID')
	// 		-> join('pros_creativefields', 'professionals.ID', '=', 'pros_creativefields.ProfessionalID')
	// 		-> join('creativefields', 'pros_creativefields.CreativeFieldID', '=', 'creativefields.ID')
	// 		-> join('pros_platforms', 'professionals.ID', '=', 'pros_platforms.ProfessionalID')
	// 		-> join('platforms', 'platforms.ID', '=', 'pros_platforms.PlatformID')
	// 		-> join('cities', 'professionals.CityID', '=', 'Cities.ID')
	// 		-> where('CompanyName', 'LIKE', '%' . $pCriteria['pCompanyName'] . '%')
	// 		-> whereIn('specializations.ID', $pCriteria['pSpecializations'])
	// 		-> whereIn('creativefields.ID', $pCriteria['pCreativeFields'])
	// 		-> whereIn('platforms.ID', $pCriteria['pPlatforms'])
	// 		-> whereIn('cities.ID', $pCriteria['pCities']) 
	// 		-> groupBy('professionals.ID')
	// 		-> distinct() -> get();
	// }

		$searchQuery = $this -> professional -> queryJoiningTables();

		if(!is_null($pCriteria['pCompanyName'])){
			$searchQuery = $searchQuery -> queryCompanyName($pCriteria['pCompanyName']);
		}

		if(!is_null($pCriteria['pSpecializations'])){
			$searchQuery = $searchQuery -> querySpecializations($pCriteria['pSpecializations']);
		}

		if(!is_null($pCriteria['pCreativeFields'])){
			$searchQuery = $searchQuery -> queryCreativeFields($pCriteria['pCreativeFields']);
		}

		if(!is_null($pCriteria['pPlatforms'])){
			$searchQuery = $searchQuery -> queryPlatforms($pCriteria['pPlatforms']);
		}

		if(!is_null($pCriteria['pCities'])){
			$searchQuery = $searchQuery -> queryCities($pCriteria['pCities']);
		}



		return $searchQuery -> groupBy('professionals.ID') 
			-> distinct() -> get(array('Professionals.*'));
	}

	public function register($pInfoArr){

		return $this -> professional -> create($pInfoArr);
		
	}

	public function updateProfessional($pInfoArray){
		$professional = $this -> professional -> find($pInfoArray['pID']);

		//update details
		$professional -> FirstName = $pInfoArray['pFirstName'];
		$professional -> LastName = $pInfoArray['pLastName'];
		$professional -> Email = $pInfoArray['pEmail'];
		$professional -> Address = $pInfoArray['pAddress'];
		$professional -> PostCode = $pInfoArray['pPostCode'];
		$professional -> CityID = $pInfoArray['pCityID'];
		$professional -> ContactNo = $pInfoArray['pContactNo'];
		$professional -> ProfessionalType = 1;
		$professional -> CompanyName = $pInfoArray['pCompanyName'];
		$professional -> CompanyURL = $pInfoArray['pCompanyURL'];
		$professional -> Description = $pInfoArray['pDescription'];
		$professional -> Logo = $pInfoArray['pLogo'];
		$professional -> Facebook = $pInfoArray['pFacebook'];
		$professional -> Twitter = $pInfoArray['pTwitter'];
		$professional -> LinkedIn = $pInfoArray['pLinkedIn'];
		$professional -> Behance = $pInfoArray['pBehance'];
		$professional -> Pinterest = $pInfoArray['pPinterest'];
		$professional -> Blog = $pInfoArray['pBlog'];
		$professional -> Accolades = $pInfoArray['pAccolades'];
		$professional -> PriceRangeTop = $pInfoArray('pPriceRangeTop');
		$professional -> PriceRangeTop = $pInfoArray('pPriceRangeBottom');

		$professional -> save();
	}
		

}