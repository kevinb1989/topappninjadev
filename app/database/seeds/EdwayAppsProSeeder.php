<?php
use TopAppNinja\Entities\Professional;

class EdwayAppsProSeeder extends Seeder{
	public function run(){
		$newProfessionalArr = array(
				'FirstName' => 'Eliza',
				'LastName' => 'Angliss',
				'Email' => 'info@edwayapps.com',
				'Password' => Hash::make('1234'),
				'Address' => 'Lvl 1, 424 St Kilda Rd. Melbourne 3004 VIC',
				'PostCode' => '3004',
				'CityID' => '5',
				'ContactNo' => '1300 842 077',
				'ProfessionalType' => '1',
				'CompanyName' => 'Edway Apps',
				'CompanyURL' => 'http://www.edwayapps.com.au/',
				'Description' => ' Edway App Studio is a team of young professionals that enjoys technological advances of our times. We genuinely love all new tech stuff and very passionate about creating awesome designs and building websites, apps and tech solutions for businesses and public.
				Although project development process, regardless of whether it’s a mobile application or website, could be quite technical and complex, our goal is to make that process as smooth and simple as possible.
				Our Project Managers will speak your language regardless of your technical knowledge and will take you through the whole process. We also designed easy to use e-forms that will help you to provide all necessary pre-project information. ',
				'Logo' => 'logos/edwayapps.jpg',
				'Facebook' => 'https://www.facebook.com/EdwayApps',
				'Twitter' => 'https://twitter.com/EdwayApps',
				'GooglePlus' => 'https://plus.google.com/u/0/+EdwayappsAu/posts',
				'PriceRangeTop' => '19000',
				'PriceRangeBottom' => '55000'
			);
		$newProfessional = Professional::create($newProfessionalArr);
	}
}