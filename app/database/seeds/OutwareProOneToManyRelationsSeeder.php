<?php
use TopAppNinja\Entities\Professional;
use TopAppNinja\Entities\MainClient;

class OutwareProOneToManyRelationsSeeder extends Seeder{
	public function run(){
		//this is the Wave Degital Instance
		$professional = Professional::find(4);

		$mainClientsArr = array(
			new MainClient(array('MainClientName' => 'ANZ')),
			new MainClient(array('MainClientName' => 'Telstra')), 
			new MainClient(array('MainClientName' => 'VISA')), 
			new MainClient(array('MainClientName' => 'AFL')),
			new MainClient(array('MainClientName' => 'nib')),
			new MainClient(array('MainClientName' => 'State Government Victoria')),
			new MainClient(array('MainClientName' => 'Seek')),
			new MainClient(array('MainClientName' => 'coles'))
			);
		
		$professional -> mainClients() -> saveMany($mainClientsArr);
		
	}
}