<?php
namespace TopAppNinja\Entities;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model{
	
	protected $table = 'portfolios';

	protected $primaryKey = 'ID';

	public function screenshots(){
		return $this -> hasMany('Screenshot');
	}
}