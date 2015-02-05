<?php
use TopAppNinja\Entities\Professional;
use TopAppNinja\Entities\MainClient;

class JTribeProOneToManyRelationsSeeder extends Seeder{
	public function run(){
		//this is the Wave Degital Instance
		$professional = Professional::find(3);

		$mainClientsArr = array(
			new MainClient(array('MainClientName' => '1Form')),
			new MainClient(array('MainClientName' => 'nab')), 
			new MainClient(array('MainClientName' => 'State Government Victoria')), 
			new MainClient(array('MainClientName' => 'Apple Inc')),
			new MainClient(array('MainClientName' => 'Australia Open')),
			new MainClient(array('MainClientName' => 'Dell')),
			new MainClient(array('MainClientName' => 'Ozforex')),
			new MainClient(array('MainClientName' => 'Tresell')),
			new MainClient(array('MainClientName' => 'Work Safe')),
			new MainClient(array('MainClientName' => 'Movember')),
			new MainClient(array('MainClientName' => 'pwc')),
			new MainClient(array('MainClientName' => 'zendesk'))
			);
		
		$professional -> mainClients() -> saveMany($mainClientsArr);
		
	}
}