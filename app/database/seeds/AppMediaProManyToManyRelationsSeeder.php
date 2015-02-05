<?php
use TopAppNinja\Entities\Professional;

class AppMediaProManyToManyRelationsSeeder extends Seeder{
	public function run(){
		//this is the Wave Degital Instance
		$professional = Professional::find(9);

		$platformsArr = array(1, 2, 3);
		$creativeFieldsArr = array(13);
		$clientFocusesArr = array(1, 2, 3);
		$specializationsArr = array(3, 8, 10, 11, 14, 26);

		$professional -> platforms() -> attach($platformsArr);
		$professional -> creativeFields() -> attach($creativeFieldsArr);
		$professional -> clientFocuses() -> attach($clientFocusesArr);
		$professional -> specializations() -> attach($specializationsArr);
	}
}