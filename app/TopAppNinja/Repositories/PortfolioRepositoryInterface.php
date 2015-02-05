<?php
namespace TopAppNinja\Repositories;
use TopAppNinja\Entities\Professional;

interface PortfolioRepositoryInterface{

	public function getPortfoliosByProfessionalID($pProfessionalID);
	public function getPortfolioByID($pPortfolioID);
	//public function addPortfolios($pProfessionalID, $pPortfoliosArr);
	public function deletePortfolio($pPortfolioID);
}