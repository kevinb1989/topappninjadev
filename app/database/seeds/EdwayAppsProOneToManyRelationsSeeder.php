<?php
use TopAppNinja\Entities\Professional;
use TopAppNinja\Entities\MainClient;

class EdwayAppsProOneToManyRelationsSeeder extends Seeder{
	public function run(){
		//this is the Wave Degital Instance
		$professional = Professional::find(7);

		$mainClientsArr = array(
			new MainClient(array('MainClientName' => 'Kraftsmen')),
			);
		
		$professional -> mainClients() -> saveMany($mainClientsArr);
		
	}
}