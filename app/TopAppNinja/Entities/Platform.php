<?php
namespace TopAppNinja\Entities;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model{
	
	protected $table = 'platforms';

	protected $fillable = array('PlatformName');

	protected $primaryKey = 'ID';

	public function professionals(){
		return $this -> belongsToMany('Professional', 'pros_platforms', 'PlatformID', 'ProfessionalID');
	}
}