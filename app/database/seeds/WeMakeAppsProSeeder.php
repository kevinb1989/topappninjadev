<?php
use TopAppNinja\Entities\Professional;

class WeMakeAppsProSeeder extends Seeder{
	public function run(){
		$newProfessionalArr = array(
				'FirstName' => 'Hunter',
				'LastName' => 'Morrill',
				'Email' => 'info@wemakeapps.net',
				'Password' => Hash::make('1234'),
				'Address' => '257 Wellington Street, Collingwood, Victoria 3066, Australia ',
				'PostCode' => '3066',
				'CityID' => '5',
				'ContactNo' => '1300 962 777',
				'ProfessionalType' => '1',
				'CompanyName' => 'We Make Apps',
				'CompanyURL' => 'http://wemakeapps.net/',
				'Description' => 'We’re a mobile app development company, specialising in building premium quality apps for the iOS, Android & Windows Phone platforms. We also build any supporting services an app might need – RESTful APIs, content management systems, push notification infrastructure… you name it, we’ve probably built it. ',
				'Logo' => 'logos/wemakeapps.jpg',
				'GooglePlus' => 'https://plus.google.com/102118027422900171012/about',
				'Facebook' => 'https://www.facebook.com/WeMakeApps',
				'Twitter' => 'https://twitter.com/WeMakeApps',
				'PriceRangeTop' => '20000',
				'PriceRangeBottom' => '60000'
			);
		$newProfessional = Professional::create($newProfessionalArr);
	}
}