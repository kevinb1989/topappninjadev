<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;
class Category {
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
      //var_dump("Category: Found $field type " . Protobuf::get_wiretype($wire) . " $limit bytes left");
      switch($field) {
        case 2:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->appType_ = $tmp;
          
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
          $this->title_ = $tmp;
          $limit-=$len;
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
          $this->categoryId_ = $tmp;
          $limit-=$len;
          break;
        case 5:
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
          $this->subtitle_ = $tmp;
          $limit-=$len;
          break;
        case 8:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          $limit-=$len;
          $this->subCategories_[] = new Category($fp, $len);
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
    if (!is_null($this->appType_)) {
      fwrite($fp, "\x10");
      Protobuf::write_varint($fp, $this->appType_);
    }
    if (!is_null($this->title_)) {
      fwrite($fp, "\"");
      Protobuf::write_varint($fp, strlen($this->title_));
      fwrite($fp, $this->title_);
    }
    if (!is_null($this->categoryId_)) {
      fwrite($fp, "\x1a");
      Protobuf::write_varint($fp, strlen($this->categoryId_));
      fwrite($fp, $this->categoryId_);
    }
    if (!is_null($this->subtitle_)) {
      fwrite($fp, "*");
      Protobuf::write_varint($fp, strlen($this->subtitle_));
      fwrite($fp, $this->subtitle_);
    }
    if (!is_null($this->subCategories_))
      foreach($this->subCategories_ as $v) {
        fwrite($fp, "B");
        Protobuf::write_varint($fp, $v->size()); // message
        $v->write($fp);
      }
  }
  
  public function size() {
    $size = 0;
    if (!is_null($this->appType_)) {
      $size += 1 + Protobuf::size_varint($this->appType_);
    }
    if (!is_null($this->title_)) {
      $l = strlen($this->title_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->categoryId_)) {
      $l = strlen($this->categoryId_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->subtitle_)) {
      $l = strlen($this->subtitle_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->subCategories_))
      foreach($this->subCategories_ as $v) {
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
         . Protobuf::toString('appType_', $this->appType_)
         . Protobuf::toString('title_', $this->title_)
         . Protobuf::toString('categoryId_', $this->categoryId_)
         . Protobuf::toString('subtitle_', $this->subtitle_)
         . Protobuf::toString('subCategories_', $this->subCategories_);
  }
  
  // optional int32 appType = 2;

  private $appType_ = null;
  public function clearAppType() { $this->appType_ = null; }
  public function hasAppType() { return $this->appType_ !== null; }
  public function getAppType() { if($this->appType_ === null) return 0; else return $this->appType_; }
  public function setAppType($value) { $this->appType_ = $value; }
  
  // optional string title = 4;

  private $title_ = null;
  public function clearTitle() { $this->title_ = null; }
  public function hasTitle() { return $this->title_ !== null; }
  public function getTitle() { if($this->title_ === null) return ""; else return $this->title_; }
  public function setTitle($value) { $this->title_ = $value; }
  
  // optional string categoryId = 3;

  private $categoryId_ = null;
  public function clearCategoryId() { $this->categoryId_ = null; }
  public function hasCategoryId() { return $this->categoryId_ !== null; }
  public function getCategoryId() { if($this->categoryId_ === null) return ""; else return $this->categoryId_; }
  public function setCategoryId($value) { $this->categoryId_ = $value; }
  
  // optional string subtitle = 5;

  private $subtitle_ = null;
  public function clearSubtitle() { $this->subtitle_ = null; }
  public function hasSubtitle() { return $this->subtitle_ !== null; }
  public function getSubtitle() { if($this->subtitle_ === null) return ""; else return $this->subtitle_; }
  public function setSubtitle($value) { $this->subtitle_ = $value; }
  
  // repeated .Category subCategories = 8;

  private $subCategories_ = null;
  public function clearSubCategories() { $this->subCategories_ = null; }
  public function getSubCategoriesCount() { if ($this->subCategories_ === null ) return 0; else return count($this->subCategories_); }
  public function getSubCategories($index) { return $this->subCategories_[$index]; }
  public function getSubCategoriesArray() { if ($this->subCategories_ === null ) return array(); else return $this->subCategories_; }
  public function setSubCategories($index, $value) {$this->subCategories_[$index] = $value;	}
  public function addSubCategories($value) { $this->subCategories_[] = $value; }
  public function addAllSubCategories(array $values) { foreach($values as $value) {$this->subCategories_[] = $value;} }
  
  // @@protoc_insertion_point(class_scope:Category)
}