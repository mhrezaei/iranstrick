<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manage\EntrySaveRequest;
use App\Http\Requests\Manage\RemarkSaveRequest;
use App\Models\Remark;
use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\Entry;
use App\Models\Handle;
use App\Providers\AppServiceProvider;
use App\Providers\CalendarServiceProvider;
use App\Providers\TahaServiceProvider;
use App\Traits\TahaControllerTrait;
use Illuminate\Support\ServiceProvider;
use Morilog\Jalali\jDate;
use Morilog\Jalali\jDateTime;


class CalendarController extends Controller
{
	use TahaControllerTrait ;
	private $page = array();

	public function __construct()
	{
	}

	public function index($year = 0 , $month = 0 , $day = 0)
	{
		//Preparetions...
		$date = CalendarServiceProvider::renderRequestDate($year , $month , $day) ;
		if(!$date)
			return view('errors.410');

		$para = [
			'year' => jDate::forge($date)->format('Y'),
			'month' => jDate::forge($date)->format('m'),
			'day' => jDate::forge($date)->format('j'),
		];
		$month = CalendarServiceProvider::renderFullMonth($para['year'] , $para['month']) ;


		$page[0] = ['calendar' , trans('calendar.title')];
		$page[1] = ['month' , trans('calendar.month_view')];
		$page[2] = [
				$para['year'].'/'.$para['month'].'/'.$para['day'] ,
				AppServiceProvider::pd(jDate::forge($date)->format('F Y'))
		] ;

		//Model...
		$handles = Handle::selector()->orderBy('title')->get() ;
		$entries = Entry::selector([
			'begins_before' => jDateTime::createCarbonFromFormat("Y/n/j" , $para['year'].'/'.$para['month'].'/31') ,
			'ends_after' => jDateTime::createCarbonFromFormat("Y/n/j" , $para['year'].'/'.$para['month'].'/1'),
		])->orderBy('begins_at')->get() ;

		//Json...
		$entries_table = [] ;
		foreach($entries as $entry) {
			$entry->handle->spreadMeta();
			array_push($entries_table , [
				'id' => $entry->id,
				'title' => $entry->title,
				'color_code' => $entry->handle->color_code,
				'icon' => $entry->handle->icon ,
				'begins_at' => AppServiceProvider::pd(jDate::forge($entry->begins_at)->format('j F Y')),
				'ends_at' => AppServiceProvider::pd(jDate::forge($entry->ends_at)->format('j F Y')),
				'days' => $entry->getDays($para),
			]);
		}
		$entries_json = json_encode($entries_table) ;

		//View...
		return view("manage.calendar.month",compact('page' , 'date' , 'para' , 'month' , 'handles' , 'entries_json'));

	}

	public function entryNew($handle_id , $year = 0 , $month = 0 , $day = 0)
	{
		//Preparetions...
		$handle = Handle::find($handle_id);
		if(!$handle)
			return view('errors.m410');

		if($day>0) {
			$date = CalendarServiceProvider::renderRequestDate($year , $month , $day) ;
			if(!$date)
				return view('errors.m410');
		}

		//Model...
		$model = new Entry();
		$model->handle_id = $handle->id ;
		if($day > 0)
			$model->begins_at = $model->ends_at = $date ;

		$fields = $handle->fields ;

		//View...
		return view("manage.calendar.entry_editor",compact('model' , 'fields'));

	}

	public function entryEdit($entry_id)
	{
		//Preparetions...
		$model = Entry::find($entry_id) ;
		if(!$model)
			return view('errors.m410');

		$model->spreadMeta();
//		$model->readonly = true ;

//		return view('templates.say' , ['array'=>$model->toArray()]);

		$fields = $model->handle->fields ;

		//Showing...
		return view("manage.calendar.entry_editor",compact('model' , 'fields'));

	}

	public function entryView($entry_id)
	{
		//Preparetions...
		$model = Entry::find($entry_id) ;
		if(!$model)
			return view('errors.m410');

		$model->spreadMeta() ;
		$model->handle->spreadMeta() ;

		//Showing...
		return view("manage.calendar.entry_view",compact('model'));


	}

	public function entrySave(EntrySaveRequest $request)
	{
		//Validation...
		$handle = Handle::find($request->handle_id);
		if(!$handle)
			return $this->jsonFeedback(trans('validation.http.Error410'));



		$fields = $handle->fields ;
		foreach($fields as $field) {
			$field->spreadMeta() ;
			if($field->required and !$request->toArray()['field_'.$field->id]) 
				return $this->jsonFeedback( trans('validation.required' , [
					'attribute' => $field->title ,
				]));
				
		}
		

		//Save and Return...
		$saved = Entry::store($request);

		return $this->jsonAjaxSaveFeedback($saved , [
				'success_refresh' => true,
//				'success_callback' => "rowUpdate('tblCurrencies','$request->id')",
		]);



	}

	public function remarkSave(RemarkSaveRequest $request)
	{
		//Save and Return...
		$saved = Remark::store($request);

		return $this->jsonAjaxSaveFeedback($saved , [
			'success_modalClose' => '0',
			'success_callback' => "remarksRefresh('$request->entry_id')",
		]);

	}

	public function remarksRefresh($entry_id)
	{
		//Model...
		$model = Entry::find($entry_id);
		if(!$model) return view('errors.m410');

		//View...
		return view("manage.calendar.entry_remarks",compact('model'));

	}

}
