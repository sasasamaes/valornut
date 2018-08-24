<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Events\Dispatcher as Event;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

    protected $redirectPath = "/user/dashboard";

    protected  $event;

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard $auth
     * @param  \Illuminate\Contracts\Auth\Registrar $registrar
     * @param Event $event
     * @return \App\Http\Controllers\Auth\AuthController
     */
	public function __construct(Guard $auth, Registrar $registrar, Event $event)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;
        $this->event = $event;
		$this->middleware('guest', ['except' => 'getLogout']);
	}

}
