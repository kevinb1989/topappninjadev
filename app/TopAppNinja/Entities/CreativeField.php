<?php
namespace TopAppNinja\Entities;
use Illuminate\Database\Eloquent\Model;

class CreativeField extends Model{
	
	protected $table = 'creativefields';

	protected $primaryKey = 'ID';

	protected $fillable = array('CreativeFieldName');
}