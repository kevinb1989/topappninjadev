<?php
use TopAppNinja\Entities\Professional;
use TopAppNinja\Entities\MainClient;

class DreamWalkProOneToManyRelationsSeeder extends Seeder{
	public function run(){
		//this is the Wave Degital Instance
		$professional = Professional::find(10);

		$mainClientsArr = array(
			new MainClient(array('MainClientName' => 'Holmes Glen')),
			new MainClient(array('MainClientName' => 'State Library of Victoria'))
			);
		
		$professional -> mainClients() -> saveMany($mainClientsArr);
		
	}
}