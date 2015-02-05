<?php
namespace TopAppNinja\Entities;
use Illuminate\Database\Eloquent\Model;

class Country extends Model{
	
	protected $table = 'countries';
	
	protected $fillable = array('CountryName');
	
	protected $primaryKey = 'ID';

	public function states(){
		return $this -> hasMany('State');
	}

	public function cities(){
		return $this -> hasManyThrough('City', 'State', 'CountryID', 'StateID');
	}
}