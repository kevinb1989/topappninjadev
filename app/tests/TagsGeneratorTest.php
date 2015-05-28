<?php
use TopAppNinja\Repositories\TagsGenerator;

class TagsGeneratorTest extends PHPUnit_Framework_TestCase{

	public function test_generate_tags(){
		$spec = Mockery::mock('TopAppNinja\Entities\Specialization');
		$city = Mockery::mock('TopAppNinja\Entities\City');
		$cfield = Mockery::mock('TopAppNinja\Entities\CreativeField');
		$platform = Mockery::mock('TopAppNinja\Entities\Platform');

		$spec -> shouldReceive('find') -> once();
		$city -> shouldReceive('find') -> once();
		$cfield -> shouldReceive('find') -> once();
		$platform -> shouldReceive('find') -> once();

		$generator = new TagsGenerator($spec, $city, $cfield, $platform);
		$criteria = array(
				'pCompanyName' => 'abc',
				'pSpecializations' => [1,2,3],
				'pCities' => [1,2,3],
				'pCreativeFields' => [1,2,3],
				'pPlatforms' => [1,2,3],
				'pPriceRangeBottom' => 10000,
				'pPriceRangeTop' => 50000
			);
		$generator -> generateTags($criteria);


	}
	
}