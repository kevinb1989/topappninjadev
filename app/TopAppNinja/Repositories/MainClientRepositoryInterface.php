<?php
namespace TopAppNinja\Repositories;

interface MainClientRepositoryInterface{

	public function getMainClientsByProfessionalID();
	public function addMainClients($pProfessionalID, $pMainClients)
}