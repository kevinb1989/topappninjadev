<?php
use TopAppNinja\Entities\Professional;

class BuzingaProSeeder extends Seeder{
	public function run(){
		$newProfessionalArr = array(
				'FirstName' => 'Jake',
				'LastName' => 'Bushell',
				'Email' => 'jakebushell@rhyta.com',
				'Password' => Hash::make('1234'),
				'Address' => 'Level 1, 225-227 Swan St, Richmond VIC 3121',
				'PostCode' => '3121',
				'CityID' => '5',
				'ContactNo' => '03 9039 9999',
				'ProfessionalType' => '1',
				'CompanyName' => 'Buzinga',
				'CompanyURL' => 'www.buzinga.com.au',
				'Description' => 'We’re an Australian Mobile App Development Company working with fast growth startups and ambitious enterprises to build long lasting, valuable companies.',
				'Logo' => 'logos/buzinga.jpg',
				'Facebook' => 'https://www.facebook.com/BuzingaApps',
				'Twitter' => 'https://twitter.com/BuzingaApps1',
				'LinkedIn' => 'https://www.linkedin.com/company/2787557?trkInfo=tas%3Abuzinga%2Cidx%3A1-1-1&trk=tyah',
				'GooglePlus' => 'https://plus.google.com/u/0/+BuzingaAu/posts',
				'PriceRangeTop' => '30000',
				'PriceRangeBottom' => '60000'
			);
		$newProfessional = Professional::create($newProfessionalArr);

		// $platformsArr = array(1, 2, 3, 4);
		// $creativeFieldsArr = array(6, 13);
		// $clientFocusArr = array(1, 2, 3, 4);
		// $specializationArr = array(1, 10);
		// $mainClients = array(
		// 		array()
		// 	);

		// $newProfessional -> 
	}
}