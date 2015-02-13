<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;

// enum GetImageRequest.AppImageUsage
class GetImageRequest_AppImageUsage {
  const ICON = 0;
  const SCREENSHOT = 1;
  const SCREENSHOT_THUMBNAIL = 2;
  const PROMO_BADGE = 3;
  const BILING_ICON = 4;
  
  public static $_values = array(
    0 => self::ICON,
    1 => self::SCREENSHOT,
    2 => self::SCREENSHOT_THUMBNAIL,
    3 => self::PROMO_BADGE,
    4 => self::BILING_ICON,
  );
  
  public static function toString($value) {
    if (is_null($value)) return null;
    if (array_key_exists($value, self::$_values))
      return self::$_values[$value];
    return 'UNKNOWN';
  }
}