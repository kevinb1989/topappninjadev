<?php
namespace TopAppNinja\Entities;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model{
	
	protected $table = 'specializations';

	protected $fillable = array('SpecializationName');

	protected $primaryKey = 'ID';
}