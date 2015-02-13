<?php
namespace TopAppNinja\ExternalData;
use TopAppNinja\ExternalData\AndroidMarketAPI\MarketSession;
use TopAppNinja\ExternalData\AndroidMarketAPI\AppsRequest;
use TopAppNinja\ExternalData\AndroidMarketAPI\Request_RequestGroup;
use TopAppNinja\ExternalData\AndroidMarketAPI\Response;
use TopAppNinja\ExternalData\AndroidMarketAPI\Response_ResponseGroup;
use TopAppNinja\ExternalData\AndroidMarketAPI\Android_App;
use TopAppNinja\ExternalData\AndroidMarketAPI\GetImageRequest;
use TopAppNinja\ExternalData\AndroidMarketAPI\GetImageRequest_AppImageUsage;
use TopAppNinja\ExternalData\AndroidMarketAPI\GetImageResponse;

class GooglePlayAppInfoRetrieval implements AppInfoRetrievalInterface {

	public function retrieveAppInfo($appID){
		$packageName = $appID;
	try{
		$session = new MarketSession();
		$session -> login(GOOGLE_EMAIL, GOOGLE_PASSWD);
		$session -> setAndroidId(ANDROID_DEVICEID);
	}catch(Exception $e){
		Log::error($e);
	}

	//Build Request
	$ar = new AppsRequest();
	$ar->setQuery($packageName);
	$ar->setStartIndex(0);
	$ar->setEntriesCount(1);
	$ar->setWithExtendedInfo(true);

	//create a request group
	$reqGroup = new Request_RequestGroup();
	$reqGroup->setAppsRequest($ar);

	//Fetch response
	$response = null;
	try{
		$response = $session->execute($reqGroup);
	}catch(Exception $e){
		Log::error($e);
	}

	//Loop And Display
	$groups = $response->getResponsegroupArray();
	$appId = null;
	$app_info_array = array();
	foreach ($groups as $rg) {

		$appsResponse = $rg->getAppsResponse();
		$apps = $appsResponse->getAppArray();
		foreach ($apps as $app) {
			//read app info into array
			$appId = $app -> getId();
			$app_info_array = array_add($app_info_array, 'name', $app -> getTitle());
			$app_info_array = array_add($app_info_array, 'category', $app -> getExtendedInfo() -> getCategory());
			$app_info_array = array_add($app_info_array, 'description', $app -> getExtendedInfo() -> getDescription());
			$app_info_array = array_add($app_info_array, 'video', $app -> getExtendedInfo() -> getPromotionalVideo());
			//only the first record is needed so the escape this loop after the 1st iteration
			break;
		}
	}

	//RETRIEVE COVER IMAGE
	//Build Request
	$imageId	= 1;
	$gir = new GetImageRequest();
	$gir->setImageUsage(GetImageRequest_AppImageUsage::ICON);
	$gir->setAppId($appId);
	$gir->setImageId($imageId);

	//recreate the request group, this time for image download
	$reqGroup = new Request_RequestGroup();
	$reqGroup->setImageRequest($gir);

	//Fetch Request
	try{
		$response = $session->execute($reqGroup);
	}catch(Exception $e){
		Log::error($e);
	}

	//Loop And Display
	$groups = $response->getResponsegroupArray();
	#echo "<xmp>".print_r($groups, true)."</xmp>";
	foreach ($groups as $rg) {
		$imageResponse = $rg->getImageResponse();
		//this is the link to the icon
		$coverImageLink = "apps_icons/" . $packageName . "_icon.jpg"; 
		file_put_contents($coverImageLink, $imageResponse->getImageData());
		$app_info_array = array_add($app_info_array, 'cover_image', $coverImageLink);
		//as only one icon is needed, the loop is break after the first iteration
	}

	//RETRIEVE SCREENSHOTS
	$gir->setImageUsage(GetImageRequest_AppImageUsage::SCREENSHOT);
	$imageId = 0;
	$screenshots_arr = array();
	while($imageId < 3){
		$gir -> setImageId($imageId);
		//Fetch Request
		try{
			$response = $session->execute($reqGroup);
		}catch(Exception $e){
			echo "Exception: ".$e->getMessage();
		}

		//Loop And Display
		$groups = $response->getResponsegroupArray();
		foreach ($groups as $rg) {
			$imageResponse = $rg->getImageResponse();
			$screenshot_link = "apps_screenshots/" . $packageName . "_screenshot_" . $imageId . ".jpg";
			file_put_contents($screenshot_link, $imageResponse->getImageData());
			$screenshots_arr[] = $screenshot_link;
			$imageId++;
		}
	}
	$app_info_array = array_add($app_info_array, 'screenshots', $screenshots_arr);

	return json_encode($app_info_array);
	}

}