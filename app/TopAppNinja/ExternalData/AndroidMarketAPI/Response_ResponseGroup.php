<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;

// group Response.ResponseGroup
class Response_ResponseGroup {
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
      //var_dump("Response_ResponseGroup: Found $field type " . Protobuf::get_wiretype($wire) . " $limit bytes left");
      switch($field) {
        case 1:
          ASSERT('$wire == 4');
          break 2;
        case 2:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          $limit-=$len;
          $this->context_ = new ResponseContext($fp, $len);
          ASSERT('$len == 0');
          break;
        case 3:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          $limit-=$len;
          $this->appsResponse_ = new AppsResponse($fp, $len);
          ASSERT('$len == 0');
          break;
        case 4:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          $limit-=$len;
          $this->commentsResponse_ = new CommentsResponse($fp, $len);
          ASSERT('$len == 0');
          break;
        case 10:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          $limit-=$len;
          $this->imageResponse_ = new GetImageResponse($fp, $len);
          ASSERT('$len == 0');
          break;
        case 20:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          $limit-=$len;
          $this->categoriesResponse_ = new CategoriesResponse($fp, $len);
          ASSERT('$len == 0');
          break;
        case 13:
          ASSERT('$wire == 2');
          $len = Protobuf::read_varint($fp, $limit);
          if ($len === false)
            throw new Exception('Protobuf::read_varint returned false');
          $limit-=$len;
          $this->subCategoriesResponse_ = new SubCategoriesResponse($fp, $len);
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
    if (!is_null($this->context_)) {
      fwrite($fp, "\x12");
      Protobuf::write_varint($fp, $this->context_->size()); // message
      $this->context_->write($fp);
    }
    if (!is_null($this->appsResponse_)) {
      fwrite($fp, "\x1a");
      Protobuf::write_varint($fp, $this->appsResponse_->size()); // message
      $this->appsResponse_->write($fp);
    }
    if (!is_null($this->commentsResponse_)) {
      fwrite($fp, "\"");
      Protobuf::write_varint($fp, $this->commentsResponse_->size()); // message
      $this->commentsResponse_->write($fp);
    }
    if (!is_null($this->imageResponse_)) {
      fwrite($fp, "R");
      Protobuf::write_varint($fp, $this->imageResponse_->size()); // message
      $this->imageResponse_->write($fp);
    }
    if (!is_null($this->categoriesResponse_)) {
      fwrite($fp, "\xa2\x01");
      Protobuf::write_varint($fp, $this->categoriesResponse_->size()); // message
      $this->categoriesResponse_->write($fp);
    }
    if (!is_null($this->subCategoriesResponse_)) {
      fwrite($fp, "j");
      Protobuf::write_varint($fp, $this->subCategoriesResponse_->size()); // message
      $this->subCategoriesResponse_->write($fp);
    }
  }
  
  public function size() {
    $size = 0;
    if (!is_null($this->context_)) {
      $l = $this->context_->size();
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->appsResponse_)) {
      $l = $this->appsResponse_->size();
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->commentsResponse_)) {
      $l = $this->commentsResponse_->size();
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->imageResponse_)) {
      $l = $this->imageResponse_->size();
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->categoriesResponse_)) {
      $l = $this->categoriesResponse_->size();
      $size += 2 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->subCategoriesResponse_)) {
      $l = $this->subCategoriesResponse_->size();
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
         . Protobuf::toString('context_', $this->context_)
         . Protobuf::toString('appsResponse_', $this->appsResponse_)
         . Protobuf::toString('commentsResponse_', $this->commentsResponse_)
         . Protobuf::toString('imageResponse_', $this->imageResponse_)
         . Protobuf::toString('categoriesResponse_', $this->categoriesResponse_)
         . Protobuf::toString('subCategoriesResponse_', $this->subCategoriesResponse_);
  }
  
  // optional .ResponseContext context = 2;

  private $context_ = null;
  public function clearContext() { $this->context_ = null; }
  public function hasContext() { return $this->context_ !== null; }
  public function getContext() { if($this->context_ === null) return null; else return $this->context_; }
  public function setContext(ResponseContext $value) { $this->context_ = $value; }
  
  // optional .AppsResponse appsResponse = 3;

  private $appsResponse_ = null;
  public function clearAppsResponse() { $this->appsResponse_ = null; }
  public function hasAppsResponse() { return $this->appsResponse_ !== null; }
  public function getAppsResponse() { if($this->appsResponse_ === null) return null; else return $this->appsResponse_; }
  public function setAppsResponse(AppsResponse $value) { $this->appsResponse_ = $value; }
  
  // optional .CommentsResponse commentsResponse = 4;

  private $commentsResponse_ = null;
  public function clearCommentsResponse() { $this->commentsResponse_ = null; }
  public function hasCommentsResponse() { return $this->commentsResponse_ !== null; }
  public function getCommentsResponse() { if($this->commentsResponse_ === null) return null; else return $this->commentsResponse_; }
  public function setCommentsResponse(CommentsResponse $value) { $this->commentsResponse_ = $value; }
  
  // optional .GetImageResponse imageResponse = 10;

  private $imageResponse_ = null;
  public function clearImageResponse() { $this->imageResponse_ = null; }
  public function hasImageResponse() { return $this->imageResponse_ !== null; }
  public function getImageResponse() { if($this->imageResponse_ === null) return null; else return $this->imageResponse_; }
  public function setImageResponse(GetImageResponse $value) { $this->imageResponse_ = $value; }
  
  // optional .CategoriesResponse categoriesResponse = 20;

  private $categoriesResponse_ = null;
  public function clearCategoriesResponse() { $this->categoriesResponse_ = null; }
  public function hasCategoriesResponse() { return $this->categoriesResponse_ !== null; }
  public function getCategoriesResponse() { if($this->categoriesResponse_ === null) return null; else return $this->categoriesResponse_; }
  public function setCategoriesResponse(CategoriesResponse $value) { $this->categoriesResponse_ = $value; }
  
  // optional .SubCategoriesResponse subCategoriesResponse = 13;

  private $subCategoriesResponse_ = null;
  public function clearSubCategoriesResponse() { $this->subCategoriesResponse_ = null; }
  public function hasSubCategoriesResponse() { return $this->subCategoriesResponse_ !== null; }
  public function getSubCategoriesResponse() { if($this->subCategoriesResponse_ === null) return null; else return $this->subCategoriesResponse_; }
  public function setSubCategoriesResponse(SubCategoriesResponse $value) { $this->subCategoriesResponse_ = $value; }
  
  // @@protoc_insertion_point(class_scope:Response.ResponseGroup)
}