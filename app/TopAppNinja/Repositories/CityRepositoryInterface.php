<?php
namespace TopAppNinja\Repositories;

interface CityRepositoryInterface{

	public function getAllCitiesByCountryID($pCountryID);
}