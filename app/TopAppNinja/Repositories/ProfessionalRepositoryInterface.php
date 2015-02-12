<?php
namespace TopAppNinja\Repositories;

interface ProfessionalRepositoryInterface{

	//public function changePassword($pOldPassword, $pNewPassword);
	public function changeEmail($pOldEmail, $pNewEmail);
	public function deleteAccount();
	public function getProfessionalByID($pID);
	public function searchProfessionals($pCriteria);
	public function register($pInfoArray);
	public function updateProfessional($pInfoArray);
	//public function longin($username, $password);
	//public function logout();
	
}