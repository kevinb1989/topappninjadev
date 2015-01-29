<?php
namespace TopAppNinja\Repositories;
use TopAppNinja\Entities\Specialization;

class SpecializationRepository implements SpecializationRepositoryInterface{

	public function getAllSpecialization(){
		return Specialization::all();
	}

}