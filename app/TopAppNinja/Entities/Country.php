<?php
namespace TopAppNinja\Entities;
use Illuminate\Database\Eloquent\Model;

class Country extends Model{
	
	protected $table = 'countries';
	
	protected $fillable = array('CountryName');
	
	protected $primaryKey = 'ID';

	public function states(){
		return $this -> hasMany('TopAppNinja\Entities\State', 'CountryID');
	}

	public function cities(){
		return $this -> hasManyThrough('TopAppNinja\Entities\City', 'TopAppNinja\Entities\State', 'CountryID', 'StateID');
	}
}