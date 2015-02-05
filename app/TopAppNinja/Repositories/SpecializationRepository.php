<?php
namespace TopAppNinja\Repositories;
use TopAppNinja\Entities\Specialization;

class SpecializationRepository implements SpecializationRepositoryInterface{

	public function getAllSpecializations(){
		return Specialization::all();
	}

}