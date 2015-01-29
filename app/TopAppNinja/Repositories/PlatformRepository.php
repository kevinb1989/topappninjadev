<?php
namespace TopAppNinja\Repositories;
use TopAppNinja\Entities\Platform;

class PlatformRepository implments PlatformRepositoryInterface{
	
	public function getAllPlatforms(){
		return Platform::all();
	}
	
}