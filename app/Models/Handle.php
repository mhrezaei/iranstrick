<?php

namespace App\Models;

use App\Traits\TahaModelTrait;
use Illuminate\Database\Eloquent\Model;

class Handle extends Model
{
	use TahaModelTrait  ;

	protected $guarded = ['id'];
	public static $meta_fields = ['color_code'];
	protected $casts = [
		'meta' => 'array' ,
		'fields' => 'array' ,
	];
	public static $available_color_codes = ['red','orange','purple','green','teal','blue','gray','dark','brown','white'] ;

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
