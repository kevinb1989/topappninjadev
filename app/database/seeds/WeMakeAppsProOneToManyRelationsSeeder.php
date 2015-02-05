<?php
use TopAppNinja\Entities\Professional;
use TopAppNinja\Entities\MainClient;

class WeMakeAppsProOneToManyRelationsSeeder extends Seeder{
	public function run(){
		//this is the Wave Degital Instance
		$professional = Professional::find(8);

		$mainClientsArr = array(
			new MainClient(array('MainClientName' => 'the City of Sydney')),
			new MainClient(array('MainClientName' => 'OMNEO')),
			new MainClient(array('MainClientName' => 'WeAreDigital')),
			new MainClient(array('MainClientName' => 'Shape Up Australia')),
			new MainClient(array('MainClientName' => 'Mushroom Group')),
			
			);
		
		$professional -> mainClients() -> saveMany($mainClientsArr);
		
	}
}