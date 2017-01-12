<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use App\Providers\EmailServiceProvider;
use App\Providers\SettingServiceProvider;
use App\Traits\GlobalControllerTrait;
use App\Traits\TahaControllerTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    use TahaControllerTrait;
    use GlobalControllerTrait;
    public function __construct()
    {

    }

	public function index()
	{
	    $slider = Post::selector(self::domain() . '_home_slider')->orderBy('published_at', 'desc')->get();

	    if (self::domain() == 'fa')
        {
            $branch_id = 2;
        }
        else
        {
            $branch_id = 14;
        }

	    $agency = Category::where('parent_id', '>', 0)->where('branch_id', $branch_id)->inRandomOrder()->get();
	    $expo = Post::selector(self::domain() . '_expo')->orderBy('published_at', 'desc')->limit(5)->get();
	    $news = Post::selector(self::domain() . '_news')->orderBy('published_at', 'desc')->limit(5)->get();
	    return view('front.persian.home.0', compact('slider', 'agency', 'expo', 'news'));
	}

    public function pages($lang, $slug, $title = null)
    {
        if (! $slug)
            return view('errors.404');

        if (is_numeric($slug) and $slug > 0)
        {
            $page = Post::findBySlug($slug, 'id');
        }
        else
        {
            $page = Post::findBySlug($this->domain() . '_' . $slug);
        }

        if (! $page)
            return view('errors.404');

        $expo = Post::selector(self::domain() . '_expo')->orderBy('published_at', 'desc')->limit(5)->get();
        return view('front.persian.pages.0', compact('page', 'expo'));
	}

    public function about_page()
    {
        $page = Post::findBySlug($this->domain() . '_about');

        if (! $page)
            return view('errors.404');

        return view('front.persian.about.0', compact('page'));
    }

    public function contact()
    {
        $page = Post::findBySlug($this->domain() . '_contact_us');

        if (! $page)
            return view('errors.404');
        return view('front.persian.contact.0', compact('page'));
    }

    public function faq()
    {
        $faq = Post::selector($this->domain() . '-faq')->orderBy('title', 'asc')->get();
        return view('front.persian.faq.0', compact('faq'));
    }

    public function news()
    {
        $expo = Post::selector(self::domain() . '_expo')->orderBy('published_at', 'desc')->limit(5)->get();
        $news = Post::selector(self::domain() . '_news')
            ->where('published_at', '<=', Carbon::now()->toDateTimeString())
            ->orderBy('published_at', 'desc')
            ->paginate(20);
        return view('front.persian.news.0', compact('news', 'expo'));
    }

    public function expo()
    {
        $news = Post::selector(self::domain() . '_news')->orderBy('published_at', 'desc')->limit(5)->get();
        $expo = Post::selector(self::domain() . '_expo')
            ->where('published_at', '<=', Carbon::now()->toDateTimeString())
            ->orderBy('published_at', 'desc')
            ->paginate(20);
        return view('front.persian.expo.0', compact('news', 'expo'));
    }

    public function brands($lang, $branch, $category, $brand)
    {
        dd($brand);
    }

    public function products()
    {
        if (SettingServiceProvider::isLocale('en'))
        {
            $products = Post::selector('en-products')->get();
        }
        else
        {
            $products = Product::all();
        }
        return view('front.persian.products.0', compact('products'));
    }

    public function show_products($id)
    {
        return redirect(url('/'));
    }

	/*
	|--------------------------------------------------------------------------
	| Authentication Related Things
	|--------------------------------------------------------------------------
	| A place to redirect logged user and logoff landing page.
	*/

	public function redirectUsersAfterLogin()
	{
		if(Auth::user()->isAdmin())
			return redirect('/manage') ;
		else
			return redirect('/profile') ;
	}

	public function logout(Request $request)
	{
		if ($request->session()->get('logged_developer'))
        {
            $logged_developer = decrypt($request->session()->pull('logged_developer'));

            if($logged_developer) {
                $ok = Auth::loginUsingId( $logged_developer );
                return redirect('/manage') ;
            }
        }

		Auth::logout();
		Session::flush();
		return redirect('/login');
	}

    public function test()
    {
        return view('hadi.test');
	}

    public function test2()
    {
        $data = request()->file('avatar')->store('upload/document');
        dd($data);
	}

}
