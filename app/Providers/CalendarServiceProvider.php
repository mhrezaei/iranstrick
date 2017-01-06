<?php

namespace App\Providers;

use App\models\Branch;
use App\Models\Department;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\jDate;
use Morilog\Jalali\jDateTime;


class CalendarServiceProvider extends ServiceProvider
{

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function register()
    {
    }

    public static function renderRequestDate($year = 0, $month = 0, $day = 0)
    {
        $now = jDate::forge() ;
        if(!$year)
            $year = $now->format('Y') ;
        elseif($year < 100)
            $year = "13".$year ;

        if(!$month)
            $month = $now->format('m');

        if(!$day)
            $day = $now->format('j')  ;

        if(!jDateTime::checkDate($year , $month , $day))
            return view('errors.410');

        $date = jDateTime::createCarbonFromFormat("Y/n/j H:i" , "$year/$month/$day 12:00") ;
        return $date ;

    }


}
