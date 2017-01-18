<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
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

		//View...
		return view("manage.calendar.month",compact('page' , 'date' , 'para' , 'month' , 'handles'));

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
		if($day > 0)
			$model->begins_at = $model->ends_at = $date ;

		$fields = $handle->fields ;


		//View...
		return view("manage.calendar.entry_editor",compact('model'));


	}

}
