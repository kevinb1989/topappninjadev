<?php
namespace TopAppNinja\Repositories;
use TopAppNinja\Entities\Professional;

class ProfessionalRepository implements ProfessionalRepositoryInterface{

	public function changeEmail($pProfessionalID, $pOldEmail, $pNewEmail){
		$professional = Professional::find($pProfessionalID);

		if(strcmp($professional -> Email, $pOldEmail) == 0){
			$professional -> Email = $pNewEmail;
			$professional -> save();
			return true;
		}

		return false;
	}

	public function deleteAccount($pProfessionalID){
		Professional::destroy($pProfessionalID);
	}

	public function getProfessionalByID($pProfessionalID){
		return Professional::find($pProfessionalID);
	}

	public function searchProfessionals($pCritera){

		return Professional::join('pros_specs', 'professionals.ID', '=', 'pros_specs.professionalID')
			-> join('specializations', 'specializations.ID', '=', 'pros_specs.specializationID')
			-> join('pros_clientfocuses', 'professionals.ID', '=', 'pros_clientfocuses.professionalID')
			-> join('clientfocuses', 'clientfocuses.ID', '=', 'pros_clientfocuses.clientfocusID')
			-> join('pros_creativefields', 'professionals.ID', '=', 'pros_creativefields.ProfessionalID')
			-> join('creativefields', 'pros_creativefields.CreativeFieldID', '=', 'creativefields.ID')
			-> join('pros_platforms', 'professionals.ID', '=', 'pros_platforms.ProfessionalID')
			-> join('platforms', 'platforms.ID', '=', 'pros_platforms.PlatformID')
			-> join('cities', 'professionals.CityID', '=', 'Cities.ID')
			-> whereIn('specializations.ID', $pCritera['pSpecializations'])
			-> whereIn('clientfocuses.ID', $pCritera['pClientfocuses'])
			-> whereIn('creativefields.ID', $pCritera['pCreativeFields'])
			-> whereIn('Platforms.ID', $pCritera['pPlatforms'])
			-> whereIn('Cities.ID', $pCritera['pCities']);
	}

	public function register($pInfoArray){

		$newProfessional = Professional::create();
		$newProfessional -> FirstName = $pInfoArray['pFirstName'];
		$newProfessional -> LastName = $pInfoArray['pLastName'];
		$newProfessional -> Email = $pInfoArray['pEmail'];
		$newProfessional -> Password = Hash::make($pInfoArray['pFirstName']);
		$newProfessional -> save();
	}

	public function updateProfessional($pInfoArray){
		$professional = Professional::find($pInfoArray['pID']);

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