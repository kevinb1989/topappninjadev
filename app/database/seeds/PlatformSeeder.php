<?php
use TopAppNinja\Entities\Platform;

class PlatformSeeder extends Seeder {

	public function run(){

		DB::table('Platforms') -> delete();

		$data = array(
				array('PlatformName' => 'iPhone'),
				array('PlatformName' => 'iPad'),
				array('PlatformName' => 'Android'),
				array('PlatformName' => 'Windows Phone')
			);

		DB::table('Platforms') -> insert($data);

	}
}