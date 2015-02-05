<?php
use TopAppNinja\Entities\Professional;

class AppsterProSeeder extends Seeder{
	public function run(){
		$newProfessionalArr = array(
				'FirstName' => 'Matilda',
				'LastName' => 'Weekes',
				'Email' => 'matildaweekes@dayrep.com',
				'Password' => Hash::make('1234'),
				'Address' => 'L2, 377 Lonsdale St, Melbourne 3000, VIC',
				'PostCode' => '3000',
				'CityID' => '5',
				'ContactNo' => '1800 709 291',
				'ProfessionalType' => '1',
				'CompanyName' => 'Appster',
				'CompanyURL' => 'appster.com.au',
				'Description' => 'We work with the World’s Leading Entrepreneurs and are respected Startup Thought-leaders. We have been featured in the press as experts in our field and we pride ourselves on being the industry leaders. If you have an idea you want built but are afraid of someone stealing it, then trust in Appster.',
				'Logo' => 'logos/appster.jpg',
				'LinkedIn' => 'https://www.linkedin.com/company/appster',
				'Facebook' => 'https://www.facebook.com/Appsterhq',
				'GooglePlus' => 'https://plus.google.com/117177620319268457969',
				'PriceRangeTop' => '25000',
				'PriceRangeBottom' => '75000'
			);
		$newProfessional = Professional::create($newProfessionalArr);
	}
}