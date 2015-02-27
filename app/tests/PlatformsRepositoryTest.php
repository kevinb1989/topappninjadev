<?php
use TopAppNinja\Repositories\PlatformRepository;

class PlatformsRepositoryTest extends PHPUnit_Framework_TestCase{

	public function test_get_all_platforms(){
		$mock = Mockery::mock('TopAppNinja\Entities\Platform');

		$mock -> shouldReceive('lists') 
			-> once() 
			-> andReturn('list of platforms');

		$repo = new PlatformRepository($mock);
		$platforms = $repo -> getAllPlatforms();
	}
	
}