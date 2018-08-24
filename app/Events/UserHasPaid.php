<?php namespace App\Events;

use App\Events\Event;

use App\User;
use Illuminate\Queue\SerializesModels;

class UserHasPaid extends Event {

	use SerializesModels;

    public $msj;
    public $pagado;
    public $codigo;
    public $comprobante;
    public $key;
    public $user;

    /**
     * Create a new event instance.
     *
     * @param $data
     * @return \App\Events\UserHasPaid
     */
	public function __construct(User $user, $data)
	{
        $this->msj = $data['msj'];
        $this->pagado = $data['pagado'];
        $this->codigo = $data['codigo'];
        $this->comprobante = $data['comprobante'];
        $this->key = $data['key'];
        $this->user = $user;
	}

}
