<?php
namespace TopAppNinja\ExternalData;

class AppInfoFetching implements AppInfoFetchingInterface {
	
	public function setAppInfoSource(AppInfoRetrievalInterface $appInfoRetrieval){
		$this -> source = $appInfoRetrieval;
	}

	public function setAppIDExtractionMethod(AppIDExtractionInterface $appIDExtraction){
		$this -> extraction = $appIDExtraction;
	}
	public function getAppInfo($url){
		$appID = $this -> extraction -> getAppIDFromAppURL($url);
		return $this -> source -> retrieveAppInfo($appID);
	}
}