<?php namespace App\Listeners;

use App\Events\UserHasPaid;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class ActivateMembership {

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
	 * Handle the event.
	 *
	 * @param  UserHasPaid  $event
	 * @return void
	 */
	public function handle(UserHasPaid $event)
	{
        $event->user->accountDetails->status = 'Activa';
        $event->user->accountDetails->expiration_date = $event->user->accountDetails->expiration_date->addYear(1);
        $event->user->accountDetails->save();
        $payment = new Payment();
        $payment->account_detail_id = $event->user->accountDetails->id;
        $payment->type = 'online';
        $payment->transaction_identifier = $event->key;
        $payment->status = $event->pagado?'Exitoso':'Fallido';
        $payment->amount = env('MEMBERSHIP_PRICE');
        $payment->save();
	}

}
