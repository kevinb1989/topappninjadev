<?php
namespace TopAppNinja\Repositories;
use TopAppNinja\Entities\CreativeField;

class CreativeFieldRepository implements CreativeFieldRepositoryInterface{

	/**
	*	inject an CreativeField object into this class
	*	@param TopAppNinja\Entities\CreativeField $creativeField
	*	@return void
	*/
	public function __construct(CreativeField $creativeField){
		$this -> creativeField = $creativeField;
	}

	/**
	*	obtain an array of creative field IDs and names to display in home page
	*	@return array 
	*/
	public function getAllCreativeFields(){
		return $this -> creativeField -> lists('CreativeFieldName', 'ID');
	}

}