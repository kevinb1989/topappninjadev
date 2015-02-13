<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;

// message Request
class Request {
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
      //var_dump("Request: Found $field type " . Protobuf::get_wiretype($wire) . " $limit bytes left");
      switch($field) {
        case 1:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          $limit-=$len;
          $this->context_ = new RequestContext($fp, $len);
          ASSERT('$len == 0');
          break;
        case 2:
          ASSERT('$wire == 3');
          $this->requestgroup_[] = new Request_RequestGroup($fp, $limit);
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
    if (!is_null($this->context_)) {
      fwrite($fp, "\x0a");
      Protobuf::write_varint($fp, $this->context_->size()); // message
      $this->context_->write($fp);
    }
    if (!is_null($this->requestgroup_))
      foreach($this->requestgroup_ as $v) {
        fwrite($fp, "\x13");
        $v->write($fp); // group
        fwrite($fp, "\x14");
      }
  }
  
  public function size() {
    $size = 0;
    if (!is_null($this->context_)) {
      $l = $this->context_->size();
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->requestgroup_))
      foreach($this->requestgroup_ as $v) {
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
         . Protobuf::toString('context_', $this->context_)
         . Protobuf::toString('requestgroup_', $this->requestgroup_);
  }
  
  // optional .RequestContext context = 1;

  private $context_ = null;
  public function clearContext() { $this->context_ = null; }
  public function hasContext() { return $this->context_ !== null; }
  public function getContext() { if($this->context_ === null) return null; else return $this->context_; }
  public function setContext(RequestContext $value) { $this->context_ = $value; }
  
  // repeated group RequestGroup = 2
  private $requestgroup_ = null;
  public function clearRequestgroup() { $this->requestgroup_ = null; }
  public function getRequestgroupCount() { if ($this->requestgroup_ === null ) return 0; else return count($this->requestgroup_); }
  public function getRequestgroup($index) { return $this->requestgroup_[$index]; }
  public function getRequestgroupArray() { if ($this->requestgroup_ === null ) return array(); else return $this->requestgroup_; }
  public function setRequestgroup($index, $value) {$this->requestgroup_[$index] = $value;	}
  public function addRequestgroup($value) { $this->requestgroup_[] = $value; }
  public function addAllRequestgroup(array $values) { foreach($values as $value) {$this->requestgroup_[] = $value;} }
  
  // @@protoc_insertion_point(class_scope:Request)
}