<?php
namespace TopAppNinja\Entities;
use Illuminate\Database\Eloquent\Model;

class State extends Model{
	
	protected $table = 'states';

	protected $primaryKey = 'ID';

	public function cities(){
		return $this -> hasMany('City');
	}
}