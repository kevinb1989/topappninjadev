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

	public function scopeQueryJoiningTables($pQuery){
		return $pQuery -> join('pros_specs', 'professionals.ID', '=', 'pros_specs.professionalID')
			 -> join('specializations', 'specializations.ID', '=', 'pros_specs.specializationID')
			-> join('pros_creativefields', 'professionals.ID', '=', 'pros_creativefields.ProfessionalID')
			-> join('creativefields', 'pros_creativefields.CreativeFieldID', '=', 'creativefields.ID')
			-> join('pros_platforms', 'professionals.ID', '=', 'pros_platforms.ProfessionalID')
			-> join('platforms', 'platforms.ID', '=', 'pros_platforms.PlatformID')
			-> join('cities', 'professionals.CityID', '=', 'Cities.ID');
	}	

	public function scopeQueryCompanyName($pQuery, $pName){
		return $pQuery -> where('CompanyName', 'LIKE', '%' . $pName .'%');
	}

	public function scopeQuerySpecializations($pQuery, $pSpecializationsArr){
		return $pQuery -> whereIn('specializations.ID', $pSpecializationsArr);
	}

	public function scopeQueryCreativeFields($pQuery, $pCreativeFieldsArr){
		return $pQuery -> whereIn('creativefields.ID', $pCreativeFieldsArr);
	}

	public function scopeQueryPlatforms($pQuery, $pPlatformsArr){
		return $pQuery -> whereIn('platforms.ID', $pPlatformsArr);
	}

	public function scopeQueryCities($pQuery, $pCitiesArr){
		return $pQuery -> whereIn('cities.ID', $pCitiesArr);
	}

	public function scopeQueryPriceRangeBottom($pQuery, $pPriceRangeBottom){
		return $pQuery -> orWhere('professionals.PriceRangeBottom', '>=', $pPriceRangeBottom);
	}

	public function scopeQueryPriceRangeTop($pQuery, $pPriceRangeTop){
		return $pQuery -> orWhere('professionals.PriceRangeTop', '<=', $pPriceRangeTop);
	}
}