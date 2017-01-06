<?php

namespace App\Models;

use App\Traits\TahaModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
	use TahaModelTrait , SoftDeletes;

	protected $guarded = ['id'];
	public static $meta_fields = ['dynamic'];
	protected $casts = [
		'meta' => 'array' ,
		'date' => 'datetime' ,
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

	public function remarks()
	{
		return $this->hasMany('App\Models\Remark');
	}


	/*
	|--------------------------------------------------------------------------
	| Accessors & Mutators
	|--------------------------------------------------------------------------
	|
	*/
	public function getUserAttribute()
	{
		return User::find($this->created_by) ;
	}


	/*
	|--------------------------------------------------------------------------
	| Selectors
	|--------------------------------------------------------------------------
	|
	*/
	/**
	 * @param array $para, supporting 'user_id' , 'day' , 'from' , 'to', which may be used individually, or all together.
	 * @return Eloquent table
	 */
	public static function selector($para = [])
	{
		//Handling Parameters...
		if(!is_array($para)) {
			if(is_int($para))
				$para['user_id'] = $para ;
			else
				$para['day'] = $para ;
		}

		//Query...
		$table = self::where('id' , '>' , 0) ;

		if(isset($para['user_id']))
			$table = $table->where('created_by' , $para['user_id']) ;

		if(isset($para['day']))
			$table = $table->whereDate('date' , '=' , $para['day']) ;

		if(isset($para['from']))
			$table = $table->whereDate('date' , '>' , $para['from']) ;

		if(isset($para['to']))
			$table = $table->whereDate('date' , '<' , $para['to']) ;

		//Return...
		return $table ;

	}
}
