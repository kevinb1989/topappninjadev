<?php
use TopAppNinja\Entities\Specialization;

class SpecializationSeeder extends Seeder{
	public function run(){
		DB::table('Specializations') -> delete();

		$data = array(
				//all iTunes app types
				array('SpecializationName' => 'Sports'),
				array('SpecializationName' => 'Health & Fitness'),
				array('SpecializationName' => 'Education'),
				array('SpecializationName' => 'Photo & Video'),
				array('SpecializationName' => 'Travel'),
				//array('SpecializationName' => 'Music'),
				array('SpecializationName' => 'Lifestyle'),
				array('SpecializationName' => 'Productivity'),
				array('SpecializationName' => 'Food & Drink'),
				array('SpecializationName' => 'Social Networking'),
				array('SpecializationName' => 'Business'),
				array('SpecializationName' => 'Entertainment'),
				//array('SpecializationName' => 'News'),
				array('SpecializationName' => 'Utilities'),
				array('SpecializationName' => 'Weather'),
				array('SpecializationName' => 'Navigation'),
				array('SpecializationName' => 'Finance'),
				array('SpecializationName' => 'Medical'),
				//array('SpecializationName' => 'Reference'),
				array('SpecializationName' => 'Catalogues'),
				//array('SpecializationName' => 'Books'),
				array('SpecializationName' => 'Newsstand'),
				array('SpecializationName' => 'Games'),
				array('SpecializationName' => 'Kids'),
				//Android addition app types
				array('SpecializationName' => 'Books & Reference'),
				array('SpecializationName' => 'Comics'),
				array('SpecializationName' => 'Communication'),
				array('SpecializationName' => 'Libraries & Demo'),
				array('SpecializationName' => 'Live WallPaper'),
				//array('SpecializationName' => 'Media & Video'),
				array('SpecializationName' => 'Music & Audio'),
				array('SpecializationName' => 'News & Magazines'),
				array('SpecializationName' => 'Personalization'),
				//array('SpecializationName' => 'Photography'),
				array('SpecializationName' => 'Shopping'),
				//array('SpecializationName' => 'Social'),
				array('SpecializationName' => 'Tools'),
				array('SpecializationName' => 'Transportation'),
				//array('SpecializationName' => 'Travel & Local'),
				array('SpecializationName' => 'Widgets'),
				//Windows Phone additional app types
				//array('SpecializationName' => 'music + video'),
				//array('SpecializationName' => 'tools + productivity'),
				//array('SpecializationName' => 'kids + family'),
				//array('SpecializationName' => 'news + weather'),
				//array('SpecializationName' => 'travel + navigation'),
				//array('SpecializationName' => 'health + fitness'),
				//array('SpecializationName' => 'photo'),
				//array('SpecializationName' => 'personal finance'),
				//array('SpecializationName' => 'books + reference'),
				array('SpecializationName' => 'government + politics')



			);

		DB::table('Specializations') -> insert($data);
	}
}