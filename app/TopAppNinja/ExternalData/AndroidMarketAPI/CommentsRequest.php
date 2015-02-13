<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;

// message CommentsRequest
class CommentsRequest {
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
      //var_dump("CommentsRequest: Found $field type " . Protobuf::get_wiretype($wire) . " $limit bytes left");
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
        case 2:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->startIndex_ = $tmp;
          
          break;
        case 3:
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
    if (!is_null($this->appId_)) {
      fwrite($fp, "\x0a");
      Protobuf::write_varint($fp, strlen($this->appId_));
      fwrite($fp, $this->appId_);
    }
    if (!is_null($this->startIndex_)) {
      fwrite($fp, "\x10");
      Protobuf::write_varint($fp, $this->startIndex_);
    }
    if (!is_null($this->entriesCount_)) {
      fwrite($fp, "\x18");
      Protobuf::write_varint($fp, $this->entriesCount_);
    }
  }
  
  public function size() {
    $size = 0;
    if (!is_null($this->appId_)) {
      $l = strlen($this->appId_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->startIndex_)) {
      $size += 1 + Protobuf::size_varint($this->startIndex_);
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
         . Protobuf::toString('appId_', $this->appId_)
         . Protobuf::toString('startIndex_', $this->startIndex_)
         . Protobuf::toString('entriesCount_', $this->entriesCount_);
  }
  
  // optional string appId = 1;

  private $appId_ = null;
  public function clearAppId() { $this->appId_ = null; }
  public function hasAppId() { return $this->appId_ !== null; }
  public function getAppId() { if($this->appId_ === null) return ""; else return $this->appId_; }
  public function setAppId($value) { $this->appId_ = $value; }
  
  // optional int32 startIndex = 2;

  private $startIndex_ = null;
  public function clearStartIndex() { $this->startIndex_ = null; }
  public function hasStartIndex() { return $this->startIndex_ !== null; }
  public function getStartIndex() { if($this->startIndex_ === null) return 0; else return $this->startIndex_; }
  public function setStartIndex($value) { $this->startIndex_ = $value; }
  
  // optional int32 entriesCount = 3;

  private $entriesCount_ = null;
  public function clearEntriesCount() { $this->entriesCount_ = null; }
  public function hasEntriesCount() { return $this->entriesCount_ !== null; }
  public function getEntriesCount() { if($this->entriesCount_ === null) return 0; else return $this->entriesCount_; }
  public function setEntriesCount($value) { $this->entriesCount_ = $value; }
  
  // @@protoc_insertion_point(class_scope:CommentsRequest)
}