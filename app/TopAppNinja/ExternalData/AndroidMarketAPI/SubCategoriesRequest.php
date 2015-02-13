<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;

// message SubCategoriesRequest
class SubCategoriesRequest {
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
      //var_dump("SubCategoriesRequest: Found $field type " . Protobuf::get_wiretype($wire) . " $limit bytes left");
      switch($field) {
        case 1:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->appType_ = $tmp;
          
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
    if (!is_null($this->appType_)) {
      fwrite($fp, "\x08");
      Protobuf::write_varint($fp, $this->appType_);
    }
  }
  
  public function size() {
    $size = 0;
    if (!is_null($this->appType_)) {
      $size += 1 + Protobuf::size_varint($this->appType_);
    }
    return $size;
  }
  
  public function validateRequired() {
    return true;
  }
  
  public function __toString() {
    return ''
         . Protobuf::toString('unknown', $this->_unknown)
         . Protobuf::toString('appType_', AppType::toString($this->appType_));
  }
  
  // optional .AppType appType = 1;

  private $appType_ = null;
  public function clearAppType() { $this->appType_ = null; }
  public function hasAppType() { return $this->appType_ !== null; }
  public function getAppType() { if($this->appType_ === null) return AppType::NONE; else return $this->appType_; }
  public function setAppType($value) { $this->appType_ = $value; }
  
  // @@protoc_insertion_point(class_scope:SubCategoriesRequest)
}