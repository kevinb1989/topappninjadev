<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;

// message App
class Android_App {
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
      //var_dump("App: Found $field type " . Protobuf::get_wiretype($wire) . " $limit bytes left");
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
          $this->id_ = $tmp;
          $limit-=$len;
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
          $this->title_ = $tmp;
          $limit-=$len;
          break;
        case 3:
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
          $this->creator_ = $tmp;
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
          $this->version_ = $tmp;
          $limit-=$len;
          break;
        case 6:
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
          $this->price_ = $tmp;
          $limit-=$len;
          break;
        case 7:
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
          $this->rating_ = $tmp;
          $limit-=$len;
          break;
        case 8:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->ratingsCount_ = $tmp;
          
          break;
        case 12:
          ASSERT('$wire == 3');
          $this->extendedinfo_ = new App_ExtendedInfo($fp, $limit);
          break;
        case 22:
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
          $this->creatorId_ = $tmp;
          $limit-=$len;
          break;
        case 24:
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
          $this->packageName_ = $tmp;
          $limit-=$len;
          break;
        case 25:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->versionCode_ = $tmp;
          
          break;
        case 32:
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
          $this->priceCurrency_ = $tmp;
          $limit-=$len;
          break;
        case 33:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->priceMicros_ = $tmp;
          
          break;
		case 40:
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
          $this->originalPrice_ = $tmp;
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
    if (!is_null($this->id_)) {
      fwrite($fp, "\x0a");
      Protobuf::write_varint($fp, strlen($this->id_));
      fwrite($fp, $this->id_);
    }
    if (!is_null($this->title_)) {
      fwrite($fp, "\x12");
      Protobuf::write_varint($fp, strlen($this->title_));
      fwrite($fp, $this->title_);
    }
    if (!is_null($this->appType_)) {
      fwrite($fp, "\x18");
      Protobuf::write_varint($fp, $this->appType_);
    }
    if (!is_null($this->creator_)) {
      fwrite($fp, "\"");
      Protobuf::write_varint($fp, strlen($this->creator_));
      fwrite($fp, $this->creator_);
    }
    if (!is_null($this->version_)) {
      fwrite($fp, "*");
      Protobuf::write_varint($fp, strlen($this->version_));
      fwrite($fp, $this->version_);
    }
    if (!is_null($this->price_)) {
      fwrite($fp, "2");
      Protobuf::write_varint($fp, strlen($this->price_));
      fwrite($fp, $this->price_);
    }
    if (!is_null($this->rating_)) {
      fwrite($fp, ":");
      Protobuf::write_varint($fp, strlen($this->rating_));
      fwrite($fp, $this->rating_);
    }
    if (!is_null($this->ratingsCount_)) {
      fwrite($fp, "@");
      Protobuf::write_varint($fp, $this->ratingsCount_);
    }
    if (!is_null($this->extendedinfo_)) {
      fwrite($fp, "c");
      $this->extendedinfo_->write($fp); // group
      fwrite($fp, "d");
    }
    if (!is_null($this->creatorId_)) {
      fwrite($fp, "\xb2\x01");
      Protobuf::write_varint($fp, strlen($this->creatorId_));
      fwrite($fp, $this->creatorId_);
    }
    if (!is_null($this->packageName_)) {
      fwrite($fp, "\xc2\x01");
      Protobuf::write_varint($fp, strlen($this->packageName_));
      fwrite($fp, $this->packageName_);
    }
    if (!is_null($this->versionCode_)) {
      fwrite($fp, "\xc8\x01");
      Protobuf::write_varint($fp, $this->versionCode_);
    }
    if (!is_null($this->priceCurrency_)) {
      fwrite($fp, "\x82\x02");
      Protobuf::write_varint($fp, strlen($this->priceCurrency_));
      fwrite($fp, $this->priceCurrency_);
    }
    if (!is_null($this->priceMicros_)) {
      fwrite($fp, "\x88\x02");
      Protobuf::write_varint($fp, $this->priceMicros_);
    }
	if (!is_null($this->originalPrice_)) {
      fwrite($fp, "2");
      Protobuf::write_varint($fp, strlen($this->originalPrice_));
      fwrite($fp, $this->originalPrice_);
    }
  }
  
  public function size() {
    $size = 0;
    if (!is_null($this->id_)) {
      $l = strlen($this->id_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->title_)) {
      $l = strlen($this->title_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->appType_)) {
      $size += 1 + Protobuf::size_varint($this->appType_);
    }
    if (!is_null($this->creator_)) {
      $l = strlen($this->creator_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->version_)) {
      $l = strlen($this->version_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->price_)) {
      $l = strlen($this->price_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->rating_)) {
      $l = strlen($this->rating_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->ratingsCount_)) {
      $size += 1 + Protobuf::size_varint($this->ratingsCount_);
    }
    if (!is_null($this->extendedinfo_)) {
      $size += 2 + $this->extendedinfo_->size();
    }
    if (!is_null($this->creatorId_)) {
      $l = strlen($this->creatorId_);
      $size += 2 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->packageName_)) {
      $l = strlen($this->packageName_);
      $size += 2 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->versionCode_)) {
      $size += 2 + Protobuf::size_varint($this->versionCode_);
    }
    if (!is_null($this->priceCurrency_)) {
      $l = strlen($this->priceCurrency_);
      $size += 2 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->priceMicros_)) {
      $size += 2 + Protobuf::size_varint($this->priceMicros_);
    }
	if (!is_null($this->originalPrice_)) {
      $size += 2 + Protobuf::size_varint($this->originalPrice_);
    }
    return $size;
  }
  
  public function validateRequired() {
    return true;
  }
  
  public function __toString() {
    return ''
         . Protobuf::toString('unknown', $this->_unknown)
         . Protobuf::toString('id_', $this->id_)
         . Protobuf::toString('title_', $this->title_)
         . Protobuf::toString('appType_', AppType::toString($this->appType_))
         . Protobuf::toString('creator_', $this->creator_)
         . Protobuf::toString('version_', $this->version_)
         . Protobuf::toString('price_', $this->price_)
         . Protobuf::toString('rating_', $this->rating_)
         . Protobuf::toString('ratingsCount_', $this->ratingsCount_)
         . Protobuf::toString('extendedinfo_', $this->extendedinfo_)
         . Protobuf::toString('creatorId_', $this->creatorId_)
         . Protobuf::toString('packageName_', $this->packageName_)
         . Protobuf::toString('versionCode_', $this->versionCode_)
         . Protobuf::toString('priceCurrency_', $this->priceCurrency_)
         . Protobuf::toString('priceMicros_', $this->priceMicros_)
		 . Protobuf::toString('originalPrice_', $this->originalPrice_);
  }
  
  // optional string id = 1;

  private $id_ = null;
  public function clearId() { $this->id_ = null; }
  public function hasId() { return $this->id_ !== null; }
  public function getId() { if($this->id_ === null) return ""; else return $this->id_; }
  public function setId($value) { $this->id_ = $value; }
  
  // optional string title = 2;

  private $title_ = null;
  public function clearTitle() { $this->title_ = null; }
  public function hasTitle() { return $this->title_ !== null; }
  public function getTitle() { if($this->title_ === null) return ""; else return $this->title_; }
  public function setTitle($value) { $this->title_ = $value; }
  
  // optional .AppType appType = 3 [default = NONE];

  private $appType_ = null;
  public function clearAppType() { $this->appType_ = null; }
  public function hasAppType() { return $this->appType_ !== null; }
  public function getAppType() { if($this->appType_ === null) return AppType::NONE; else return $this->appType_; }
  public function setAppType($value) { $this->appType_ = $value; }
  
  // optional string creator = 4;

  private $creator_ = null;
  public function clearCreator() { $this->creator_ = null; }
  public function hasCreator() { return $this->creator_ !== null; }
  public function getCreator() { if($this->creator_ === null) return ""; else return $this->creator_; }
  public function setCreator($value) { $this->creator_ = $value; }
  
  // optional string version = 5;

  private $version_ = null;
  public function clearVersion() { $this->version_ = null; }
  public function hasVersion() { return $this->version_ !== null; }
  public function getVersion() { if($this->version_ === null) return ""; else return $this->version_; }
  public function setVersion($value) { $this->version_ = $value; }
  
  // optional string price = 6;

  private $price_ = null;
  public function clearPrice() { $this->price_ = null; }
  public function hasPrice() { return $this->price_ !== null; }
  public function getPrice() { if($this->price_ === null) return ""; else return $this->price_; }
  public function setPrice($value) { $this->price_ = $value; }
  
  // optional string rating = 7;

  private $rating_ = null;
  public function clearRating() { $this->rating_ = null; }
  public function hasRating() { return $this->rating_ !== null; }
  public function getRating() { if($this->rating_ === null) return ""; else return $this->rating_; }
  public function setRating($value) { $this->rating_ = $value; }
  
  // optional int32 ratingsCount = 8;

  private $ratingsCount_ = null;
  public function clearRatingsCount() { $this->ratingsCount_ = null; }
  public function hasRatingsCount() { return $this->ratingsCount_ !== null; }
  public function getRatingsCount() { if($this->ratingsCount_ === null) return 0; else return $this->ratingsCount_; }
  public function setRatingsCount($value) { $this->ratingsCount_ = $value; }
  
  // optional group ExtendedInfo = 12
  private $extendedinfo_ = null;
  public function clearExtendedinfo() { $this->extendedinfo_ = null; }
  public function hasExtendedinfo() { return $this->extendedinfo_ !== null; }
  public function getExtendedinfo() { if($this->extendedinfo_ === null) return null; else return $this->extendedinfo_; }
  public function setExtendedinfo(App_ExtendedInfo $value) { $this->extendedinfo_ = $value; }
  
  // optional string creatorId = 22;

  private $creatorId_ = null;
  public function clearCreatorId() { $this->creatorId_ = null; }
  public function hasCreatorId() { return $this->creatorId_ !== null; }
  public function getCreatorId() { if($this->creatorId_ === null) return ""; else return $this->creatorId_; }
  public function setCreatorId($value) { $this->creatorId_ = $value; }
  
  // optional string packageName = 24;

  private $packageName_ = null;
  public function clearPackageName() { $this->packageName_ = null; }
  public function hasPackageName() { return $this->packageName_ !== null; }
  public function getPackageName() { if($this->packageName_ === null) return ""; else return $this->packageName_; }
  public function setPackageName($value) { $this->packageName_ = $value; }
  
  // optional int32 versionCode = 25;

  private $versionCode_ = null;
  public function clearVersionCode() { $this->versionCode_ = null; }
  public function hasVersionCode() { return $this->versionCode_ !== null; }
  public function getVersionCode() { if($this->versionCode_ === null) return 0; else return $this->versionCode_; }
  public function setVersionCode($value) { $this->versionCode_ = $value; }
  
  // optional string priceCurrency = 32;

  private $priceCurrency_ = null;
  public function clearPriceCurrency() { $this->priceCurrency_ = null; }
  public function hasPriceCurrency() { return $this->priceCurrency_ !== null; }
  public function getPriceCurrency() { if($this->priceCurrency_ === null) return ""; else return $this->priceCurrency_; }
  public function setPriceCurrency($value) { $this->priceCurrency_ = $value; }
  
  // optional int32 priceMicros = 33;

  private $priceMicros_ = null;
  public function clearPriceMicros() { $this->priceMicros_ = null; }
  public function hasPriceMicros() { return $this->priceMicros_ !== null; }
  public function getPriceMicros() { if($this->priceMicros_ === null) return 0; else return $this->priceMicros_; }
  public function setPriceMicros($value) { $this->priceMicros_ = $value; }
  
  // optional string originalPrice = 40;

  private $originalPrice_ = null;
  public function clearoriginalPrice() { $this->originalPrice_ = null; }
  public function hasoriginalPrice() { return $this->originalPrice_ !== null; }
  public function getoriginalPrice() { if($this->originalPrice_ === null) return ""; else return $this->originalPrice_; }
  public function setoriginalPrice($value) { $this->originalPrice_ = $value; }
  
  // @@protoc_insertion_point(class_scope:App)
}