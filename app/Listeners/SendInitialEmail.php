<?php namespace App\Listeners;

use App\Events\UserWasCreated;

use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Mail\Mailer;

class SendInitialEmail {
    protected $mailer;

    /**
     * Create the event handler.
     *
     * @param Mailer $mailer
     * @return \App\Listeners\SendInitialEmail
     */
	public function __construct(Mailer $mailer)
	{
		$this->mailer = $mailer;
	}

	/**
	 * Handle the event.
	 *
	 * @param  UserWasCreated  $event
	 * @return void
	 */
	public function handle(UserWasCreated $event)
	{
        $user = User::findOrFail($event->user->id);

        $this->mailer->send('emails.initial', ['user' => $user, 'payment_id' => $event->payment_id], function ($m) use ($user) {
            $m->from('info@nutricion2.ucr.ac.cr', 'Valornut UCR');

            $m->to($user->email, $user->name)->subject('Bienvenido(a) a Valornut!');
        });
	}

}
