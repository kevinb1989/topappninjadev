<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;

// message CategoriesResponse
class CategoriesResponse {
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
      //var_dump("CategoriesResponse: Found $field type " . Protobuf::get_wiretype($wire) . " $limit bytes left");
      switch($field) {
        case 1:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          $limit-=$len;
          $this->categories_[] = new Category($fp, $len);
          ASSERT('$len == 0');
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
    if (!is_null($this->categories_))
      foreach($this->categories_ as $v) {
        fwrite($fp, "\x0a");
        Protobuf::write_varint($fp, $v->size()); // message
        $v->write($fp);
      }
  }
  
  public function size() {
    $size = 0;
    if (!is_null($this->categories_))
      foreach($this->categories_ as $v) {
        $l = $v->size();
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
         . Protobuf::toString('categories_', $this->categories_);
  }
  
  // repeated .Category categories = 1;

  private $categories_ = null;
  public function clearCategories() { $this->categories_ = null; }
  public function getCategoriesCount() { if ($this->categories_ === null ) return 0; else return count($this->categories_); }
  public function getCategories($index) { return $this->categories_[$index]; }
  public function getCategoriesArray() { if ($this->categories_ === null ) return array(); else return $this->categories_; }
  public function setCategories($index, $value) {$this->categories_[$index] = $value;	}
  public function addCategories($value) { $this->categories_[] = $value; }
  public function addAllCategories(array $values) { foreach($values as $value) {$this->categories_[] = $value;} }
  
  // @@protoc_insertion_point(class_scope:CategoriesResponse)
}