<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;
class AppsRequest_ViewType {
  const ALL = 0;
  const FREE = 1;
  const PAID = 2;
  
  public static $_values = array(
    0 => self::ALL,
    1 => self::FREE,
    2 => self::PAID,
  );
  
  public static function toString($value) {
    if (is_null($value)) return null;
    if (array_key_exists($value, self::$_values))
      return self::$_values[$value];
    return 'UNKNOWN';
  }
}