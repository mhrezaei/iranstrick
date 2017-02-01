<?php

namespace App\Models;

use App\Traits\TahaModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Applicant extends Model
{
	use TahaModelTrait , SoftDeletes ;

	protected $guarded = ['id'] ;

	protected $casts = [
		'meta' => "array",
	];
	protected static $search_fields = ['name_first' , 'name_last' , 'code_melli' , 'email' , 'mobile'] ;

	public static $meta_fields = [

	];

	/*
	|--------------------------------------------------------------------------
	| Relations
	|--------------------------------------------------------------------------
	|
	*/
	public function post()
	{
		return $this->belongsTo('App\Models\Post') ;
	}

	/*
	|--------------------------------------------------------------------------
	| Accessors & Mutators
	|--------------------------------------------------------------------------
	|
	*/
	public function getFullNameAttribute()
	{
		return $this->name_first.' '.$this->name_last ;
	}


	/*--------------------------------------------------------------------------
	| Helpers ...
	*/
	public function canDelete()
	{
		if(!$this->id)
			return false ;

		return Auth::user()->can('applicants.delete') ;
	}

	public static function searchRawQuery($keyword, $fields = null)
	{
		if(!$fields)
			$fields = self::$search_fields ;

		$concat_string = " " ;
		foreach($fields as $field) {
			$concat_string .= " , `$field` " ;
		}

		return " LOCATE('$keyword' , CONCAT_WS(' ' $concat_string)) " ;
	}


}
