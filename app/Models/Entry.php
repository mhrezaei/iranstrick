<?php

namespace App\Models;

use App\Traits\TahaModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\jDate;

class Entry extends Model
{
	use TahaModelTrait , SoftDeletes;

	protected $guarded = ['id'];
	public static $meta_fields = ['dynamic'];
	protected $casts = [
		'meta' => 'array' ,
		'begins_at' => 'datetime' ,
		'ends_at' => 'datetime' ,
	];
	public $readonly = false ;


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

	public function field($field_id)
	{
		$this->spreadMeta() ;
		return $this->toArray()["field_$field_id"] ;
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

	public function getFieldsAttribute()
	{
		return $this->handle->fields ;
	}


	/*
	|--------------------------------------------------------------------------
	| Selectors
	|--------------------------------------------------------------------------
	|
	*/
	/**
	 * @param array $para, supporting 'user_id' , 'handle_id' , 'begins_before' , 'begins_after' , 'ends_before' , 'ends_after' , which may be used individually, or all together.
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

		if(isset($para['handle_id']))
			$table = $table->where('handle_id' , $para['handle_id']) ;

		if(isset($para['begins_before']))
			$table = $table->whereDate('begins_at' , '<=' , $para['begins_before']) ;
		if(isset($para['ends_before']))
			$table = $table->whereDate('ends_at' , '<=' , $para['ends_before']) ;

		if(isset($para['begins_after']))
			$table = $table->whereDate('begins_at' , '>=' , $para['begins_after']) ;
		if(isset($para['ends_after']))
			$table = $table->whereDate('ends_at' , '>=' , $para['ends_after']) ;

		//Return...
		return $table ;

	}

	/*
	|--------------------------------------------------------------------------
	| Helpers
	|--------------------------------------------------------------------------
	|
	*/
	public function canSave()
	{
		if(!$this->id)
			return true ;
		if($this->readonly)
			return false ;

		return Auth::user()->can('calendar.edit') ;

	}

	public function canRemark()
	{
		return Auth::user()->can('calendar.process');
	}
}
