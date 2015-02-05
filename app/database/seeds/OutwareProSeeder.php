<?php
use TopAppNinja\Entities\Professional;

class OutwareProSeeder extends Seeder{
	public function run(){
		$newProfessionalArr = array(
				'FirstName' => 'Alexandra',
				'LastName' => 'Spafford',
				'Email' => 'alexandraspafford@armyspy.com',
				'Password' => Hash::make('1234'),
				'Address' => '120 Balmain St, Cremorne 3121',
				'PostCode' => '3121',
				'CityID' => '5',
				'ContactNo' => '+61 (0)3 8684 9912',
				'ProfessionalType' => '1',
				'CompanyName' => 'Outware',
				'CompanyURL' => 'www.outware.com.au',
				'Description' => 'Outware Mobile is an Australian-based, award-winning software development company that specialises in custom mobile apps.',
				'Logo' => 'logos/outware.jpg',
				'Twitter' => 'https://twitter.com/outware',
				'LinkedIn' => 'https://www.linkedin.com/company/outware-mobile',
				'Blog' => 'http://www.outware.com.au/blog/',
				'Facebook' => 'https://www.facebook.com/outware',
				'GooglePlus' => 'https://plus.google.com/109202465556807882038/about',
				'PriceRangeTop' => '15000',
				'PriceRangeBottom' => '45000'
			);
		$newProfessional = Professional::create($newProfessionalArr);
	}
}