<?php

namespace App\Http\Controllers\Manage;

use App\Models\Account;
use App\models\Branch;
use App\Models\Category;
use App\Models\Domain;
use App\Models\Entry;
use App\Models\Field;
use App\Models\Handle;
use App\Models\Post_cat;
use App\Models\Setting;
use App\Models\State;
use App\Traits\TahaControllerTrait;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hamcrest\Core\Set;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class SettingsController extends Controller
{
	use TahaControllerTrait ;
	private $page = array();

	public function __construct()
	{
	}

	public function index($request_tab = 'template')
	{
		//Preparetions...
		$page[0] = ['settings' , trans('manage.settings.downstream')];
		$page[1] = [$request_tab , trans("manage.settings.downstream_settings.category.$request_tab")];
		$db = new Setting() ;

		//Show...
		switch($request_tab) {
			case 'accounts' :
				$model_data = Account::where('user_id' , '0')->paginate(50) ;
				return view("manage.customers.accounts" , compact('page', 'model_data' , 'request_tab' , 'db')) ;

			default :
				$model_data = Setting::where('category' , $request_tab)->where('developers_only' , '0')->orderBy('title')->get() ;
				return view("manage.settings.settings", compact('page', 'model_data' , 'request_tab' , 'db'));

		}

	}

	public function handles()
	{
		//Preparetions...
		$page[0] = ['settings' , trans('manage.settings.downstream')];
		$page[1] = ['handles' , trans('calendar.handles') ];

		//Model...
		$db = new Setting() ;
		$model_data = Handle::selector()->orderBy('id' , 'desc')->get();

		//Show...
		return view("manage.settings.handles",compact('page','model_data','db'));


	}

	public function fields($handle_id)
	{
		//Preparetions...
		$handle = Handle::find($handle_id) ;
		if(!$handle)
			return view('errors.410');

		$page[0] = ['settings' , trans('manage.settings.downstream')];
		$page[1] = ['handles' , trans('calendar.handles') ];
		$page[2] = ['handles' , trans('calendar.fields_of').' '.$handle->title];

		//Model...
		$db = new Setting() ;
		$model_data = $handle->fields()->get() ;

		//View...
		return view("manage.settings.fields",compact('page','model_data','db','handle'));


	}

	public function newField($handle_id)
	{
		//Model...
		$model = new Field() ;
		$model->handle_id = $handle_id ;

		//view...
		return view("manage.settings.fields_edit",compact('model'));

	}

	public function editField($field_id)
	{
		//Model...
		$model = Field::find($field_id) ;
		$model->spreadMeta() ;

		//View...
		return view("manage.settings.fields_edit",compact('model'));

	}

	public function editHandle($item_id)
	{
		//Model...
		if($item_id) {
			$model = Handle::find($item_id) ;
			if(!$model) return view('errors.m404');
			$model->spreadMeta() ;
		}
		else {
			$model = new Handle();
			$model->color_code = Handle::$available_color_codes[0];
			$model->icon = Handle::$available_icons[0] ;

		}

		//View...
		return view("manage.settings.handles_edit",compact('model'));

	}

	public function categories($branch_slug , $parent_id = 0)
	{
		//Preparetions...
		$branch = Branch::findBySlug($branch_slug) ;
		if(!$branch or !$branch->hasFeature('category'))
			return view('errors.404');

		$page[0] = ['settings' , trans('manage.settings.downstream')];
		$page[1] = ['categories/'.$branch->slug , trans('posts.categories.categories_of').' '.$branch->plural_title];

		//Model...
		$db = new Setting() ;
		$model_data = $branch->categories()->where('parent_id' , $parent_id)->get() ;

		$parent = Category::find($parent_id);
		if(!$parent)
			$parent = new Category() ;

		//Show...
		return view("manage.settings.categories" , compact('page' , 'branch' , 'parent' , 'model_data' , 'db'));

	}

	public function newCategory($branch_slug , $parent_id)
	{
		//Preparation...
		$branch = Branch::findBySlug($branch_slug) ;
		if(!$branch or !$branch->hasFeature('category'))
			return view('errors.m404');

		//Model...
		$model = new Category() ;
		$model->branch_id = $branch->id ;
		$model->parent_id = $parent_id ;

		//View...
		return view("manage.settings.categories_edit",compact('model'));

	}

	public function editCategory($item_id)
	{
		//Model...
		$model = Category::find($item_id);
		if(!$model)
			return view("errors.m404");

		//View...
		return view("manage.settings.categories_edit",compact('model'));


	}


	/*
	|--------------------------------------------------------------------------
	| Save Methods
	|--------------------------------------------------------------------------
	|
	*/

	public function save(Requests\Manage\SettingSaveRequest $request)
	{
		$data = $request->toArray() ;

		foreach($data as $item => $value ) {
			if($item[0] == '_')
				continue ;

			$ok = Setting::set($item , $value) ;
		}

		return $this->jsonSaveFeedback($ok , [
			'success_refresh' => true  ,
		]);


	}

	public function saveCategory(Requests\Manage\CategorySaveRequest $request)
	{

		//If Save...
		if($request->_submit == 'save') {
			$ok = Category::store($request);

			return $this->jsonSaveFeedback($ok , [
					'success_refresh' => true  ,
			]);
		}


		//If Delete...
		if($request->_submit == 'delete') {
			$model = Category::find($request->id) ;
			if(!$model or $model->children->count() > 0)
				return $this->jsonFeedback();

			$model->posts()->update(['category_id' => '0']);
			return $this->jsonAjaxSaveFeedback($model->forceDelete() , [
					'success_refresh' => true,
			]);

		}



	}

	public function saveHandle(Requests\Manage\HandleSaveRequest $request)
	{
		//If Save...
		if($request->_submit == 'save') {
			$ok = Handle::store($request);

			return $this->jsonSaveFeedback($ok , [
					'success_refresh' => true  ,
			]);
		}


		//If Delete...
		if($request->_submit == 'delete') {
			$model = Handle::find($request->id) ;
			if(!$model or $model->entries()->count() > 0)
				return $this->jsonFeedback();

			$model->entries()->update(['handle_id' => '0']);
			return $this->jsonAjaxSaveFeedback($model->forceDelete() , [
					'success_refresh' => true,
			]);

		}

	}

	public function saveField(Requests\Manage\FieldSaveRequest $request)
	{
		//If Save...
		if($request->_submit == 'save') {
			//Look for soft-deleted fields...
			if($request->id == 0) {
				$ex_field = Field::where('title' , $request->title)->where('handle_id',$request->handle_id)->withTrashed()->first();
				if($ex_field and !$ex_field->trashed())
					return $this->jsonFeedback(trans('validation.unique' , ['attribute' => trans('validation.attributes.title'),]));
				elseif($ex_field and $ex_field->trashed()) {
					$ok = $ex_field->restore() ;
					$data = $request->toArray() ;
					$data['id'] = $ex_field->id ;
					$ok = Field::store($data) ;
				}
				else {
					$ok = Field::store($request);
				}
			}
			else
				$ok = Field::store($request);

			return $this->jsonSaveFeedback($ok , [
					'success_refresh' => true  ,
			]);
		}


		//If Delete...
		if($request->_submit == 'delete') {
			$model = Field::find($request->id) ;
			if(!$model)
				return $this->jsonFeedback();
			return $this->jsonAjaxSaveFeedback($model->delete() , [
					'success_refresh' => true,
			]);

		}

	}

}
