<?php
namespace TopAppNinja\ExternalData;

interface AppIDExtractionInterface  {

	public function getAppIDFromAppURL($url);
}