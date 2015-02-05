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
		

}