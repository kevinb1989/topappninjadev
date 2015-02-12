<?php
namespace TopAppNinja\ExternalData;

class iTunesAppInfoRetrieval implements AppInfoRetrievalInterface {

	public function retrieveAppInfo($appID){
		$jSonAppInfo = file_get_contents('https://itunes.apple.com/lookup?id=' . $appID);
		$appInfo = json_decode($jSonAppInfo);
		return $appInfo;
	}

}