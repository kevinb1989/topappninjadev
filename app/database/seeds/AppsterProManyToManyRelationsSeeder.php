<?php
use TopAppNinja\Entities\Professional;

class AppsterProManyToManyRelationsSeeder extends Seeder{
	public function run(){
		//this is the Wave Degital Instance
		$professional = Professional::find(5);

		$platformsArr = array(1, 2, 3);
		$creativeFieldsArr = array(13);
		$clientFocusesArr = array(1, 2, 3);
		$specializationsArr = array(2, 5, 6, 8, 9, 10, 19);

		$professional -> platforms() -> attach($platformsArr);
		$professional -> creativeFields() -> attach($creativeFieldsArr);
		$professional -> clientFocuses() -> attach($clientFocusesArr);
		$professional -> specializations() -> attach($specializationsArr);
	}
}