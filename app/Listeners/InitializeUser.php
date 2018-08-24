<?php namespace App\Listeners;

use App\AccountDetail;
use App\Events\UserWasCreated;

use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class InitializeUser {



	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event. Create account details for the newly created user.
	 *
	 * @param  UserWasCreated  $event
	 * @return void
	 */
	public function handle(UserWasCreated $event)
	{
		$user = $event->user;
        $accountDetails = new AccountDetail([]);
        $accountDetails->user_id = $user->id;
        $accountDetails->type = $event->type;
        $accountDetails->status = 'Inactiva';
        $accountDetails->sign_up_date = Carbon::now();
        $accountDetails->expiration_date = Carbon::now();
        $accountDetails = AccountDetail::create($accountDetails->toArray());
        $accountDetails->save();
	}

}
