<?php
use TopAppNinja\Entities\Professional;

class AppDevelopmentAustraliaProManyToManyRelationsSeeder extends Seeder{
	public function run(){
		//this is the Wave Degital Instance
		$professional = Professional::find(6);

		$platformsArr = array(1, 2, 3);
		$clientFocusesArr = array(1, 2, 3);
		$specializationsArr = array(1, 2, 3, 4, 5, 6);

		$professional -> platforms() -> attach($platformsArr);
		$professional -> clientFocuses() -> attach($clientFocusesArr);
		$professional -> specializations() -> attach($specializationsArr);
	}
}