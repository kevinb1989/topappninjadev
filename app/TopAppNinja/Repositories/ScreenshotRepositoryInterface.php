<?php
namespace TopAppNinja\Repositories;

interface ScreenshotRepositoryInterface{

	public function getAllScreenschotsByPortfolioID($pPortfolioID);
	public function addScreenshots($pProfessionalID, $pScreenshotsArr);
}