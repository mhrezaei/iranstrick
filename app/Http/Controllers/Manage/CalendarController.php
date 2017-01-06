<?php

namespace App\Http\Controllers\Manage;

use App\Models\Domain;
use App\Traits\TahaControllerTrait;


class CalendarController extends Controller
{
	use TahaControllerTrait ;
	private $page = array();

	public function __construct()
	{
	}

	public function index($request_tab = 'database')
	{
		//Preparetions...
		$page[0] = ['settings' , trans('manage.settings.downstream')];
		$page[1] = [$request_tab , trans("manage.settings.downstream_settings.category.$request_tab")];

		echo 'calendar' ;
	}

}
