<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;

// enum AppType
class AppType {
  const NONE = 0;
  const APPLICATION = 1;
  const RINGTONE = 2;
  const WALLPAPER = 3;
  const GAME = 4;
  
  public static $_values = array(
    0 => self::NONE,
    1 => self::APPLICATION,
    2 => self::RINGTONE,
    3 => self::WALLPAPER,
    4 => self::GAME,
  );
  
  public static function toString($value) {
    if (is_null($value)) return null;
    if (array_key_exists($value, self::$_values))
      return self::$_values[$value];
    return 'UNKNOWN';
  }
}

