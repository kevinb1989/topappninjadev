<?php
use TopAppNinja\Entities\Professional;

class OutwareProManyToManyRelationsSeeder extends Seeder{
	public function run(){
		//this is the Wave Degital Instance
		$professional = Professional::find(4);

		$platformsArr = array(1, 3);
		$creativeFieldsArr = array(12);
		$clientFocusesArr = array(1, 2, 3);
		$specializationsArr = array(1, 2, 3, 6, 15);

		$professional -> platforms() -> attach($platformsArr);
		$professional -> creativeFields() -> attach($creativeFieldsArr);
		$professional -> clientFocuses() -> attach($clientFocusesArr);
		$professional -> specializations() -> attach($specializationsArr);
	}
}