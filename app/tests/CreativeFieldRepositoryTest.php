<?php
use TopAppNinja\Repositories\CreativeFieldRepository;

class CreativeFieldRepositoryTest extends PHPUnit_Framework_TestCase{

	public function test_get_all_creative_fields(){
		$mock = Mockery::mock('TopAppNinja\Entities\CreativeField');

		$mock -> shouldReceive('lists') 
			-> once() 
			-> andReturn('list of creative fields');

		$repo = new CreativeFieldRepository($mock);
		$creativeFields = $repo -> getAllCreativeFields();
	}
	
}