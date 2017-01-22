<?php

namespace App\Models;

use App\Traits\TahaModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Lang;

class Field extends Model
{
	use TahaModelTrait , SoftDeletes;

	protected $guarded = ['id'];
	public static $meta_fields = ['required' , 'data_type'];
	protected $casts = [
		'meta' => 'array' ,
	];
	public static $available_data_types = ['text' , 'textarea' , 'boolean' , 'date' ];//, 'photo'] ;


	/*
	|--------------------------------------------------------------------------
	| Relations
	|--------------------------------------------------------------------------
	|
	*/
	public function handle()
	{
		return $this->belongsTo('App\Models\Handle');

	}


	/*
	|--------------------------------------------------------------------------
	| Helper Functions
	|--------------------------------------------------------------------------
	|
	*/
	public function dataTypes()
	{
		$return = [] ;
		foreach(self::$available_data_types as $data_type)  {
			$trans = "manage.settings.downstream_settings.data_type.$data_type" ;
			if(Lang::has($trans))
				$caption = trans($trans);
			else
				$caption = $data_type ;
			array_push($return , [$data_type , $caption]) ;
		}

		return $return ;

	}

}
