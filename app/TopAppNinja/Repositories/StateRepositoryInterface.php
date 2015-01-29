<?php
namespace TopAppNinja\Repositories;

interface StateRepositoryInterface{

	public function getAllStatesByCountryID($pCountryID);
}