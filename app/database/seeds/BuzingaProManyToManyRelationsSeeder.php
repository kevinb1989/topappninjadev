<?php
use TopAppNinja\Entities\Professional;

class BuzingaProManyToManyRelationsSeeder extends Seeder{
	public function run(){
		//this is the Wave Degital Instance
		$professional = Professional::find(2);

		$platformsArr = array(1, 3);
		$creativeFieldsArr = array(10, 13);
		$clientFocusesArr = array(1, 2, 3);
		$specializationsArr = array(1, 5, 6, 8, 19, 15, 11);

		$professional -> platforms() -> attach($platformsArr);
		$professional -> creativeFields() -> attach($creativeFieldsArr);
		$professional -> clientFocuses() -> attach($clientFocusesArr);
		$professional -> specializations() -> attach($specializationsArr);
	}
}