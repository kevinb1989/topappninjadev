<?php
namespace TopAppNinja\Repositories;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider{
	/**
	*Register classes in TopAppNinja\Repositories namespace
	*
	* @return void
	*/
	public function register(){
		$this -> app -> bind('TopAppNinja\Repositories\SpecializationRepositoryInterface', 'TopAppNinja\Repositories\SpecializationRepository');
		$this -> app -> bind('TopAppNinja\Repositories\CountryRepositoryInterface', 'TopAppNinja\Repositories\CountryRepository');
		$this -> app -> bind('TopAppNinja\Repositories\CityRepositoryInterface', 'TopAppNinja\Repositories\CityRepository');
		$this -> app -> bind('TopAppNinja\Repositories\CreativeFieldRepositoryInterface', 'TopAppNinja\Repositories\CreativeFieldRepository');
		$this -> app -> bind('TopAppNinja\Repositories\PlatformRepositoryInterface', 'TopAppNinja\Repositories\PlatformRepository');
		$this -> app -> bind('TopAppNinja\Repositories\ProfessionalRepositoryInterface', 'TopAppNinja\Repositories\ProfessionalRepository');
		$this -> app -> bind('TopAppNinja\Repositories\TagsGeneratorInterface', 'TopAppNinja\Repositories\TagsGenerator');

	}
}
