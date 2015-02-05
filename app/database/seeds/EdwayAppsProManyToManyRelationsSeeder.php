<?php
use TopAppNinja\Entities\Professional;

class EdwayAppsProManyToManyRelationsSeeder extends Seeder{
	public function run(){
		//this is the Wave Degital Instance
		$professional = Professional::find(7);

		$platformsArr = array(1, 3);
		$creativeFieldsArr = array(12, 13);
		$clientFocusesArr = array(1, 2, 3);
		$specializationsArr = array(3, 6, 7, 10, 11, 12, 16, 18, 19);

		$professional -> platforms() -> attach($platformsArr);
		$professional -> creativeFields() -> attach($creativeFieldsArr);
		$professional -> clientFocuses() -> attach($clientFocusesArr);
		$professional -> specializations() -> attach($specializationsArr);
	}
}