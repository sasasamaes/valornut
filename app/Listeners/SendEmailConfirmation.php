<?php namespace App\Listeners;

use App\Events\UserHasPaid;
use App\User;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class SendEmailConfirmation {
    protected $mailer;
	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
	}

	/**
	 * Handle the event.
	 *
	 * @param  UserHasPaid  $event
	 * @return void
	 */
	public function handle(UserHasPaid $event)
	{

        $user = User::findOrFail($event->user->id);
        $this->mailer->send('emails.payment', ['user' => $user], function ($m) use ($user) {
            $m->from('info@nutricion2.ucr.ac.cr', 'Valornut UCR');

            $m->to($user->email, $user->name)->subject('Su pago ha sido recibido.');
        });
	}

}
