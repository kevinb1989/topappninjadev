<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;
class AppsResponse {
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
      //var_dump("AppsResponse: Found $field type " . Protobuf::get_wiretype($wire) . " $limit bytes left");
      switch($field) {
        case 1:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          $limit-=$len;
          $this->app_[] = new Android_App($fp, $len);
          ASSERT('$len == 0');
          break;
        case 2:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->entriesCount_ = $tmp;
          
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
    if (!is_null($this->app_))
      foreach($this->app_ as $v) {
        fwrite($fp, "\x0a");
        Protobuf::write_varint($fp, $v->size()); // message
        $v->write($fp);
      }
    if (!is_null($this->entriesCount_)) {
      fwrite($fp, "\x10");
      Protobuf::write_varint($fp, $this->entriesCount_);
    }
  }
  
  public function size() {
    $size = 0;
    if (!is_null($this->app_))
      foreach($this->app_ as $v) {
        $l = $v->size();
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
    if (!is_null($this->entriesCount_)) {
      $size += 1 + Protobuf::size_varint($this->entriesCount_);
    }
    return $size;
  }
  
  public function validateRequired() {
    return true;
  }
  
  public function __toString() {
    return ''
         . Protobuf::toString('unknown', $this->_unknown)
         . Protobuf::toString('app_', $this->app_)
         . Protobuf::toString('entriesCount_', $this->entriesCount_);
  }
  
  // repeated .App app = 1;

  private $app_ = null;
  public function clearApp() { $this->app_ = null; }
  public function getAppCount() { if ($this->app_ === null ) return 0; else return count($this->app_); }
  public function getApp($index) { return $this->app_[$index]; }
  public function getAppArray() { if ($this->app_ === null ) return array(); else return $this->app_; }
  public function setApp($index, $value) {$this->app_[$index] = $value;	}
  public function addApp($value) { $this->app_[] = $value; }
  public function addAllApp(array $values) { foreach($values as $value) {$this->app_[] = $value;} }
  
  // optional int32 entriesCount = 2;

  private $entriesCount_ = null;
  public function clearEntriesCount() { $this->entriesCount_ = null; }
  public function hasEntriesCount() { return $this->entriesCount_ !== null; }
  public function getEntriesCount() { if($this->entriesCount_ === null) return 0; else return $this->entriesCount_; }
  public function setEntriesCount($value) { $this->entriesCount_ = $value; }
  
  // @@protoc_insertion_point(class_scope:AppsResponse)
}