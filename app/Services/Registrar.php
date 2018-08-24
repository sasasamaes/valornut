<?php namespace App\Services;

use App\User;
use App\AccountDetail;
use Carbon\Carbon;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'first_name' => 'required|max:255',
			'last_name_1' => 'required|max:255',
			'receive_emails' => 'required',
			'telephone' => 'alpha_dash|required',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		$user =  User::create([
			'first_name' => $data['first_name'],
			'last_name_1' => $data['last_name_1'],
			'last_name_2' => $data['last_name_2'],
			'receive_emails' => 1,
			'telephone' => $data['telephone'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
        $user->save();
        return $user;

	}

}
