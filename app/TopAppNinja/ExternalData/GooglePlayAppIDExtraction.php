<?php
namespace TopAppNinja\ExternalData;

class GooglePlayAppIDExtraction implements AppIDExtractionInterface {

	
	public function getAppIDFromAppURL($url){

		//use parse_url and parse_str to extract the app id
		$query = parse_url($url, PHP_URL_QUERY);
		parse_str($query, $params);
		$appID = $params['id'];
		return $appID;

	}

}