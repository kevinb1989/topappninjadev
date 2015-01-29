<?php
use TopAppNinja\Entities\CreativeField;

class CreativeFieldSeeder extends Seeder {
	public function run(){
		DB::table('CreativeFields') -> delete();

		CreativeField::create(array('CreativeFieldName' => 'Architecture'));
		CreativeField::create(array('CreativeFieldName' => 'Branding'));
		CreativeField::create(array('CreativeFieldName' => 'Fashion'));
		CreativeField::create(array('CreativeFieldName' => 'Graphic Design'));
		CreativeField::create(array('CreativeFieldName' => 'Illustration'));
		CreativeField::create(array('CreativeFieldName' => 'Industrial Design'));
		CreativeField::create(array('CreativeFieldName' => 'Interaction'));
		CreativeField::create(array('CreativeFieldName' => 'Motion Graphics'));
		CreativeField::create(array('CreativeFieldName' => 'Photography'));
		CreativeField::create(array('CreativeFieldName' => 'UI/UX'));
		CreativeField::create(array('CreativeFieldName' => 'Web Design'));
	}
}