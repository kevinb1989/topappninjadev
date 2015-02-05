<?php
namespace TopAppNinja\Repositories;
use TopAppNinja\Entities\Professional;
use TopAppNinja\Entities\Portfolio

class PortfolioRepository implements PortfolioRepositoryInterface{
	public function getPortfoliosByProfessionalID($pProfessionalID){
		return Professional::find($pProfessionalID) -> portfolios;
	}

	public function getPortfolioByID($pPortfolioID){
		return Portfolio::find($pPortfolioID);
	}

	public function deletePortfolio($pPortfolioID){
		Portfolio::destroy($pPortfolioID);
	}
}