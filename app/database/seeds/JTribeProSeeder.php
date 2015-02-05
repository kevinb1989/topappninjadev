<?php
use TopAppNinja\Entities\Professional;

class JTribeProSeeder extends Seeder{
	public function run(){
		$newProfessionalArr = array(
				'FirstName' => 'Mackenzie',
				'LastName' => 'Gair',
				'Email' => 'mackenziegair@rhyta.com',
				'Password' => Hash::make('1234'),
				'Address' => '13/243 Collins St, Melbourne VIC 3000',
				'PostCode' => '3000',
				'CityID' => '5',
				'ContactNo' => '(02) 4014 3344',
				'ProfessionalType' => '1',
				'CompanyName' => 'jTribe',
				'CompanyURL' => 'jtribe.com.au',
				'Description' => 'jTribe is the most experienced app development company in Australia. We make apps for iOS, iPhone, iPad, Android and mobile app.',
				'Logo' => 'logos/jtribe.jpg',
				'Twitter' => 'https://twitter.com/jtribeapps',
				'Blog' => 'http://blog.jtribe.com.au/',
				'PriceRangeTop' => '10000',
				'PriceRangeBottom' => '40000'
			);
		$newProfessional = Professional::create($newProfessionalArr);
	}
}