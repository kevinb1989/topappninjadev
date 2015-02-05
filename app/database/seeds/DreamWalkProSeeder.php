<?php
use TopAppNinja\Entities\Professional;

class DreamWalkProSeeder extends Seeder{
	public function run(){
		$newProfessionalArr = array(
				'FirstName' => 'Lara',
				'LastName' => 'MacDevitt',
				'Email' => 'info@dreamwalk.com.au',
				'Password' => Hash::make('1234'),
				'Address' => '2/297 Napier St, Fitzroy 3065',
				'PostCode' => '3065',
				'CityID' => '5',
				'ContactNo' => '+61 3 9419 0439',
				'ProfessionalType' => '1',
				'CompanyName' => 'DreamWalk',
				'CompanyURL' => 'www.dreamwalk.com.au',
				'Description' => 'Don’t be fooled by their perfect white smiles and rugged good looks, every one of our team also has an equally beautiful mind. When we are not at the gym or tanning salon we also like to develop and use mobile apps.',
				'Logo' => 'logos/dreamwalk.jpg',
				'Facebook' => 'https://www.facebook.com/DreamWalkInteractive',
				'Twitter' => 'https://twitter.com/dreamwalkmobile',
				'LinkedIn' => 'https://www.linkedin.com/company/dreamwalk',
				'PriceRangeTop' => '24000',
				'PriceRangeBottom' => '80000'
			);
		$newProfessional = Professional::create($newProfessionalArr);
	}
}