<?php
use TopAppNinja\Entities\Professional;

class WaveDigitalProSeeder extends Seeder{
	public function run(){
		$newProfessionalArr = array(
				'FirstName' => 'Elizabeth',
				'LastName' => 'Collocott',
				'Email' => 'elizabethcollocott@dayrep.com',
				'Password' => Hash::make('1234'),
				'Address' => 'Suite 2, 46-48 Howard St North Melbourne VIC 3051, Australia',
				'PostCode' => '3051',
				'CityID' => '5',
				'ContactNo' => '+61 3 9090 8223',
				'ProfessionalType' => '1',
				'CompanyName' => 'WaveDigital',
				'CompanyURL' => 'wavedigital.com.au',
				'Description' => 'Wave Digital builds custom, scalable, mobile applications and associated infrastructure for business and government. We specialise in working with larger, more complex problems and data sets, as demonstrated by our multi-award winning VicRoads Traffic Alerts app. We build for iPhone/Android and have extensive experience building sites using responsive web design.',
				'Logo' => 'wavedigital.jpg',
				'Twitter' => 'twitter.com/wavebytes',
				'LinkedIn' => 'https://www.linkedin.com/company/wave-digital-pty-ltd-',
				'PriceRangeTop' => '20000',
				'PriceRangeBottom' => '50000'
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