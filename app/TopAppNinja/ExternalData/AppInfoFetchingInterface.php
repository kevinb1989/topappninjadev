<?php
namespace TopAppNinja\ExternalData;

interface AppInfoFetchingInterface {

	public function setAppInfoSource(AppInfoRetrievalInterface $appInfoRetrieval);
	public function setAppIDExtractionMethod(AppIDExtractionInterface $appIDExtraction);
	public function getAppInfo($appID);

}