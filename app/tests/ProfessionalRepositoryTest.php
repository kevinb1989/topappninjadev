<?php
use TopAppNinja\Repositories\ProfessionalRepository;

class ProfessionalRepositoryTest extends PHPUnit_Framework_TestCase{

	public function setUp(){
		$this -> mock = Mockery::mock('TopAppNinja\Entities\Professional');
	}

	public function test_get_all_professionals(){
		$this -> mock -> shouldReceive('paginate') 
			-> once() 
			-> andReturn('list of professionals');

		$repo = new ProfessionalRepository($this -> mock);
		$platforms = $repo -> getAllProfessionals();
		$this -> assertNotEquals('list of paginated professionals', $platforms);
	}

	public function test_delete_account(){
		$this -> mock -> shouldReceive('destroy')
			-> with(1) 
			-> once()
			-> andReturn('deleted');

		$repo = new ProfessionalRepository($this -> mock);
		$count = $repo -> deleteAccount(1);
		$this -> assertEquals('deleted', $count);
	}

	public function test_get_professional_by_id(){
		$this -> mock -> shouldReceive('find') 
			-> once() 
			-> andReturn('a specific professional');

		$repo = new ProfessionalRepository($this -> mock);
		$returnedProfessional = $repo -> getProfessionalByID(1);
		$this -> assertNotEquals('found professional', $returnedProfessional);
	}

	public function test_register(){
		$infoArr = [
				'FirstName' => 'Kevin',
				'LastName' => 'Bui',
				'Email' => 'kevin@instani.com',
				'Password' => 'kb89'
			];

		$this -> mock -> shouldReceive('create')
			-> with($infoArr)
			-> once()
			-> andReturn('foo');

		
		$repo = new ProfessionalRepository($this -> mock);
		$returnedProfessional = $repo -> register($infoArr);
		$this -> assertEquals('foo', $returnedProfessional);
	}

	// public function test_update_professional(){
	// 	$infoArr = [
	// 			'pID' => 10,
	// 			'pFirstName' => 'Mackenzie',
	// 			'pLastName' => 'Gair',
	// 			'pEmail' => 'mackenziegair@rhyta.com',
	// 			'pPassword' => '1234',
	// 			'pAddress' => '13/243 Collins St, Melbourne VIC 3000',
	// 			'pPostCode' => '3000',
	// 			'pCityID' => '5',
	// 			'pContactNo' => '(02) 4014 3344',
	// 			'pProfessionalType' => '1',
	// 			'pCompanyName' => 'jTribe',
	// 			'pCompanyURL' => 'jtribe.com.au',
	// 			'pDescription' => 'jTribe is the most experienced app development company in Australia. We make apps for iOS, iPhone, iPad, Android and mobile app.',
	// 			'pLogo' => 'logos/jtribe.jpg',
	// 			'pTwitter' => 'https://twitter.com/jtribeapps',
	// 			'pFacebook' => 'https://twitter.com/jtribeapps',
	// 			'pLinkedIn' => 'https://twitter.com/jtribeapps',
	// 			'pBehance' => 'https://twitter.com/jtribeapps',
	// 			'pPinterest' => 'http://blog.jtribe.com.au/',
	// 			'pPriceRangeTop' => '10000',
	// 			'pPriceRangeBottom' => '40000'
	// 		];

	// 	$this -> mock -> shouldReceive('find')
	// 		-> with(10)
	// 		-> once();

		
	// 	$repo = new ProfessionalRepository($this -> mock);
	// 	$returnedProfessional = $repo -> updateProfessional($infoArr);		
	// }

	public function tearDown(){
		Mockery::close();
	}
	
}