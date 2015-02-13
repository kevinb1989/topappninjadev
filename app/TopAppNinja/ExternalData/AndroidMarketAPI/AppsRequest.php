<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;
class AppsRequest {
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
      //var_dump("AppsRequest: Found $field type " . Protobuf::get_wiretype($wire) . " $limit bytes left");
      switch($field) {
        case 1:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->appType_ = $tmp;
          
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
          $this->query_ = $tmp;
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
          $this->appId_ = $tmp;
          $limit-=$len;
          break;
        case 6:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->withExtendedInfo_ = $tmp > 0 ? true : false;
          break;
        case 7:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->orderType_ = $tmp;
          
          break;
        case 8:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->startIndex_ = $tmp;
          
          break;
        case 9:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->entriesCount_ = $tmp;
          
          break;
        case 10:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->viewType_ = $tmp;
          
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
      fwrite($fp, "\x08");
      Protobuf::write_varint($fp, $this->appType_);
    }
    if (!is_null($this->query_)) {
      fwrite($fp, "\x12");
      Protobuf::write_varint($fp, strlen($this->query_));
      fwrite($fp, $this->query_);
    }
    if (!is_null($this->categoryId_)) {
      fwrite($fp, "\x1a");
      Protobuf::write_varint($fp, strlen($this->categoryId_));
      fwrite($fp, $this->categoryId_);
    }
    if (!is_null($this->appId_)) {
      fwrite($fp, "\"");
      Protobuf::write_varint($fp, strlen($this->appId_));
      fwrite($fp, $this->appId_);
    }
    if (!is_null($this->withExtendedInfo_)) {
      fwrite($fp, "0");
      Protobuf::write_varint($fp, $this->withExtendedInfo_ ? 1 : 0);
    }
    if (!is_null($this->orderType_)) {
      fwrite($fp, "8");
      Protobuf::write_varint($fp, $this->orderType_);
    }
    if (!is_null($this->startIndex_)) {
      fwrite($fp, "@");
      Protobuf::write_varint($fp, $this->startIndex_);
    }
    if (!is_null($this->entriesCount_)) {
      fwrite($fp, "H");
      Protobuf::write_varint($fp, $this->entriesCount_);
    }
    if (!is_null($this->viewType_)) {
      fwrite($fp, "P");
      Protobuf::write_varint($fp, $this->viewType_);
    }
  }
  
  public function size() {
    $size = 0;
    if (!is_null($this->appType_)) {
      $size += 1 + Protobuf::size_varint($this->appType_);
    }
    if (!is_null($this->query_)) {
      $l = strlen($this->query_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->categoryId_)) {
      $l = strlen($this->categoryId_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->appId_)) {
      $l = strlen($this->appId_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->withExtendedInfo_)) {
      $size += 2;
    }
    if (!is_null($this->orderType_)) {
      $size += 1 + Protobuf::size_varint($this->orderType_);
    }
    if (!is_null($this->startIndex_)) {
      $size += 1 + Protobuf::size_varint($this->startIndex_);
    }
    if (!is_null($this->entriesCount_)) {
      $size += 1 + Protobuf::size_varint($this->entriesCount_);
    }
    if (!is_null($this->viewType_)) {
      $size += 1 + Protobuf::size_varint($this->viewType_);
    }
    return $size;
  }
  
  public function validateRequired() {
    return true;
  }
  
  public function __toString() {
    return ''
         . Protobuf::toString('unknown', $this->_unknown)
         . Protobuf::toString('appType_', AppType::toString($this->appType_))
         . Protobuf::toString('query_', $this->query_)
         . Protobuf::toString('categoryId_', $this->categoryId_)
         . Protobuf::toString('appId_', $this->appId_)
         . Protobuf::toString('withExtendedInfo_', $this->withExtendedInfo_)
         . Protobuf::toString('orderType_', AppsRequest_OrderType::toString($this->orderType_))
         . Protobuf::toString('startIndex_', $this->startIndex_)
         . Protobuf::toString('entriesCount_', $this->entriesCount_)
         . Protobuf::toString('viewType_', AppsRequest_ViewType::toString($this->viewType_));
  }
  
  // optional .AppType appType = 1;

  private $appType_ = null;
  public function clearAppType() { $this->appType_ = null; }
  public function hasAppType() { return $this->appType_ !== null; }
  public function getAppType() { if($this->appType_ === null) return AppType::NONE; else return $this->appType_; }
  public function setAppType($value) { $this->appType_ = $value; }
  
  // optional string query = 2;

  private $query_ = null;
  public function clearQuery() { $this->query_ = null; }
  public function hasQuery() { return $this->query_ !== null; }
  public function getQuery() { if($this->query_ === null) return ""; else return $this->query_; }
  public function setQuery($value) { $this->query_ = $value; }
  
  // optional string categoryId = 3;

  private $categoryId_ = null;
  public function clearCategoryId() { $this->categoryId_ = null; }
  public function hasCategoryId() { return $this->categoryId_ !== null; }
  public function getCategoryId() { if($this->categoryId_ === null) return ""; else return $this->categoryId_; }
  public function setCategoryId($value) { $this->categoryId_ = $value; }
  
  // optional string appId = 4;

  private $appId_ = null;
  public function clearAppId() { $this->appId_ = null; }
  public function hasAppId() { return $this->appId_ !== null; }
  public function getAppId() { if($this->appId_ === null) return ""; else return $this->appId_; }
  public function setAppId($value) { $this->appId_ = $value; }
  
  // optional bool withExtendedInfo = 6;

  private $withExtendedInfo_ = null;
  public function clearWithExtendedInfo() { $this->withExtendedInfo_ = null; }
  public function hasWithExtendedInfo() { return $this->withExtendedInfo_ !== null; }
  public function getWithExtendedInfo() { if($this->withExtendedInfo_ === null) return false; else return $this->withExtendedInfo_; }
  public function setWithExtendedInfo($value) { $this->withExtendedInfo_ = $value; }
  
  // optional .AppsRequest.OrderType orderType = 7 [default = NONE];

  private $orderType_ = null;
  public function clearOrderType() { $this->orderType_ = null; }
  public function hasOrderType() { return $this->orderType_ !== null; }
  public function getOrderType() { if($this->orderType_ === null) return AppsRequest_OrderType::NONE; else return $this->orderType_; }
  public function setOrderType($value) { $this->orderType_ = $value; }
  
  // optional uint64 startIndex = 8;

  private $startIndex_ = null;
  public function clearStartIndex() { $this->startIndex_ = null; }
  public function hasStartIndex() { return $this->startIndex_ !== null; }
  public function getStartIndex() { if($this->startIndex_ === null) return 0; else return $this->startIndex_; }
  public function setStartIndex($value) { $this->startIndex_ = $value; }
  
  // optional int32 entriesCount = 9;

  private $entriesCount_ = null;
  public function clearEntriesCount() { $this->entriesCount_ = null; }
  public function hasEntriesCount() { return $this->entriesCount_ !== null; }
  public function getEntriesCount() { if($this->entriesCount_ === null) return 0; else return $this->entriesCount_; }
  public function setEntriesCount($value) { $this->entriesCount_ = $value; }
  
  // optional .AppsRequest.ViewType viewType = 10 [default = ALL];

  private $viewType_ = null;
  public function clearViewType() { $this->viewType_ = null; }
  public function hasViewType() { return $this->viewType_ !== null; }
  public function getViewType() { if($this->viewType_ === null) return AppsRequest_ViewType::ALL; else return $this->viewType_; }
  public function setViewType($value) { $this->viewType_ = $value; }
  
  // @@protoc_insertion_point(class_scope:AppsRequest)
}