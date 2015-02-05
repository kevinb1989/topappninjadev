<?php
use TopAppNinja\Entities\Professional;

class DreamWalkProManyToManyRelationsSeeder extends Seeder{
	public function run(){
		//this is the Wave Degital Instance
		$professional = Professional::find(10);

		$platformsArr = array(1, 2, 3);
		$creativeFieldsArr = array(13);
		$clientFocusesArr = array(1, 2, 3);
		$specializationsArr = array(3, 6, 8, 11, 14, 19, 26);

		$professional -> platforms() -> attach($platformsArr);
		$professional -> creativeFields() -> attach($creativeFieldsArr);
		$professional -> clientFocuses() -> attach($clientFocusesArr);
		$professional -> specializations() -> attach($specializationsArr);
	}
}