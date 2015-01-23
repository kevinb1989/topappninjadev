<?php
namespace TopAppNinja\Repositories;

interface PortfolioRepositoryInterface{

	public function getPortfoliosByProfessionalID();
	public function getPortfolioByID();
	public function addPortfolios($pProfessionalID, $pPortfoliosArr);
	public function deletePortfolio($pPortfolioID);
}