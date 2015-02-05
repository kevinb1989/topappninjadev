<?php
use TopAppNinja\Entities\Professional;

class AppDevelopmentAustraliaProSeeder extends Seeder{
	public function run(){
		$newProfessionalArr = array(
				'FirstName' => 'Brock',
				'LastName' => 'Peck',
				'Email' => 'brockpeck@rhyta.com',
				'Password' => Hash::make('1234'),
				'Address' => 'Suite 1, 2187 Princes Highway Clayton, VIC 3168',
				'PostCode' => '3168',
				'CityID' => '5',
				'ContactNo' => '1300 470 580',
				'ProfessionalType' => '1',
				'CompanyName' => 'App Development Australia',
				'CompanyURL' => 'www.appdevelopmentaustralia.com.au',
				'Description' => 'Smart phones such as iPhone and Android powered devices are here to stay. Compared to general computer adaptation, the use of smart phones and mobile apps are growing at a staggering rate. This growth rate of mobile apps has opened up a whole new dimension of opportunities for established and upcoming businesses.
				We specialize in mobile app development in Australia. We can work with you from the initial planning stage till the completion of the app. Our mobile app developers in ensure the apps are beautiful, user friendly and intuitive. With our affordable prices and payment plans, you can get an app designed and developed within your budget.
				Whether you need and iPhone, iPad or an Android app developed in Australia, send us an online enquiry today to get a no-obligation price quote.',
				'Logo' => 'logos/appdevelopmentaustralia.jpg',
				'PriceRangeTop' => '27000',
				'PriceRangeBottom' => '88000'
			);
		$newProfessional = Professional::create($newProfessionalArr);
	}
}