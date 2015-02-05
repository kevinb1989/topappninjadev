<?php
use TopAppNinja\Entities\Professional;

class WeMakeAppsProManyToManyRelationsSeeder extends Seeder{
	public function run(){
		//this is the Wave Degital Instance
		$professional = Professional::find(8);

		$platformsArr = array(1, 2, 3, 4);
		$creativeFieldsArr = array(3);
		$clientFocusesArr = array(1, 2, 3);
		$specializationsArr = array(1, 2, 6, 8, 12, 14);

		$professional -> platforms() -> attach($platformsArr);
		$professional -> creativeFields() -> attach($creativeFieldsArr);
		$professional -> clientFocuses() -> attach($clientFocusesArr);
		$professional -> specializations() -> attach($specializationsArr);
	}
}