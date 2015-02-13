<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;

// message GetImageRequest
class GetImageRequest {
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
      //var_dump("GetImageRequest: Found $field type " . Protobuf::get_wiretype($wire) . " $limit bytes left");
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
          $this->appId_ = $tmp;
          $limit-=$len;
          break;
        case 3:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->imageUsage_ = $tmp;
          
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
          $this->imageId_ = $tmp;
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
    if (!is_null($this->appId_)) {
      fwrite($fp, "\x0a");
      Protobuf::write_varint($fp, strlen($this->appId_));
      fwrite($fp, $this->appId_);
    }
    if (!is_null($this->imageUsage_)) {
      fwrite($fp, "\x18");
      Protobuf::write_varint($fp, $this->imageUsage_);
    }
    if (!is_null($this->imageId_)) {
      fwrite($fp, "\"");
      Protobuf::write_varint($fp, strlen($this->imageId_));
      fwrite($fp, $this->imageId_);
    }
  }
  
  public function size() {
    $size = 0;
    if (!is_null($this->appId_)) {
      $l = strlen($this->appId_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->imageUsage_)) {
      $size += 1 + Protobuf::size_varint($this->imageUsage_);
    }
    if (!is_null($this->imageId_)) {
      $l = strlen($this->imageId_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    return $size;
  }
  
  public function validateRequired() {
    return true;
  }
  
  public function __toString() {
    return ''
         . Protobuf::toString('unknown', $this->_unknown)
         . Protobuf::toString('appId_', $this->appId_)
         . Protobuf::toString('imageUsage_', GetImageRequest_AppImageUsage::toString($this->imageUsage_))
         . Protobuf::toString('imageId_', $this->imageId_);
  }
  
  // optional string appId = 1;

  private $appId_ = null;
  public function clearAppId() { $this->appId_ = null; }
  public function hasAppId() { return $this->appId_ !== null; }
  public function getAppId() { if($this->appId_ === null) return ""; else return $this->appId_; }
  public function setAppId($value) { $this->appId_ = $value; }
  
  // optional .GetImageRequest.AppImageUsage imageUsage = 3;

  private $imageUsage_ = null;
  public function clearImageUsage() { $this->imageUsage_ = null; }
  public function hasImageUsage() { return $this->imageUsage_ !== null; }
  public function getImageUsage() { if($this->imageUsage_ === null) return GetImageRequest_AppImageUsage::ICON; else return $this->imageUsage_; }
  public function setImageUsage($value) { $this->imageUsage_ = $value; }
  
  // optional string imageId = 4;

  private $imageId_ = null;
  public function clearImageId() { $this->imageId_ = null; }
  public function hasImageId() { return $this->imageId_ !== null; }
  public function getImageId() { if($this->imageId_ === null) return ""; else return $this->imageId_; }
  public function setImageId($value) { $this->imageId_ = $value; }
  
  // @@protoc_insertion_point(class_scope:GetImageRequest)
}