<?php

namespace App\Models;

use App\Traits\TahaModelTrait;
use Illuminate\Database\Eloquent\Model;

class Handle extends Model
{
	use TahaModelTrait  ;

	protected $guarded = ['id'];
	public static $meta_fields = ['color_code' , 'icon'];
	protected $casts = [
		'meta' => 'array' ,
		'fields' => 'array' ,
	];
	public static $available_color_codes = ['blue','red','orange','purple','green','teal','gray','dark','brown'];//,'white'] ;
	public static $available_icons = ['bookmark' , 'star', 'car' , 'cutlery' , 'male' , 'female' , 'plane' , 'book' , 'envelope' , 'film'  , 'file-text-o' , 'save' ,
			'music' , 'flag' , 'tree' , 'hourglass-half' , 'paper-plane-o' , 'square' , 'circle' , 'dot-circle-o' , 'check-square-o' , 'tag' , 'credit-card' , 'money'] ;


	/*
	|--------------------------------------------------------------------------
	| Relations
	|--------------------------------------------------------------------------
	|
	*/

	public function entries()
	{
		return $this->hasMany('App\Models\Entry');
	}


	public function fields()
	{
		return $this->hasMany('App\Models\Field');
	}

	/*
	|--------------------------------------------------------------------------
	| Accessors and Mutuators
	|--------------------------------------------------------------------------
	|
	*/
	public function getAvailableColorCodesAttribute()
	{
		return self::$available_color_codes ;
	}

	public function getAvailableIconsAttribute()
	{
		return self::$available_icons ;
	}



	/*
	|--------------------------------------------------------------------------
	| Selectors
	|--------------------------------------------------------------------------
	|
	*/

	public static function selector($criteria='all')
	{

		$table = self::where('id' , '>' , 0) ;

		//Process Search...
		if(str_contains($criteria , 'search')) {
			$keyword = str_replace('search:' , null , $criteria) ;
			$criteria = 'search' ;
		}

		//Process Criteria...
		switch ($criteria) {
			case 'bin' :
				return $table->onlyTrashed();
			case 'all' :
				return $table ;
			case 'search' :
				return $table->whereRaw(self::searchRawQuery($keyword, self::$search_fields));
			default:
				return $table->whereNull('id');
		}

	}
}
