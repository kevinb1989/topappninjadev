<?php
namespace TopAppNinja\Entities;
use Illuminate\Database\Eloquent\Model;

class MainClient extends Model{
	
	protected $table = 'mainclients';

	protected $primaryKey = 'ID';

	protected $fillable = array('MainClientName', 'ProfessionalID');

	public function professional(){
		return $this -> belongsTo('TopAppNinja\Entities\Professional');
	}
}