<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;

// message GetImageResponse
class GetImageResponse {
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
      //var_dump("GetImageResponse: Found $field type " . Protobuf::get_wiretype($wire) . " $limit bytes left<br />");
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
          $this->imageData_ = $tmp;
          $limit-=$len;
          break;
		case 2:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->imageWidth_ = $tmp;
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
    if (!is_null($this->imageData_)) {
      fwrite($fp, "\x0a");
      Protobuf::write_varint($fp, strlen($this->imageData_));
      fwrite($fp, $this->imageData_);
    }
  }
  
  public function size() {
    $size = 0;
    if (!is_null($this->imageData_)) {
      $l = strlen($this->imageData_);
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
         . Protobuf::toString('imageData_', $this->imageData_);
  }
  
  // optional bytes imageData = 1;

  private $imageData_ = null;
  public function clearImageData() { $this->imageData_ = null; }
  public function hasImageData() { return $this->imageData_ !== null; }
  public function getImageData() { if($this->imageData_ === null) return ""; else return $this->imageData_; }
  public function setImageData($value) { $this->imageData_ = $value; }
  
  private $imageWidth_ = null;
  public function clearImageWidth() { $this->imageWidth_ = null; }
  public function hasImageWidth() { return $this->imageWidth_ !== null; }
  public function getImageWidth() { if($this->imageWidth_ === null) return ""; else return $this->imageWidth_; }
  public function setImageWidth($value) { $this->imageWidth_ = $value; }
  
  // @@protoc_insertion_point(class_scope:GetImageResponse)
}