<?php namespace App\Http\Controllers;

use App\Events\UserHasPaid;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Payment;
use App\User;
use App\transaction;
use App\AccountDetail;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Success action for payments.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function success()
	{
		try { 
		$data = Input::All();
		$user = User::with('accountdetails','accountdetails.payments')->find($data['codigo']);
		$usuario=User::find($data['codigo']);
		if($usuario!=null){
		if($data['pagado'] =="1"/*&& $data->key == $user->accountdetails->payments->firstOrFail()->*/){


		}else{ //Payment failed
            //handle failure
        	session()->flash('flash_message', 'Hubo un problema procesando su pago. Por favor intentelo nuevamente');
        	//return Redirect::action('UsersController@dashboard');
        }
        $value = session()->get('key');
        $value2=$data['key'];
		/***********************************************************************************************
		Aqui se busca si el usuario tiene una transaccion activa 
		**********************************************************************************************/		
		$tr = Transaction::where('idUser', '=', $usuario->id)->where('borrado','=','0')->first();		
		//$tr = Transaction::find($data['codigo'])->where('borrado','=','0')->first();
		if($tr!=null){
		/***********************************************************************************************
		Se valida que la clave que el utilizó en la transaccion sea igual a la que devulve el sistema de pagos
		**********************************************************************************************/
		//dd($data['pagado']);
		//dd($tr->keyTransaction );
		//dd($value2);
		if($tr->keyTransaction  ==$value2 && $data['pagado'] =="1"){
		    //se registra el pago y se habilita la cuenta
			//dd($user);
			Event::fire(new UserHasPaid($user, $data));
			//dd($user->id);
			$ac = AccountDetail::where('user_id', '=', $usuario->id)->first();
			$date = Carbon::now(); //2015-01-01 00:00:00
			$endDate = $date->addYear();
			//->format('Y-m-d');
			$ac->sign_up_date=Carbon::now();
			$ac->expiration_date=$endDate;
			$ac->status = 'Activa';
			$ac->save();
			session()->flash('flash_message', 'Pago recibido. Su cuenta ha sido activada!');
		}
		else{ 
			//dd("error");
			session()->flash('flash_message', 'Hubo un problema procesando su pago. Por favor intentelo nuevamente');	
		}
	}else{
		session()->flash('flash_message', 'No se debe realizar el pago. Su cuenta ya está activada');	
	}
	if($tr!=null){
		//se borra la transaccion (borrado lógico)
		
  	
   $t = Transaction::find($tr->id);
   if($data['autorizado']!="" ){
	   $t->autorizado = $data['autorizado'];
   }else{
	   $t->autorizado = 0;
   }
   if($data['comprobante']!=""){
	   	$t->comprobante = $data['comprobante'];
   }else{
	   $t->comprobante = 0;
   }
   if($data['tramite']!=""){
	   $t->tramite = $data['tramite'];
   }else{
	   $t->tramite = 0;
   }
   if($data['pagado']!=""){
	   $t->pagado = $data['pagado'];
   }else{
	   $t->pagado = 0;
   }
		if( $t->tramite==0){
	   session()->flash('flash_message', 'Hubo un problema procesando su pago. Por favor intentelo nuevamente');
   }
		$t->borrado = '1';
		$t->save();

   
}

		}else{
			session()->flash('flash_message', 'Hubo un problema procesando su pago. Por favor intentelo nuevamente');	
		}
	
	} catch (Exception $e) { 
   $t3 = Transaction::find($tr->id);
		$t3->autorizado = 0;
		$t3->comprobante = 0;
		$t3->tramite = 0;
		$t3->pagado = 0;
		$t3->borrado = '1';
		$t3->save();
session()->flash('flash_message', 'Hubo un problema procesando su pago. Por favor intentelo nuevamente');	
 
}
	return Redirect::action('UsersController@dashboard');
		}




/***********************************************************************************************
Esta funcion agrega una nueva transaccuion , ahorita no se utiliza
**********************************************************************************************/
public function saveKeyTransaction($clave){
	$usr = User::with('accountdetails','accountdetails.payments')->find(Auth::user()->id);
	Transaction::insert(
		['idUser'=>$usr->id,
		'keyTransaction'=>$clave,
		'borrado'=>0]);

	return "clave insertada";
			//return 	Redirect::action('UsersController@dashboard'); 
}

	/**
	 * Success action for payments.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function failure()
	{
		info(Input::all());
	}

}
