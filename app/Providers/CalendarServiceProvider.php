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

        if(!$month && !$day) //means user didn't input anything
            $month = $now->format('m');
        if(!$month && $day > 0) { //means user is looking for the previous month of Farvardin
            $month = 12 ;
            $year-- ;
        }

        if(!$day)
            $day = $now->format('j')  ;

        if($month>12) {
            $month = $month - 12 ;
            $year++ ;
        }

        if(!jDateTime::checkDate($year , $month , $day))
            return false; //view('errors.410');

        $date = jDateTime::createCarbonFromFormat("Y/n/j H:i" , "$year/$month/$day 12:00") ;
        return $date ;

    }

    public static function renderFullMonth($year, $month)
    {
        $result = [] ;

        for($day = 1 ; $day<=31 ; $day++) {
            $result[$day] = jDateTime::createCarbonFromFormat("Y/n/j H:i" , "$year/$month/$day 00:00") ;

            if($day+1 >= 30 and !jDateTime::checkDate($year , $month , $day+1))
                break;
        }
        $result['total_days'] = $day ;
        $result['first_day'] = jDate::forge($result[1])->format('N') ;
        return $result ;
    }

}
