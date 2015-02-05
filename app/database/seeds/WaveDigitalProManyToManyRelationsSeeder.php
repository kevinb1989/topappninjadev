<?php
use TopAppNinja\Entities\Professional;
use TopAppNinja\Entities\Platform;

class WaveDigitalProManyToManyRelationsSeeder extends Seeder{
	public function run(){
		//this is the Wave Degital Instance
		$professional = Professional::find(1);

		$platformsArr = array(1, 2, 3, 4);
		$creativeFieldsArr = array(6, 13);
		$clientFocusesArr = array(1, 2, 3);
		$specializationsArr = array(1, 10);

		$professional -> platforms() -> attach($platformsArr);
		$professional -> creativeFields() -> attach($creativeFieldsArr);
		$professional -> clientFocuses() -> attach($clientFocusesArr);
		$professional -> specializations() -> attach($specializationsArr);
	}
}