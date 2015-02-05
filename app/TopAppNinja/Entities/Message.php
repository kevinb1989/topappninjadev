<?php
namespace TopAppNinja\Entities;
use Illuminate\Database\Eloquent\Model;

class Message extends Model{
	
	protected $table = 'messages';

	protected $guarded = array('ID');

	protected $primaryKey = 'ID';
}