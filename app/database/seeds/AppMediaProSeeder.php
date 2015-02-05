<?php
use TopAppNinja\Entities\Professional;

class AppMediaProSeeder extends Seeder{
	public function run(){
		$newProfessionalArr = array(
				'FirstName' => 'Seth',
				'LastName' => 'Lightfoot',
				'Email' => 'consult@appmedia.com.au',
				'Password' => Hash::make('1234'),
				'Address' => 'e202/599 Pacific Highway',
				'PostCode' => '3300',
				'CityID' => '7',
				'ContactNo' => '+61(2) 9439 6398',
				'ProfessionalType' => '1',
				'CompanyName' => 'App Media',
				'CompanyURL' => 'http://www.appmedia.com.au',
				'Description' => 'Behind AppMedia (a division of Smart Media Innovations Pty Ltd) is a dynamic and innovative team of around 25 talented mobile software engineers, designers, project managers and marketing professionals. We’re also partnered with industry leading companies such as Rackspace Cloud, Urban Airship, and Flurry.
				Combining our experience, extensive research and leading edge mobile technologies, we collaborate with clients and partners to deliver world class mobile solutions at a fraction of the time (and cost) of a traditional development team.',
				'Logo' => 'logos/appmedia.jpg',
				'Facebook' => 'https://www.facebook.com/mobileappmedia',
				'Twitter' => 'https://twitter.com/AppExpertsAU',
				'PriceRangeTop' => '17000',
				'PriceRangeBottom' => '49000'
			);
		$newProfessional = Professional::create($newProfessionalArr);
	}
}