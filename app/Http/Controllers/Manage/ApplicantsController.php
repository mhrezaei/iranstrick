<?php

namespace App\Http\Controllers\manage;

use App\Models\Applicant;
use App\Models\Post;
use App\Traits\TahaControllerTrait;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApplicantsController extends Controller
{
    use TahaControllerTrait ;

	public function __construct()
	{
		$this->page[0] = ['applicants' , trans('manage.modules.applicants')] ;
	}

	public function update($model_id)
	{
		$model = User::withTrashed()->find($model_id);
		$selector = true ;
		if(!$model)
			return view('errors.m410');
		else
			return view('manage.admins.browse-row' , compact('model' , 'selector'));
	}

	public function browse($post_id, Request $search_request)
	{
		/*--------------------------------------------------------------------------
		| Preparations ...
		*/
		if(!Auth::user()->can('applicants.browse'))
			return view('errors.403');

		$post = Post::find($post_id) ;
		if(!$post or !$post->branch()->hasFeature('register'))
			return view('errors.410');

		$page = $this->page ;
		$page[1] = [$post_id , $post->title];

		/*--------------------------------------------------------------------------
		| Models ...
		*/
		if($search_request->searched) {
			$keyword = $search_request->keyword ;
			$raw_query = Applicant::searchRawQuery($keyword) ;
			$model_data = $post->applicants()->whereRaw($raw_query)->orderBy('created_at', 'desc')->paginate(100);
		}
		else {
			$model_data = $post->applicants()->orderBy('created_at', 'desc')->paginate(50);
		}

		/*--------------------------------------------------------------------------
		| View ...
		*/
		return view("manage.applicants.browse",compact('page' , 'model_data' , 'keyword'));


	}

	public function create($post_id)
	{
		/*--------------------------------------------------------------------------
		| Preparations ...
		*/
		if(!Auth::user()->can('applicants.create'))
			return view('errors.m403');

		$post = Post::find($post_id) ;
		if(!$post or !$post->branch()->hasFeature('register'))
			return view('errors.410');

		/*--------------------------------------------------------------------------
		| Model ...
		*/
		$model = new Applicant() ;

		/*--------------------------------------------------------------------------
		| View ...
		*/
		return view("manage.applicants.editor",compact('model', 'post'));





	}


	public function edit($item_id)
	{
		/*--------------------------------------------------------------------------
		| Preparations ...
		*/
		if(!Auth::user()->can('applicants.edit'))
			return view('errors.m403');

		/*--------------------------------------------------------------------------
		| Model ...
		*/
		$model = Applicant::find($item_id) ;
		$post = $model->post ;
		if(!$model or !$post->branch()->hasFeature('register'))
			return view('errors.m410');

		/*--------------------------------------------------------------------------
		| View ...
		*/
		return view("manage.applicants.editor",compact('model', 'post'));

	}

	public function save(Requests\Manage\ApplicantSaveRequest $request)
	{
		/*--------------------------------------------------------------------------
		| If Delete ...
		*/
		if($request->_submit == 'delete') {
			return $this->jsonAjaxSaveFeedback( Applicant::destroy($request->id) , [
				'success_callback' => "rowHide('tblApplicants','$request->id')",
			]);
		}

		/*--------------------------------------------------------------------------
		| If Save ...
		*/
		return $this->jsonAjaxSaveFeedback( Applicant::store($request) , [
			'success_callback' => $request->id? "rowUpdate('tblApplicants','$request->id')" : '',
			'success_refresh' => $request->id? false : true,
		]);


	}

}
