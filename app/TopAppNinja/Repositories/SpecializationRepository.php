<?php
namespace TopAppNinja\Repositories;
use TopAppNinja\Entities\Specialization;

class SpecializationRepository implements SpecializationRepositoryInterface{

	public function __construct(Specialization $specialization){
		$this -> specialization = $specialization;
	}

	public function getAllSpecializations(){
		return $this -> specialization -> lists('SpecializationName', 'ID');
	}

}