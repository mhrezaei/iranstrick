<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Providers\AppServiceProvider;
use App\Providers\CalendarServiceProvider;
use App\Providers\TahaServiceProvider;
use App\Traits\TahaControllerTrait;
use Illuminate\Support\ServiceProvider;
use Morilog\Jalali\jDate;


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

		$page[0] = ['calendar' , trans('calendar.title')];
		$page[1] = ['month' , trans('calendar.month_view')];
		$page[2] = [
				jDate::forge($date)->format('Y').'/'.jDate::forge($date)->format('m').'/'.jDate::forge($date)->format('j') ,
				AppServiceProvider::pd(jDate::forge($date)->format('F Y'))
		] ;


//		dd(jDate::forge($date)->format('Y/m/d'));

		return view("manage.calendar.month",compact('page' , 'date'));

	}

}
