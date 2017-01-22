<?php

namespace App\Models;

use App\Traits\TahaModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Remark extends Model
{
	use TahaModelTrait , SoftDeletes ;
	protected $guarded = ['id'];
	public static $meta_fields = ['text'];
	protected $casts = [
			'meta' => 'array' ,
	];

	/*
	|--------------------------------------------------------------------------
	| Relations
	|--------------------------------------------------------------------------
	|
	*/
	public function note()
	{
		return $this->belongsTo('App\Models\Note');

	}

	/*
	|--------------------------------------------------------------------------
	| Accessors & Mutators
	|--------------------------------------------------------------------------
	|
	*/
	public function getUserAttribute()
	{
		return User::find($this->created_by);
	}



}
