<?php
use TopAppNinja\Entities\Professional;
use TopAppNinja\Entities\MainClient;

class BuzingaProOneToManyRelationsSeeder extends Seeder{
	public function run(){
		//this is the Wave Degital Instance
		$professional = Professional::find(2);

		$mainClientsArr = array(
			new MainClient(array('MainClientName' => 'WWJD')),
			new MainClient(array('MainClientName' => 'Squizzy')), 
			new MainClient(array('MainClientName' => 'NSW government')), 
			new MainClient(array('MainClientName' => 'Spanet')),
			new MainClient(array('MainClientName' => 'Ambulance Australia')),
			new MainClient(array('MainClientName' => 'Stream Connect')),
			new MainClient(array('MainClientName' => 'The future is wild')),
			new MainClient(array('MainClientName' => 'Tresell')),
			new MainClient(array('MainClientName' => 'The George Institute')),
			new MainClient(array('MainClientName' => 'Bongo')),
			new MainClient(array('MainClientName' => 'Bounce Inc')),
			new MainClient(array('MainClientName' => 'Bupa')),
			new MainClient(array('MainClientName' => 'Dominet')),
			new MainClient(array('MainClientName' => 'Frugal')),
			new MainClient(array('MainClientName' => 'Bendigo Gold Pages')),
			new MainClient(array('MainClientName' => 'GWF')),
			new MainClient(array('MainClientName' => 'Kembla Joggers')),
			new MainClient(array('MainClientName' => 'realsome')),
			new MainClient(array('MainClientName' => 'Shopfitting Concepts')),
			);
		
		$professional -> mainClients() -> saveMany($mainClientsArr);
		
	}
}