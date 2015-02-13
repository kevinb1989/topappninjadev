<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;
// message Comment
class Comment {
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
      //var_dump("Comment: Found $field type " . Protobuf::get_wiretype($wire) . " $limit bytes left");
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
          $this->text_ = $tmp;
          $limit-=$len;
          break;
        case 2:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->rating_ = $tmp;
          
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
          $this->authorName_ = $tmp;
          $limit-=$len;
          break;
        case 4:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->creationTime_ = $tmp;
          
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
          $this->authorId_ = $tmp;
          $limit-=$len;
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
    if (!is_null($this->text_)) {
      fwrite($fp, "\x0a");
      Protobuf::write_varint($fp, strlen($this->text_));
      fwrite($fp, $this->text_);
    }
    if (!is_null($this->rating_)) {
      fwrite($fp, "\x10");
      Protobuf::write_varint($fp, $this->rating_);
    }
    if (!is_null($this->authorName_)) {
      fwrite($fp, "\x1a");
      Protobuf::write_varint($fp, strlen($this->authorName_));
      fwrite($fp, $this->authorName_);
    }
    if (!is_null($this->creationTime_)) {
      fwrite($fp, " ");
      Protobuf::write_varint($fp, $this->creationTime_);
    }
    if (!is_null($this->authorId_)) {
      fwrite($fp, "*");
      Protobuf::write_varint($fp, strlen($this->authorId_));
      fwrite($fp, $this->authorId_);
    }
  }
  
  public function size() {
    $size = 0;
    if (!is_null($this->text_)) {
      $l = strlen($this->text_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->rating_)) {
      $size += 1 + Protobuf::size_varint($this->rating_);
    }
    if (!is_null($this->authorName_)) {
      $l = strlen($this->authorName_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->creationTime_)) {
      $size += 1 + Protobuf::size_varint($this->creationTime_);
    }
    if (!is_null($this->authorId_)) {
      $l = strlen($this->authorId_);
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
         . Protobuf::toString('text_', $this->text_)
         . Protobuf::toString('rating_', $this->rating_)
         . Protobuf::toString('authorName_', $this->authorName_)
         . Protobuf::toString('creationTime_', $this->creationTime_)
         . Protobuf::toString('authorId_', $this->authorId_);
  }
  
  // optional string text = 1;

  private $text_ = null;
  public function clearText() { $this->text_ = null; }
  public function hasText() { return $this->text_ !== null; }
  public function getText() { if($this->text_ === null) return ""; else return $this->text_; }
  public function setText($value) { $this->text_ = $value; }
  
  // optional int32 rating = 2;

  private $rating_ = null;
  public function clearRating() { $this->rating_ = null; }
  public function hasRating() { return $this->rating_ !== null; }
  public function getRating() { if($this->rating_ === null) return 0; else return $this->rating_; }
  public function setRating($value) { $this->rating_ = $value; }
  
  // optional string authorName = 3;

  private $authorName_ = null;
  public function clearAuthorName() { $this->authorName_ = null; }
  public function hasAuthorName() { return $this->authorName_ !== null; }
  public function getAuthorName() { if($this->authorName_ === null) return ""; else return $this->authorName_; }
  public function setAuthorName($value) { $this->authorName_ = $value; }
  
  // optional uint64 creationTime = 4;

  private $creationTime_ = null;
  public function clearCreationTime() { $this->creationTime_ = null; }
  public function hasCreationTime() { return $this->creationTime_ !== null; }
  public function getCreationTime() { if($this->creationTime_ === null) return 0; else return $this->creationTime_; }
  public function setCreationTime($value) { $this->creationTime_ = $value; }
  
  // optional string authorId = 5;

  private $authorId_ = null;
  public function clearAuthorId() { $this->authorId_ = null; }
  public function hasAuthorId() { return $this->authorId_ !== null; }
  public function getAuthorId() { if($this->authorId_ === null) return ""; else return $this->authorId_; }
  public function setAuthorId($value) { $this->authorId_ = $value; }
  
  // @@protoc_insertion_point(class_scope:Comment)
}