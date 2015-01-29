<?php
namespace TopAppNinja\Repositories;
use TopAppNinja\Entities\CreativeField;

class CreativeFieldRepository implements CreativeFieldRepositoryInterface{

	public function getAllCreativeFields(){
		return CreativeField::all();
	}

}