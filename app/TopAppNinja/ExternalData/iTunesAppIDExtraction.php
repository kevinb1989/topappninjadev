<?php
namespace TopAppNinja\ExternalData;

class iTunesAppIDExtraction implements AppIDExtractionInterface {

	
	public function getAppIDFromAppURL($url){

		//find the position of 'id' in the iTunes app link
		$idIndex = strpos($url, 'id');
		//find the index of the question mark from the iTunes app link
		$questionMarkIndex = strpos($url, '?');
		//find out the app id length
		$appIDLength = $questionMarkIndex - ($idIndex+1) - 1;
		//finally extract the itunes app id from the link
		$appID = substr($url, $idIndex + 2, $appIDLength);

		return $appID;

	}

}