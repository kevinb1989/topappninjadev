<?php
use TopAppNinja\Entities\ClientFocus;

class ClientFocusSeeder extends Seeder{
	public function run(){
		$clientFocusArr = array(
				array('ClientFocusName' => 'Small'),
				array('ClientFocusName' => 'Medium'),
				array('ClientFocusName' => 'Large')
			);

		DB::table('clientfocuses') -> insert($clientFocusArr);
	}
}