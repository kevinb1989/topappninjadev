<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;

// message SubCategoriesResponse
class SubCategoriesResponse {
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
      //var_dump("SubCategoriesResponse: Found $field type " . Protobuf::get_wiretype($wire) . " $limit bytes left");
      switch($field) {
        case 1:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          $limit-=$len;
          $this->category_[] = new Category($fp, $len);
          ASSERT('$len == 0');
          break;
        case 2:
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
          $this->subCategoryDisplay_ = $tmp;
          $limit-=$len;
          break;
        case 3:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->subCategoryId_ = $tmp;
          
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
    if (!is_null($this->category_))
      foreach($this->category_ as $v) {
        fwrite($fp, "\x0a");
        Protobuf::write_varint($fp, $v->size()); // message
        $v->write($fp);
      }
    if (!is_null($this->subCategoryDisplay_)) {
      fwrite($fp, "\x12");
      Protobuf::write_varint($fp, strlen($this->subCategoryDisplay_));
      fwrite($fp, $this->subCategoryDisplay_);
    }
    if (!is_null($this->subCategoryId_)) {
      fwrite($fp, "\x18");
      Protobuf::write_varint($fp, $this->subCategoryId_);
    }
  }
  
  public function size() {
    $size = 0;
    if (!is_null($this->category_))
      foreach($this->category_ as $v) {
        $l = $v->size();
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
    if (!is_null($this->subCategoryDisplay_)) {
      $l = strlen($this->subCategoryDisplay_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->subCategoryId_)) {
      $size += 1 + Protobuf::size_varint($this->subCategoryId_);
    }
    return $size;
  }
  
  public function validateRequired() {
    return true;
  }
  
  public function __toString() {
    return ''
         . Protobuf::toString('unknown', $this->_unknown)
         . Protobuf::toString('category_', $this->category_)
         . Protobuf::toString('subCategoryDisplay_', $this->subCategoryDisplay_)
         . Protobuf::toString('subCategoryId_', $this->subCategoryId_);
  }
  
  // repeated .Category category = 1;

  private $category_ = null;
  public function clearCategory() { $this->category_ = null; }
  public function getCategoryCount() { if ($this->category_ === null ) return 0; else return count($this->category_); }
  public function getCategory($index) { return $this->category_[$index]; }
  public function getCategoryArray() { if ($this->category_ === null ) return array(); else return $this->category_; }
  public function setCategory($index, $value) {$this->category_[$index] = $value;	}
  public function addCategory($value) { $this->category_[] = $value; }
  public function addAllCategory(array $values) { foreach($values as $value) {$this->category_[] = $value;} }
  
  // optional string subCategoryDisplay = 2;

  private $subCategoryDisplay_ = null;
  public function clearSubCategoryDisplay() { $this->subCategoryDisplay_ = null; }
  public function hasSubCategoryDisplay() { return $this->subCategoryDisplay_ !== null; }
  public function getSubCategoryDisplay() { if($this->subCategoryDisplay_ === null) return ""; else return $this->subCategoryDisplay_; }
  public function setSubCategoryDisplay($value) { $this->subCategoryDisplay_ = $value; }
  
  // optional int32 subCategoryId = 3;

  private $subCategoryId_ = null;
  public function clearSubCategoryId() { $this->subCategoryId_ = null; }
  public function hasSubCategoryId() { return $this->subCategoryId_ !== null; }
  public function getSubCategoryId() { if($this->subCategoryId_ === null) return 0; else return $this->subCategoryId_; }
  public function setSubCategoryId($value) { $this->subCategoryId_ = $value; }
  
  // @@protoc_insertion_point(class_scope:SubCategoriesResponse)
}