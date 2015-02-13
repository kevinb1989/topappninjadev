<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;

// message Response
class Response {
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
      //var_dump("Response: Found $field type " . Protobuf::get_wiretype($wire) . " $limit bytes left");
      switch($field) {
        case 1:
          ASSERT('$wire == 3');
          $this->responsegroup_[] = new Response_ResponseGroup($fp, $limit);
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
    if (!is_null($this->responsegroup_))
      foreach($this->responsegroup_ as $v) {
        fwrite($fp, "\x0b");
        $v->write($fp); // group
        fwrite($fp, "\x0c");
      }
  }
  
  public function size() {
    $size = 0;
    if (!is_null($this->responsegroup_))
      foreach($this->responsegroup_ as $v) {
        $size += 2 + $v->size();
      }
    return $size;
  }
  
  public function validateRequired() {
    return true;
  }
  
  public function __toString() {
    return ''
         . Protobuf::toString('unknown', $this->_unknown)
         . Protobuf::toString('responsegroup_', $this->responsegroup_);
  }
  
  // repeated group ResponseGroup = 1
  private $responsegroup_ = null;
  public function clearResponsegroup() { $this->responsegroup_ = null; }
  public function getResponsegroupCount() { if ($this->responsegroup_ === null ) return 0; else return count($this->responsegroup_); }
  public function getResponsegroup($index) { return $this->responsegroup_[$index]; }
  public function getResponsegroupArray() { if ($this->responsegroup_ === null ) return array(); else return $this->responsegroup_; }
  public function setResponsegroup($index, $value) {$this->responsegroup_[$index] = $value;	}
  public function addResponsegroup($value) { $this->responsegroup_[] = $value; }
  public function addAllResponsegroup(array $values) { foreach($values as $value) {$this->responsegroup_[] = $value;} }
  
  // @@protoc_insertion_point(class_scope:Response)
}