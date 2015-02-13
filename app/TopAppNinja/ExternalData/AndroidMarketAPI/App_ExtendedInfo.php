<?php

/**
 *  @author Niklas Nilsson <splitfeed@gmail.com>
 *  market.proto.php
 *
 */
namespace TopAppNinja\ExternalData\AndroidMarketAPI;

// group App.ExtendedInfo
class App_ExtendedInfo {
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
      //var_dump("App_ExtendedInfo: Found $field type " . Protobuf::get_wiretype($wire) . " $limit bytes left");
      switch($field) {
        case 12:
          ASSERT('$wire == 4');
          break 2;
        case 13:
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
          $this->description_ = $tmp;
          $limit-=$len;
          break;
        case 14:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->downloadsCount_ = $tmp;
          
          break;
        case 15:
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
          $this->permissionId_[] = $tmp;
          $limit-=$len;
          break;
        case 16:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->installSize_ = $tmp;
          
          break;
        case 17:
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
        case 18:
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
          $this->category_ = $tmp;
          $limit-=$len;
          break;
        case 20:
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
          $this->contactEmail_ = $tmp;
          $limit-=$len;
          break;
        case 23:
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
          $this->downloadsCountText_ = $tmp;
          $limit-=$len;
          break;
        case 26:
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
          $this->contactPhone_ = $tmp;
          $limit-=$len;
          break;
        case 27:
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
          $this->contactWebsite_ = $tmp;
          $limit-=$len;
          break;
        case 30:
          ASSERT('$wire == 0');
          $tmp = Protobuf::read_varint($fp, $limit);
          if ($tmp === false)
            throw new Exception('Protobuf::read_varint returned false');
          $this->screenshotsCount_ = $tmp;
          
          break;
        case 31:
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
          $this->promoText_ = $tmp;
          $limit-=$len;
          break;
		case 37:
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
          $this->maturity_ = $tmp;
          $limit-=$len;
          break;
        case 38:
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
          $this->recentChanges_ = $tmp;
          $limit-=$len;
          break;
        case 43:
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
          $this->promotionalVideo_ = $tmp;
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
    if (!is_null($this->description_)) {
      fwrite($fp, "j");
      Protobuf::write_varint($fp, strlen($this->description_));
      fwrite($fp, $this->description_);
    }
    if (!is_null($this->downloadsCount_)) {
      fwrite($fp, "p");
      Protobuf::write_varint($fp, $this->downloadsCount_);
    }
    if (!is_null($this->permissionId_))
      foreach($this->permissionId_ as $v) {
        fwrite($fp, "z");
        Protobuf::write_varint($fp, strlen($v));
        fwrite($fp, $v);
      }
    if (!is_null($this->installSize_)) {
      fwrite($fp, "\x80\x01");
      Protobuf::write_varint($fp, $this->installSize_);
    }
    if (!is_null($this->packageName_)) {
      fwrite($fp, "\x8a\x01");
      Protobuf::write_varint($fp, strlen($this->packageName_));
      fwrite($fp, $this->packageName_);
    }
    if (!is_null($this->category_)) {
      fwrite($fp, "\x92\x01");
      Protobuf::write_varint($fp, strlen($this->category_));
      fwrite($fp, $this->category_);
    }
    if (!is_null($this->contactEmail_)) {
      fwrite($fp, "\xa2\x01");
      Protobuf::write_varint($fp, strlen($this->contactEmail_));
      fwrite($fp, $this->contactEmail_);
    }
    if (!is_null($this->downloadsCountText_)) {
      fwrite($fp, "\xba\x01");
      Protobuf::write_varint($fp, strlen($this->downloadsCountText_));
      fwrite($fp, $this->downloadsCountText_);
    }
    if (!is_null($this->contactPhone_)) {
      fwrite($fp, "\xd2\x01");
      Protobuf::write_varint($fp, strlen($this->contactPhone_));
      fwrite($fp, $this->contactPhone_);
    }
    if (!is_null($this->contactWebsite_)) {
      fwrite($fp, "\xda\x01");
      Protobuf::write_varint($fp, strlen($this->contactWebsite_));
      fwrite($fp, $this->contactWebsite_);
    }
    if (!is_null($this->screenshotsCount_)) {
      fwrite($fp, "\xf0\x01");
      Protobuf::write_varint($fp, $this->screenshotsCount_);
    }
    if (!is_null($this->promoText_)) {
      fwrite($fp, "\xfa\x01");
      Protobuf::write_varint($fp, strlen($this->promoText_));
      fwrite($fp, $this->promoText_);
    }
    if (!is_null($this->recentChanges_)) {
      fwrite($fp, "\xb2\x02");
      Protobuf::write_varint($fp, strlen($this->recentChanges_));
      fwrite($fp, $this->recentChanges_);
    }
    if (!is_null($this->promotionalVideo_)) {
      fwrite($fp, "\xda\x02");
      Protobuf::write_varint($fp, strlen($this->promotionalVideo_));
      fwrite($fp, $this->promotionalVideo_);
    }
	if (!is_null($this->maturity_)) {
      fwrite($fp, "\xfa\x01");
      Protobuf::write_varint($fp, strlen($this->maturity_));
      fwrite($fp, $this->maturity_);
    }
  }
  
  public function size() {
    $size = 0;
    if (!is_null($this->description_)) {
      $l = strlen($this->description_);
      $size += 1 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->downloadsCount_)) {
      $size += 1 + Protobuf::size_varint($this->downloadsCount_);
    }
    if (!is_null($this->permissionId_))
      foreach($this->permissionId_ as $v) {
        $l = strlen($v);
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
    if (!is_null($this->installSize_)) {
      $size += 2 + Protobuf::size_varint($this->installSize_);
    }
    if (!is_null($this->packageName_)) {
      $l = strlen($this->packageName_);
      $size += 2 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->category_)) {
      $l = strlen($this->category_);
      $size += 2 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->contactEmail_)) {
      $l = strlen($this->contactEmail_);
      $size += 2 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->downloadsCountText_)) {
      $l = strlen($this->downloadsCountText_);
      $size += 2 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->contactPhone_)) {
      $l = strlen($this->contactPhone_);
      $size += 2 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->contactWebsite_)) {
      $l = strlen($this->contactWebsite_);
      $size += 2 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->screenshotsCount_)) {
      $size += 2 + Protobuf::size_varint($this->screenshotsCount_);
    }
    if (!is_null($this->promoText_)) {
      $l = strlen($this->promoText_);
      $size += 2 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->recentChanges_)) {
      $l = strlen($this->recentChanges_);
      $size += 2 + Protobuf::size_varint($l) + $l;
    }
    if (!is_null($this->promotionalVideo_)) {
      $l = strlen($this->promotionalVideo_);
      $size += 2 + Protobuf::size_varint($l) + $l;
    }
	if (!is_null($this->maturity_)) {
      $l = strlen($this->maturity_);
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
         . Protobuf::toString('description_', $this->description_)
         . Protobuf::toString('downloadsCount_', $this->downloadsCount_)
         . Protobuf::toString('permissionId_', $this->permissionId_)
         . Protobuf::toString('installSize_', $this->installSize_)
         . Protobuf::toString('packageName_', $this->packageName_)
         . Protobuf::toString('category_', $this->category_)
         . Protobuf::toString('contactEmail_', $this->contactEmail_)
         . Protobuf::toString('downloadsCountText_', $this->downloadsCountText_)
         . Protobuf::toString('contactPhone_', $this->contactPhone_)
         . Protobuf::toString('contactWebsite_', $this->contactWebsite_)
         . Protobuf::toString('screenshotsCount_', $this->screenshotsCount_)
         . Protobuf::toString('promoText_', $this->promoText_)
		 . Protobuf::toString('maturity_', $this->maturity_)
         . Protobuf::toString('recentChanges_', $this->recentChanges_)
         . Protobuf::toString('promotionalVideo_', $this->promotionalVideo_);
  }
  
  // optional string description = 13;

  private $description_ = null;
  public function clearDescription() { $this->description_ = null; }
  public function hasDescription() { return $this->description_ !== null; }
  public function getDescription() { if($this->description_ === null) return ""; else return $this->description_; }
  public function setDescription($value) { $this->description_ = $value; }
  
  // optional int32 downloadsCount = 14;

  private $downloadsCount_ = null;
  public function clearDownloadsCount() { $this->downloadsCount_ = null; }
  public function hasDownloadsCount() { return $this->downloadsCount_ !== null; }
  public function getDownloadsCount() { if($this->downloadsCount_ === null) return 0; else return $this->downloadsCount_; }
  public function setDownloadsCount($value) { $this->downloadsCount_ = $value; }
  
  // repeated string permissionId = 15;

  private $permissionId_ = null;
  public function clearPermissionId() { $this->permissionId_ = null; }
  public function getPermissionIdCount() { if ($this->permissionId_ === null ) return 0; else return count($this->permissionId_); }
  public function getPermissionId($index) { return $this->permissionId_[$index]; }
  public function getPermissionIdArray() { if ($this->permissionId_ === null ) return array(); else return $this->permissionId_; }
  public function setPermissionId($index, $value) {$this->permissionId_[$index] = $value;	}
  public function addPermissionId($value) { $this->permissionId_[] = $value; }
  public function addAllPermissionId(array $values) { foreach($values as $value) {$this->permissionId_[] = $value;} }
  
  // optional int32 installSize = 16;

  private $installSize_ = null;
  public function clearInstallSize() { $this->installSize_ = null; }
  public function hasInstallSize() { return $this->installSize_ !== null; }
  public function getInstallSize() { if($this->installSize_ === null) return 0; else return $this->installSize_; }
  public function setInstallSize($value) { $this->installSize_ = $value; }
  
  // optional string packageName = 17;

  private $packageName_ = null;
  public function clearPackageName() { $this->packageName_ = null; }
  public function hasPackageName() { return $this->packageName_ !== null; }
  public function getPackageName() { if($this->packageName_ === null) return ""; else return $this->packageName_; }
  public function setPackageName($value) { $this->packageName_ = $value; }
  
  // optional string category = 18;

  private $category_ = null;
  public function clearCategory() { $this->category_ = null; }
  public function hasCategory() { return $this->category_ !== null; }
  public function getCategory() { if($this->category_ === null) return ""; else return $this->category_; }
  public function setCategory($value) { $this->category_ = $value; }
  
  // optional string contactEmail = 20;

  private $contactEmail_ = null;
  public function clearContactEmail() { $this->contactEmail_ = null; }
  public function hasContactEmail() { return $this->contactEmail_ !== null; }
  public function getContactEmail() { if($this->contactEmail_ === null) return ""; else return $this->contactEmail_; }
  public function setContactEmail($value) { $this->contactEmail_ = $value; }
  
  // optional string downloadsCountText = 23;

  private $downloadsCountText_ = null;
  public function clearDownloadsCountText() { $this->downloadsCountText_ = null; }
  public function hasDownloadsCountText() { return $this->downloadsCountText_ !== null; }
  public function getDownloadsCountText() { if($this->downloadsCountText_ === null) return ""; else return $this->downloadsCountText_; }
  public function setDownloadsCountText($value) { $this->downloadsCountText_ = $value; }
  
  // optional string contactPhone = 26;

  private $contactPhone_ = null;
  public function clearContactPhone() { $this->contactPhone_ = null; }
  public function hasContactPhone() { return $this->contactPhone_ !== null; }
  public function getContactPhone() { if($this->contactPhone_ === null) return ""; else return $this->contactPhone_; }
  public function setContactPhone($value) { $this->contactPhone_ = $value; }
  
  // optional string contactWebsite = 27;

  private $contactWebsite_ = null;
  public function clearContactWebsite() { $this->contactWebsite_ = null; }
  public function hasContactWebsite() { return $this->contactWebsite_ !== null; }
  public function getContactWebsite() { if($this->contactWebsite_ === null) return ""; else return $this->contactWebsite_; }
  public function setContactWebsite($value) { $this->contactWebsite_ = $value; }
  
  // optional int32 screenshotsCount = 30;

  private $screenshotsCount_ = null;
  public function clearScreenshotsCount() { $this->screenshotsCount_ = null; }
  public function hasScreenshotsCount() { return $this->screenshotsCount_ !== null; }
  public function getScreenshotsCount() { if($this->screenshotsCount_ === null) return 0; else return $this->screenshotsCount_; }
  public function setScreenshotsCount($value) { $this->screenshotsCount_ = $value; }
  
  // optional string promoText = 31;

  private $promoText_ = null;
  public function clearPromoText() { $this->promoText_ = null; }
  public function hasPromoText() { return $this->promoText_ !== null; }
  public function getPromoText() { if($this->promoText_ === null) return ""; else return $this->promoText_; }
  public function setPromoText($value) { $this->promoText_ = $value; }
  
  // optional string maturity = 37;

  private $maturity_ = null;
  public function clearMaturity() { $this->maturity_ = null; }
  public function hasMaturity() { return $this->maturity_ !== null; }
  public function getMaturity() { if($this->maturity_ === null) return ""; else return $this->maturity_; }
  public function setMaturity($value) { $this->maturity_ = $value; }
  
  // optional string recentChanges = 38;

  private $recentChanges_ = null;
  public function clearRecentChanges() { $this->recentChanges_ = null; }
  public function hasRecentChanges() { return $this->recentChanges_ !== null; }
  public function getRecentChanges() { if($this->recentChanges_ === null) return ""; else return $this->recentChanges_; }
  public function setRecentChanges($value) { $this->recentChanges_ = $value; }
  
  // optional string promotionalVideo = 43;

  private $promotionalVideo_ = null;
  public function clearPromotionalVideo() { $this->promotionalVideo_ = null; }
  public function hasPromotionalVideo() { return $this->promotionalVideo_ !== null; }
  public function getPromotionalVideo() { if($this->promotionalVideo_ === null) return ""; else return $this->promotionalVideo_; }
  public function setPromotionalVideo($value) { $this->promotionalVideo_ = $value; }
  
  // @@protoc_insertion_point(class_scope:App.ExtendedInfo)
}