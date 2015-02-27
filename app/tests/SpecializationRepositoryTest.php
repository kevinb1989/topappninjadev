<?php
use TopAppNinja\Repositories\SpecializationRepository;

class SpecializationRepositoryTest extends PHPUnit_Framework_TestCase{

	public function test_get_all_platforms(){
		$mock = Mockery::mock('TopAppNinja\Entities\Specialization');

		$mock -> shouldReceive('lists') 
			-> once() 
			-> andReturn('list of specializations');

		$repo = new SpecializationRepository($mock);
		$platforms = $repo -> getAllSpecializations();
	}
	
}