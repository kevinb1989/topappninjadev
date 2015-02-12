<?php
namespace TopAppNinja\ExternalData;

class WindowsPhoneAppIDExtraction implements AppIDExtractionInterface {

	
	public function getAppIDFromAppURL($url){

		//split the url into an array divided by '/'
		$urlArr = explode('/', $url);
		//the windows phone app id is the last element in the array
		$appID = end($urlArr);

		return $appID;

	}

}