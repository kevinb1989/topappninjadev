<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;

// group Request.RequestGroup
class Request_RequestGroup {
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
      //var_dump("Request_RequestGroup: Found $field type " . Protobuf::get_wiretype($wire) . " $limit bytes left");
      switch($field) {
        case 2:
          ASSERT('$wire == 4');
          break 2;
        case 4:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          $limit-=$len;
          $this->appsRequest_ = new AppsRequest($fp, $len);
          ASSERT('$len == 0');
          break;
        case 5:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          $limit-=$len;
          $this->commentsRequest_ = new CommentsRequest($fp, $len);
          ASSERT('$len == 0');
          break;
        case 11:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          $limit-=$len;
          $this->imageRequest_ = new GetImageRequest($fp, $len);
          ASSERT('$len == 0');
          break;
        case 14:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          $limit-=$len;
          $this->subCategoriesRequest_ = new SubCategoriesRequest($fp, $len);
          ASSERT('$len == 0');
          break;
        case 21:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          $limit-=$len;
          $this->categoriesRequest_ = new CategoriesRequest($fp, $len);
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
    if (!is_null($this->appsRequest_)) {
      fwrite($fp, "\"");
      Protobuf::write_varint($fp, $this->appsRequest_->size()); // message
      $this->appsRequest_->write($fp);
    }
    if (!is_null($this->commentsRequest_)) {
      fwrite($fp, "*");
      Protobuf::write_varint($fp, $this->commentsRequest_->size()); // message
      $this->commentsRequest_->write($fp);
    }
    if (!is_null($this->imageRequest_)) {
      fwrite($fp, "Z");
      Protobuf::write_varint($fp, $this->imageRequest_->size()); // message
      $this->imageRequest_->write($fp);
    }
    if (!is_null($this->subCategoriesRequest_)) {
      fwrite($fp, "r");
      Protobuf::write_varint($fp, $this->subCategoriesRequest_->size()); // message
      $this->subCategoriesRequest_->write($fp);
    }
    if (!is_null($this->categoriesRequest_)) {
      fwrite($fp, "\xaa\x01");
      Protobuf::write_varint($fp, $this->categoriesRequest_->size()); // message
      $this->categoriesRequest_->write($fp);
    }
  }
  
  public function size() {
    $size = 0;
    if (!is_null($this->appsRequest_)) {
      $l = $this->appsRequest_->size();
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->commentsRequest_)) {
      $l = $this->commentsRequest_->size();
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->imageRequest_)) {
      $l = $this->imageRequest_->size();
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->subCategoriesRequest_)) {
      $l = $this->subCategoriesRequest_->size();
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->categoriesRequest_)) {
      $l = $this->categoriesRequest_->size();
      $size += 2 + Protobuf::size_varint($l) + $l;
    }
    return $size;
  }
  
  public function validateRequired() {
    return true;
  }
  
  public function __toString() {
    return ''
         . Protobuf::toString('unknown', $this->_unknown)
         . Protobuf::toString('appsRequest_', $this->appsRequest_)
         . Protobuf::toString('commentsRequest_', $this->commentsRequest_)
         . Protobuf::toString('imageRequest_', $this->imageRequest_)
         . Protobuf::toString('subCategoriesRequest_', $this->subCategoriesRequest_)
         . Protobuf::toString('categoriesRequest_', $this->categoriesRequest_);
  }
  
  // optional .AppsRequest appsRequest = 4;

  private $appsRequest_ = null;
  public function clearAppsRequest() { $this->appsRequest_ = null; }
  public function hasAppsRequest() { return $this->appsRequest_ !== null; }
  public function getAppsRequest() { if($this->appsRequest_ === null) return null; else return $this->appsRequest_; }
  public function setAppsRequest(AppsRequest $value) { $this->appsRequest_ = $value; }
  
  // optional .CommentsRequest commentsRequest = 5;

  private $commentsRequest_ = null;
  public function clearCommentsRequest() { $this->commentsRequest_ = null; }
  public function hasCommentsRequest() { return $this->commentsRequest_ !== null; }
  public function getCommentsRequest() { if($this->commentsRequest_ === null) return null; else return $this->commentsRequest_; }
  public function setCommentsRequest(CommentsRequest $value) { $this->commentsRequest_ = $value; }
  
  // optional .GetImageRequest imageRequest = 11;

  private $imageRequest_ = null;
  public function clearImageRequest() { $this->imageRequest_ = null; }
  public function hasImageRequest() { return $this->imageRequest_ !== null; }
  public function getImageRequest() { if($this->imageRequest_ === null) return null; else return $this->imageRequest_; }
  public function setImageRequest(GetImageRequest $value) { $this->imageRequest_ = $value; }
  
  // optional .SubCategoriesRequest subCategoriesRequest = 14;

  private $subCategoriesRequest_ = null;
  public function clearSubCategoriesRequest() { $this->subCategoriesRequest_ = null; }
  public function hasSubCategoriesRequest() { return $this->subCategoriesRequest_ !== null; }
  public function getSubCategoriesRequest() { if($this->subCategoriesRequest_ === null) return null; else return $this->subCategoriesRequest_; }
  public function setSubCategoriesRequest(SubCategoriesRequest $value) { $this->subCategoriesRequest_ = $value; }
  
  // optional .CategoriesRequest categoriesRequest = 21;

  private $categoriesRequest_ = null;
  public function clearCategoriesRequest() { $this->categoriesRequest_ = null; }
  public function hasCategoriesRequest() { return $this->categoriesRequest_ !== null; }
  public function getCategoriesRequest() { if($this->categoriesRequest_ === null) return null; else return $this->categoriesRequest_; }
  public function setCategoriesRequest(CategoriesRequest $value) { $this->categoriesRequest_ = $value; }
  
  // @@protoc_insertion_point(class_scope:Request.RequestGroup)
}