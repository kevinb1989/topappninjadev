<?php
use TopAppNinja\Entities\Professional;
use TopAppNinja\Entities\MainClient;

class AppMediaProOneToManyRelationsSeeder extends Seeder{
	public function run(){
		//this is the Wave Degital Instance
		$professional = Professional::find(9);

		$mainClientsArr = array(
			new MainClient(array('MainClientName' => 'Volusion')),
			new MainClient(array('MainClientName' => 'InMobi')), 
			new MainClient(array('MainClientName' => 'Jet Interactive')), 
			new MainClient(array('MainClientName' => 'Secure Pay')),
			new MainClient(array('MainClientName' => 'Urban Airship')),
			new MainClient(array('MainClientName' => 'Balance at Work')),
			new MainClient(array('MainClientName' => 'Sum Total')),
			new MainClient(array('MainClientName' => 'Financial Training Australia')),
			new MainClient(array('MainClientName' => 'Brainbase')),
			new MainClient(array('MainClientName' => 'Media Quay'))
			);
		
		$professional -> mainClients() -> saveMany($mainClientsArr);
		
	}
}