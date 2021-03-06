<?php

namespace App\Models;

use App\Traits\TahaModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class Setting extends Model
{
	public static $available_data_types = ['text' , 'textarea' , 'boolean' , 'date' , 'photo' , 'array'] ;
	public static $available_categories = ['socials' , 'contact' , 'template' , 'database'] ;
	public static $full_categories = ['socials' , 'contact' , 'template' , 'database' ] ;
	public static $default_when_not_found = '-' ;
	public static $unset_signals = ['unset' , 'default' , '=' , ''] ;
	public static $reserved_slugs = 'none,setting' ;
	protected $guarded = ['id' , 'default_value'] ;

	use TahaModelTrait ;

	public function value($need_default = false)
	{
		if($need_default or !$this->custom_value)
			return $this->default_value ;
		else
			return $this->custom_value ;

	}

	public function formattedValue($need_default = false)
	{
		$value = $this->value($need_default) ;

		switch($this->data_type) {
			case 'boolean' :
				return boolval($value) ;
			case 'array' :
				$array = array_filter(preg_split("/\\r\\n|\\r|\\n/",  $value)) ;
				$array = array_sort_recursive($array ); //@TODO: Sort correctly!
				return $array ;
		}

		return $value ;
	}


	public static function get($slug , $formatted = true)
	{
		$model = self::where('slug' , $slug)->first() ;

		//If not found...
		if(!$model)
			return self::$default_when_not_found ;
		else
			if($formatted)
				return $model->formattedValue() ;
			else
				return $model->value() ;

	}

	public static function set($slug, $new_value , $set_for_default = false)
	{
		$model = self::findBySlug($slug);

		//If not found...
		if(!$model)
			return false ;

		//Setting...
		if($set_for_default)
			$model->default_value = $new_value ;
		else
			$model->custom_value = $new_value ;

		return $model->update() ;

	}

	/*
	|--------------------------------------------------------------------------
	| Helper Functions
	|--------------------------------------------------------------------------
	|
	*/
	public function categories()
	{
		$return = [] ;

		// Real Categories...
		foreach(self::$full_categories as $category)  {
			$trans = "manage.settings.downstream_settings.category.$category" ;
			if(Lang::has($trans))
				$caption = trans($trans);
			else
				$caption = $category ;
			array_push($return , [$category , $caption]) ;
		}

		// Entry Categories...
		array_push($return , [
				'handles' ,
				trans('calendar.handles') ,
		]);

		// Branch Categories...
		$branches = Branch::selector('category')->get();
		foreach($branches as $branch) {
			array_push($return , [
					'categories/'.$branch->slug ,
					trans('posts.categories.categories_of').' '.$branch->plural_title
			]);
		}
//		dd($branches);

		return $return ;
	}

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
