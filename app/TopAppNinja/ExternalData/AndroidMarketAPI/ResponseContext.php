<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;

// message ResponseContext
class ResponseContext {
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
      //var_dump("ResponseContext: Found $field type " . Protobuf::get_wiretype($wire) . " $limit bytes left");
      switch($field) {
        case 1:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->result_ = $tmp;
          
          break;
        case 2:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->unknown1_ = $tmp;
          
          break;
        case 3:
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
          $this->unknown2_ = $tmp;
          $limit-=$len;
          break;
        case 4:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->unknown3_ = $tmp;
          
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
    if (!is_null($this->result_)) {
      fwrite($fp, "\x08");
      Protobuf::write_varint($fp, $this->result_);
    }
    if (!is_null($this->unknown1_)) {
      fwrite($fp, "\x10");
      Protobuf::write_varint($fp, $this->unknown1_);
    }
    if (!is_null($this->unknown2_)) {
      fwrite($fp, "\x1a");
      Protobuf::write_varint($fp, strlen($this->unknown2_));
      fwrite($fp, $this->unknown2_);
    }
    if (!is_null($this->unknown3_)) {
      fwrite($fp, " ");
      Protobuf::write_varint($fp, $this->unknown3_);
    }
  }
  
  public function size() {
    $size = 0;
    if (!is_null($this->result_)) {
      $size += 1 + Protobuf::size_varint($this->result_);
    }
    if (!is_null($this->unknown1_)) {
      $size += 1 + Protobuf::size_varint($this->unknown1_);
    }
    if (!is_null($this->unknown2_)) {
      $l = strlen($this->unknown2_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->unknown3_)) {
      $size += 1 + Protobuf::size_varint($this->unknown3_);
    }
    return $size;
  }
  
  public function validateRequired() {
    return true;
  }
  
  public function __toString() {
    return ''
         . Protobuf::toString('unknown', $this->_unknown)
         . Protobuf::toString('result_', $this->result_)
         . Protobuf::toString('unknown1_', $this->unknown1_)
         . Protobuf::toString('unknown2_', $this->unknown2_)
         . Protobuf::toString('unknown3_', $this->unknown3_);
  }
  
  // optional int32 result = 1;

  private $result_ = null;
  public function clearResult() { $this->result_ = null; }
  public function hasResult() { return $this->result_ !== null; }
  public function getResult() { if($this->result_ === null) return 0; else return $this->result_; }
  public function setResult($value) { $this->result_ = $value; }
  
  // optional int32 unknown1 = 2;

  private $unknown1_ = null;
  public function clearUnknown1() { $this->unknown1_ = null; }
  public function hasUnknown1() { return $this->unknown1_ !== null; }
  public function getUnknown1() { if($this->unknown1_ === null) return 0; else return $this->unknown1_; }
  public function setUnknown1($value) { $this->unknown1_ = $value; }
  
  // optional string unknown2 = 3;

  private $unknown2_ = null;
  public function clearUnknown2() { $this->unknown2_ = null; }
  public function hasUnknown2() { return $this->unknown2_ !== null; }
  public function getUnknown2() { if($this->unknown2_ === null) return ""; else return $this->unknown2_; }
  public function setUnknown2($value) { $this->unknown2_ = $value; }
  
  // optional int32 unknown3 = 4;

  private $unknown3_ = null;
  public function clearUnknown3() { $this->unknown3_ = null; }
  public function hasUnknown3() { return $this->unknown3_ !== null; }
  public function getUnknown3() { if($this->unknown3_ === null) return 0; else return $this->unknown3_; }
  public function setUnknown3($value) { $this->unknown3_ = $value; }
  
  // @@protoc_insertion_point(class_scope:ResponseContext)
}