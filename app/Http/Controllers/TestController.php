<?php

namespace App\Http\Controllers;

use App\models\Branch;
use App\Models\Entry;
use App\Models\Handle;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
	public function index()
	{
	}

}
