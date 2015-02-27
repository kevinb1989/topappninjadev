<?php
namespace TopAppNinja\Entities;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\BillableInterface;
use Laravel\Cashier\BillableTrait;

class Professional extends Model{

	//use BillableTrait;

	protected $table = 'professionals';

	protected $primaryKey = 'ID';

	protected $fillable = array('FirstName', 'LastName', 'Email', 'Password',
		'Address', 'PostCode', 'CityID', 'ContactNo', 'ProfessionalType', 'CompanyName',
		'CompanyURL', 'Description', 'Logo', 'Facebook', 'Twitter', 'GooglePlus', 'LinkedIn',
		'Behance', 'Pinterest', 'Blog', 'Accolades', 'PriceRangeBottom', 'PriceRangeTop', 'Views'
		);

	protected $guarded = array('ID', 'Password', 'remember_token');

	protected $dates = ['trials_end_at', 'subscription_ends_at'];

	public function city(){
		return $this -> belongsTo('TopAppNinja\Entities\City', 'CityID');
	}

	public function messages(){
		return $this -> hasMany('TopAppNinja\Entities\Message');
	}

	public function mainClients(){
		return $this -> hasMany('TopAppNinja\Entities\MainClient', 'ProfessionalID');
	}

	public function clientFocuses(){
		return $this -> belongsToMany('TopAppNinja\Entities\ClientFocus', 'pros_clientfocuses',
		 'ProfessionalID', 'ClientFocusID');
	}

	public function creativeFields(){
		return $this -> belongsToMany('TopAppNinja\Entities\CreativeField', 'pros_creativefields',
			'ProfessionalID', 'CreativeFieldID');
	}

	public function platforms(){
		return $this -> belongsToMany('TopAppNinja\Entities\Platform', 'pros_platforms',
		 'ProfessionalID', 'PlatformID');
	}

	public function specializations(){
		return $this -> belongsToMany('TopAppNinja\Entities\Specialization', 'pros_specs',
			'ProfessionalID', 'SpecializationID');	
	}

	public function portfolios(){
		return $this -> hasMany('Portfolio');
	}
}