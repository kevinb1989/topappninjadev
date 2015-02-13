<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;
// message RequestContext
class RequestContext {
  private $_unknown;
  
  function __construct($in = NULL, &$limit = PHP_INT_MAX) {
    if($in !== NULL) {
      if (is_string($in)) {
        $fp = fopen('php://memory', 'r+b');
        fwrite($fp, $in);
        rewind($fp);
      } else if (is_resource($in)) {
        $fp = $in;
      } else {
        throw new Exception('Invalid in parameter');
      }
      $this->read($fp, $limit);
    }
  }
  
  function read($fp, &$limit = PHP_INT_MAX) {
    while(!feof($fp) && $limit > 0) {
      $tag = Protobuf::read_varint($fp, $limit);
      if ($tag === false) break;
      $wire  = $tag & 0x07;
      $field = $tag >> 3;
      //var_dump("RequestContext: Found $field type " . Protobuf::get_wiretype($wire) . " $limit bytes left");
      switch($field) {
        case 1:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          if ($len > 0)
            $tmp = fread($fp, $len);
          else
            $tmp = '';
          if ($tmp === false)
            throw new Exception("fread($len) returned false");
          $this->authSubToken_ = $tmp;
          $limit-=$len;
          break;
        case 2:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->unknown1_ = $tmp;
          
          break;
        case 3:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->version_ = $tmp;
          
          break;
        case 4:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          if ($len > 0)
            $tmp = fread($fp, $len);
          else
            $tmp = '';
          if ($tmp === false)
            throw new Exception("fread($len) returned false");
          $this->androidId_ = $tmp;
          $limit-=$len;
          break;
        case 5:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          if ($len > 0)
            $tmp = fread($fp, $len);
          else
            $tmp = '';
          if ($tmp === false)
            throw new Exception("fread($len) returned false");
          $this->deviceAndSdkVersion_ = $tmp;
          $limit-=$len;
          break;
        case 6:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          if ($len > 0)
            $tmp = fread($fp, $len);
          else
            $tmp = '';
          if ($tmp === false)
            throw new Exception("fread($len) returned false");
          $this->userLanguage_ = $tmp;
          $limit-=$len;
          break;
        case 7:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          if ($len > 0)
            $tmp = fread($fp, $len);
          else
            $tmp = '';
          if ($tmp === false)
            throw new Exception("fread($len) returned false");
          $this->userCountry_ = $tmp;
          $limit-=$len;
          break;
        case 8:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          if ($len > 0)
            $tmp = fread($fp, $len);
          else
            $tmp = '';
          if ($tmp === false)
            throw new Exception("fread($len) returned false");
          $this->operatorAlpha_ = $tmp;
          $limit-=$len;
          break;
        case 9:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          if ($len > 0)
            $tmp = fread($fp, $len);
          else
            $tmp = '';
          if ($tmp === false)
            throw new Exception("fread($len) returned false");
          $this->simOperatorAlpha_ = $tmp;
          $limit-=$len;
          break;
        case 10:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          if ($len > 0)
            $tmp = fread($fp, $len);
          else
            $tmp = '';
          if ($tmp === false)
            throw new Exception("fread($len) returned false");
          $this->operatorNumeric_ = $tmp;
          $limit-=$len;
          break;
        case 11:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          if ($len > 0)
            $tmp = fread($fp, $len);
          else
            $tmp = '';
          if ($tmp === false)
            throw new Exception("fread($len) returned false");
          $this->simOperatorNumeric_ = $tmp;
          $limit-=$len;
          break;
        default:
          $this->_unknown[$field . '-' . Protobuf::get_wiretype($wire)][] = Protobuf::read_field($fp, $wire, $limit);
      }
    }
    if (!$this->validateRequired())
      throw new Exception('Required fields are missing');
  }
  
  function write($fp) {
    if (!$this->validateRequired())
      throw new Exception('Required fields are missing');
    if (!is_null($this->authSubToken_)) {
      fwrite($fp, "\x0a");
      Protobuf::write_varint($fp, strlen($this->authSubToken_));
      fwrite($fp, $this->authSubToken_);
    }
    if (!is_null($this->unknown1_)) {
      fwrite($fp, "\x10");
      Protobuf::write_varint($fp, $this->unknown1_);
    }
    if (!is_null($this->version_)) {
      fwrite($fp, "\x18");
      Protobuf::write_varint($fp, $this->version_);
    }
    if (!is_null($this->androidId_)) {
      fwrite($fp, "\"");
      Protobuf::write_varint($fp, strlen($this->androidId_));
      fwrite($fp, $this->androidId_);
    }
    if (!is_null($this->deviceAndSdkVersion_)) {
      fwrite($fp, "*");
      Protobuf::write_varint($fp, strlen($this->deviceAndSdkVersion_));
      fwrite($fp, $this->deviceAndSdkVersion_);
    }
    if (!is_null($this->userLanguage_)) {
      fwrite($fp, "2");
      Protobuf::write_varint($fp, strlen($this->userLanguage_));
      fwrite($fp, $this->userLanguage_);
    }
    if (!is_null($this->userCountry_)) {
      fwrite($fp, ":");
      Protobuf::write_varint($fp, strlen($this->userCountry_));
      fwrite($fp, $this->userCountry_);
    }
    if (!is_null($this->operatorAlpha_)) {
      fwrite($fp, "B");
      Protobuf::write_varint($fp, strlen($this->operatorAlpha_));
      fwrite($fp, $this->operatorAlpha_);
    }
    if (!is_null($this->simOperatorAlpha_)) {
      fwrite($fp, "J");
      Protobuf::write_varint($fp, strlen($this->simOperatorAlpha_));
      fwrite($fp, $this->simOperatorAlpha_);
    }
    if (!is_null($this->operatorNumeric_)) {
      fwrite($fp, "R");
      Protobuf::write_varint($fp, strlen($this->operatorNumeric_));
      fwrite($fp, $this->operatorNumeric_);
    }
    if (!is_null($this->simOperatorNumeric_)) {
      fwrite($fp, "Z");
      Protobuf::write_varint($fp, strlen($this->simOperatorNumeric_));
      fwrite($fp, $this->simOperatorNumeric_);
    }
  }
  
  public function size() {
    $size = 0;
    if (!is_null($this->authSubToken_)) {
      $l = strlen($this->authSubToken_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->unknown1_)) {
      $size += 1 + Protobuf::size_varint($this->unknown1_);
    }
    if (!is_null($this->version_)) {
      $size += 1 + Protobuf::size_varint($this->version_);
    }
    if (!is_null($this->androidId_)) {
      $l = strlen($this->androidId_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->deviceAndSdkVersion_)) {
      $l = strlen($this->deviceAndSdkVersion_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->userLanguage_)) {
      $l = strlen($this->userLanguage_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->userCountry_)) {
      $l = strlen($this->userCountry_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->operatorAlpha_)) {
      $l = strlen($this->operatorAlpha_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->simOperatorAlpha_)) {
      $l = strlen($this->simOperatorAlpha_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->operatorNumeric_)) {
      $l = strlen($this->operatorNumeric_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->simOperatorNumeric_)) {
      $l = strlen($this->simOperatorNumeric_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    return $size;
  }
  
  public function validateRequired() {
    if ($this->authSubToken_ === null) return false;
    if ($this->unknown1_ === null) return false;
    if ($this->version_ === null) return false;
    if ($this->androidId_ === null) return false;
    return true;
  }
  
  public function __toString() {
    return ''
         . Protobuf::toString('unknown', $this->_unknown)
         . Protobuf::toString('authSubToken_', $this->authSubToken_)
         . Protobuf::toString('unknown1_', $this->unknown1_)
         . Protobuf::toString('version_', $this->version_)
         . Protobuf::toString('androidId_', $this->androidId_)
         . Protobuf::toString('deviceAndSdkVersion_', $this->deviceAndSdkVersion_)
         . Protobuf::toString('userLanguage_', $this->userLanguage_)
         . Protobuf::toString('userCountry_', $this->userCountry_)
         . Protobuf::toString('operatorAlpha_', $this->operatorAlpha_)
         . Protobuf::toString('simOperatorAlpha_', $this->simOperatorAlpha_)
         . Protobuf::toString('operatorNumeric_', $this->operatorNumeric_)
         . Protobuf::toString('simOperatorNumeric_', $this->simOperatorNumeric_);
  }
  
  // required string authSubToken = 1;

  private $authSubToken_ = null;
  public function clearAuthSubToken() { $this->authSubToken_ = null; }
  public function hasAuthSubToken() { return $this->authSubToken_ !== null; }
  public function getAuthSubToken() { if($this->authSubToken_ === null) return ""; else return $this->authSubToken_; }
  public function setAuthSubToken($value) { $this->authSubToken_ = $value; }
  
  // required int32 unknown1 = 2;

  private $unknown1_ = null;
  public function clearUnknown1() { $this->unknown1_ = null; }
  public function hasUnknown1() { return $this->unknown1_ !== null; }
  public function getUnknown1() { if($this->unknown1_ === null) return 0; else return $this->unknown1_; }
  public function setUnknown1($value) { $this->unknown1_ = $value; }
  
  // required int32 version = 3;

  private $version_ = null;
  public function clearVersion() { $this->version_ = null; }
  public function hasVersion() { return $this->version_ !== null; }
  public function getVersion() { if($this->version_ === null) return 0; else return $this->version_; }
  public function setVersion($value) { $this->version_ = $value; }
  
  // required string androidId = 4;

  private $androidId_ = null;
  public function clearAndroidId() { $this->androidId_ = null; }
  public function hasAndroidId() { return $this->androidId_ !== null; }
  public function getAndroidId() { if($this->androidId_ === null) return ""; else return $this->androidId_; }
  public function setAndroidId($value) { $this->androidId_ = $value; }
  
  // optional string deviceAndSdkVersion = 5;

  private $deviceAndSdkVersion_ = null;
  public function clearDeviceAndSdkVersion() { $this->deviceAndSdkVersion_ = null; }
  public function hasDeviceAndSdkVersion() { return $this->deviceAndSdkVersion_ !== null; }
  public function getDeviceAndSdkVersion() { if($this->deviceAndSdkVersion_ === null) return ""; else return $this->deviceAndSdkVersion_; }
  public function setDeviceAndSdkVersion($value) { $this->deviceAndSdkVersion_ = $value; }
  
  // optional string userLanguage = 6;

  private $userLanguage_ = null;
  public function clearUserLanguage() { $this->userLanguage_ = null; }
  public function hasUserLanguage() { return $this->userLanguage_ !== null; }
  public function getUserLanguage() { if($this->userLanguage_ === null) return ""; else return $this->userLanguage_; }
  public function setUserLanguage($value) { $this->userLanguage_ = $value; }
  
  // optional string userCountry = 7;

  private $userCountry_ = null;
  public function clearUserCountry() { $this->userCountry_ = null; }
  public function hasUserCountry() { return $this->userCountry_ !== null; }
  public function getUserCountry() { if($this->userCountry_ === null) return ""; else return $this->userCountry_; }
  public function setUserCountry($value) { $this->userCountry_ = $value; }
  
  // optional string operatorAlpha = 8;

  private $operatorAlpha_ = null;
  public function clearOperatorAlpha() { $this->operatorAlpha_ = null; }
  public function hasOperatorAlpha() { return $this->operatorAlpha_ !== null; }
  public function getOperatorAlpha() { if($this->operatorAlpha_ === null) return ""; else return $this->operatorAlpha_; }
  public function setOperatorAlpha($value) { $this->operatorAlpha_ = $value; }
  
  // optional string simOperatorAlpha = 9;

  private $simOperatorAlpha_ = null;
  public function clearSimOperatorAlpha() { $this->simOperatorAlpha_ = null; }
  public function hasSimOperatorAlpha() { return $this->simOperatorAlpha_ !== null; }
  public function getSimOperatorAlpha() { if($this->simOperatorAlpha_ === null) return ""; else return $this->simOperatorAlpha_; }
  public function setSimOperatorAlpha($value) { $this->simOperatorAlpha_ = $value; }
  
  // optional string operatorNumeric = 10;

  private $operatorNumeric_ = null;
  public function clearOperatorNumeric() { $this->operatorNumeric_ = null; }
  public function hasOperatorNumeric() { return $this->operatorNumeric_ !== null; }
  public function getOperatorNumeric() { if($this->operatorNumeric_ === null) return ""; else return $this->operatorNumeric_; }
  public function setOperatorNumeric($value) { $this->operatorNumeric_ = $value; }
  
  // optional string simOperatorNumeric = 11;

  private $simOperatorNumeric_ = null;
  public function clearSimOperatorNumeric() { $this->simOperatorNumeric_ = null; }
  public function hasSimOperatorNumeric() { return $this->simOperatorNumeric_ !== null; }
  public function getSimOperatorNumeric() { if($this->simOperatorNumeric_ === null) return ""; else return $this->simOperatorNumeric_; }
  public function setSimOperatorNumeric($value) { $this->simOperatorNumeric_ = $value; }
  
  // @@protoc_insertion_point(class_scope:RequestContext)
}