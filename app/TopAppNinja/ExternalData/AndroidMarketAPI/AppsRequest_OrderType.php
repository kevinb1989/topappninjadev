<?php

/**
 * 	@author Niklas Nilsson <splitfeed@gmail.com>
 *	market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;

class AppsRequest_OrderType {
  const NONE = 0;
  const POPULAR = 1;
  const NEWEST = 2;
  const FEATURED = 3;
  
  public static $_values = array(
    0 => self::NONE,
    1 => self::POPULAR,
    2 => self::NEWEST,
    3 => self::FEATURED,
  );
  
  public static function toString($value) {
    if (is_null($value)) return null;
    if (array_key_exists($value, self::$_values))
      return self::$_values[$value];
    return 'UNKNOWN';
  }
}