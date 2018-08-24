<?php namespace App\Events;

use App\Events\Event;


use App\User;
use Illuminate\Queue\SerializesModels;

class UserWasCreated extends Event {

	use SerializesModels;

    public $user;
    public $type;
    public $status;
    public $payment_id;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param $type
     * @param $status
     * @param $payment_id
     * @return \App\Events\UserWasCreated
     */
	public function __construct(User $user, $type, $status, $payment_id)
	{
		$this->user = $user;
		$this->type = $type;
		$this->status = $status;
        $this->payment_id = $payment_id;
	}

}
