<?php
use TopAppNinja\Entities\Professional;
use TopAppNinja\Entities\MainClient;

class WaveDigitalProOneToManyRelationsSeeder extends Seeder{
	public function run(){
		//this is the Wave Degital Instance
		$professional = Professional::find(1);

		$mainClientsArr = array(
			new MainClient(array('MainClientName' => 'Australia Post')),
			new MainClient(array('MainClientName' => 'VicRoads')), 
			new MainClient(array('MainClientName' => 'AXA')), 
			new MainClient(array('MainClientName' => 'SportsBet')),
			new MainClient(array('MainClientName' => 'The University of Melbourne'))
			);
		
		$professional -> mainClients() -> saveMany($mainClientsArr);
		
	}
}