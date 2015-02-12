<?php
namespace TopAppNinja\ExternalData;

class WindowsPhoneAppInfoRetrieval implements AppInfoRetrievalInterface {

	public function retrieveAppInfo($appID){
		//construct the url to read xml data about app from
		$url = "http://marketplaceedgeservice.windowsphone.com/v8/catalog/apps/";
		$url .= $appID;
		$url .= "?os=8.0.10211.0&cc=AU&lang=en-US";
		$xml = simplexml_load_string(disguise_curl($url));
		//print_r($xml);

		$app_name = $xml -> children("a", true) -> title;
		$app_category = $xml -> categories -> category -> title;
		$app_description = $xml -> children("a", true) -> content;

		//extract image id
		$image_arr = explode(':', $xml -> image -> id);
		//the last element of the array is the image id
		$image_link = "http://cdn.marketplaceimages.windowsphone.com/v8/images/" . $image_arr[count($image_arr) - 1];

		//construct an array of data to send to client
		$app_info_arr = array();
		$app_info_arr = array_add($app_info_arr, 'name', $app_name);
		$app_info_arr = array_add($app_info_arr, 'category', $app_category);
		$app_info_arr = array_add($app_info_arr, 'description', $app_description);
		$app_info_arr = array_add($app_info_arr, 'cover_image', $image_link);

		// //create an array of screenshots
		$screenshots_arr = array();
		foreach ($xml -> screenshots -> screenshot as $screenshot) {
			$screenshot_arr = explode(":", $screenshot -> id);
			$screenshot_link = "http://cdn.marketplaceimages.windowsphone.com/v8/images/" . $screenshot_arr[count($screenshot_arr) - 1]; 
			$screenshots_arr[] = $screenshot_link;
		}
		//attach the array of screenshots to the array of info for this app
		$app_info_arr = array_add($app_info_arr, 'screenshots', $screenshots_arr);

		return $app_info_arr;
	}

	function disguise_curl($url)
		{
		  $curl = curl_init();
		  $header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
		  $header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
		  $header[] = "Cache-Control: max-age=0";
		  $header[] = "Connection: keep-alive";
		  $header[] = "Keep-Alive: 300";
		  $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
		  $header[] = "Accept-Language: en-us,en;q=0.5";
		  $header[] = "Pragma: "; // browsers keep this blank.

		  curl_setopt($curl, CURLOPT_URL, $url);
		  curl_setopt($curl, CURLOPT_USERAGENT, 'Googlebot/2.1 (+http://www.google.com/bot.html)');
		  curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		  curl_setopt($curl, CURLOPT_REFERER, 'http://www.google.com');
		  curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate');
		  curl_setopt($curl, CURLOPT_AUTOREFERER, true);
		  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		  curl_setopt($curl, CURLOPT_TIMEOUT, 10);

		  $html = curl_exec($curl);
		  curl_close($curl);

		  return $html;
		}

}