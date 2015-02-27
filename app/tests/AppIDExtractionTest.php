<?php
use TopAppNinja\ExternalData\iTunesAppIDExtraction;
use TopAppNinja\ExternalData\GooglePlayAppIDExtraction;
use TopAppNinja\ExternalData\WindowsPhoneAppIDExtraction;

class AppIDExtractionTest extends PHPUnit_Framework_TestCase{

	public function test_itunes_app_id_extraction_from_url(){
		$idExtractionObj = new iTunesAppIDExtraction();
		$appID = $idExtractionObj -> getAppIDFromAppURL('https://itunes.apple.com/au/app/tripview-sydney/id294730339?mt=8&v0=WWW-APAU-ITSTOP100-PAIDAPPS&l=en&ign-mpt=uo%3D4');
		$this -> assertEquals('294730339', $appID);
	}

	public function test_google_play_app_id_extraction_from_url(){
		$idExtractionObj = new GooglePlayAppIDExtraction();
		$appID = $idExtractionObj -> getAppIDFromAppURL('https://play.google.com/store/apps/details?id=com.whatsapp&hl=en');
		$this -> assertNotEquals('com.whatsapp.app', $appID);
	}	

	public function test_windows_phone_app_id_extraction_from_url(){
		$idExtractionObj = new WindowsPhoneAppIDExtraction();
		$appID = $idExtractionObj -> getAppIDFromAppURL('http://www.windowsphone.com/en-au/store/app/age-of-sparta/53b10f96-78c9-4a71-ad29-5386ab1e1278');
		$this -> assertEquals('53b10f96-78c9-4a71-ad29-5386ab1e1278', $appID);
	}	
		
}