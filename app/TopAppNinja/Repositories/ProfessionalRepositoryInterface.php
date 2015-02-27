<?php
namespace TopAppNinja\Repositories;

interface ProfessionalRepositoryInterface{

	public function getAllProfessionals();
	public function changeEmail($pProfessionalID, $pOldEmail, $pNewEmail);
	public function deleteAccount($pProfessionalID);
	public function getProfessionalByID($pID);
	public function searchProfessionals($pCriteria);
	public function register($pInfoArray);
	public function updateProfessional($pInfoArray);
	//public function longin($username, $password);
	//public function logout();
	
}