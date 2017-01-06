<?php

namespace App\Models;

use App\Traits\TahaModelTrait;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
	use TahaModelTrait ;

	protected $guarded = ['id'];
	public static $meta_fields = ['type' , 'required'];
	protected $casts = [
		'meta' => 'array' ,
	];

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

}
