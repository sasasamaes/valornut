<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PagesController extends Controller {
    public function __construct(){
        $this->middleware('auth', ['only'=>'help']);
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return Redirect::action('UsersController@dashboard');
	}

    /**
     * @return mixed
     */
    public function logout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::action('UsersController@dashboard');
    }

    public function contact()
	{
		return View('pages.contact');
	}
    public function about()
	{
		return View('pages.about');
	}
    public function instructions()
	{
		return View('pages.instructions');
	}

    public function help()
	{
		return View('pages.help');
	}

    public function home()
    {
        return View('home');
    }

}
