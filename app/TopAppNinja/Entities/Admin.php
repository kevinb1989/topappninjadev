<?php
namespace TopAppNinja\Entities;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model{
	
	protected $table = 'admins';

	protected $primaryKey = 'ID';

	protected $guarded = array('ID');
}