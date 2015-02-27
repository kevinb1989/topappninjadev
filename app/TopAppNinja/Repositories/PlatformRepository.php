<?php
namespace TopAppNinja\Repositories;
use TopAppNinja\Entities\Platform;

class PlatformRepository implements PlatformRepositoryInterface{

	public function __construct(Platform $platform){
		$this -> platform = $platform;
	}
	
	public function getAllPlatforms(){
		return $this -> platform -> lists('PlatformName', 'ID');
	}
	
}