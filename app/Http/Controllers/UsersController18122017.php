<?php namespace App\Http\Controllers;

use App\AccountDetail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Payment;
use App\User;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller {

    public function __construct(){
        $this->middleware('auth',['except' => ['dashboard']]);
        $this->middleware('admin',['except' => ['dashboard','edit','update']]);
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = User::with('accountdetails')->get();
        return View('users.index', compact('users'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user = new User([]);
        $accountdetails = new AccountDetail([]);
        $accountdetails->sign_up_date = Carbon::now();
        $user->accountdetails = $accountdetails;
        return View('users.create',compact('user'));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(User $usr)
	{
        $user = User::with('accountdetails','accountdetails.payments')->find($usr->id);
        $days = [];
        $now = Carbon::now();
        $days['total'] = $user->accountdetails->expiration_date->diff($user->accountdetails->sign_up_date)->days;
        $days['used'] = $now->diff($user->accountdetails->sign_up_date)->days;
        $days['left'] = $days['total']-$days['used'];
        $days['used_perc'] = 100 * $days['used'] / $days['total'];
        $days['left_perc'] = 100 * $days['left'] / $days['total'];
        return View('users.show',compact('user','days'));
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(User $usr)	{
        $user = User::with('accountdetails','accountdetails.payments')->find($usr->id);
        $days = [];
        $now = Carbon::now();;
        $days['total'] = $user->accountdetails->expiration_date->diff($user->accountdetails->sign_up_date)->days;
        $days['used'] = $now->diff($user->accountdetails->sign_up_date)->days;
        $days['left'] = $days['total']-$days['used'];
        $days['used_perc'] = 100 * $days['used'] / $days['total'];
        $days['left_perc'] = 100 * $days['left'] / $days['total'];
        return View('users.edit',compact('user','days'));
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(User $user)
	{
		$data=Input::all();
        $user = User::with('accountdetails')->find($user->id);
        $user->first_name = $data['first_name'];
        $user->last_name_1 = $data['last_name_1'];
        $user->last_name_2 = $data['last_name_2'];
        $user->telephone = $data['telephone'];
        $user->email = $data['email'];
        $user->receive_emails = $data['receive_emails'];
        if(isset($data['type']) && isset($data['status']) && isset($data['expiration_date'])){
            $user->accountdetails->type = $data['type'];
            $user->accountdetails->status = $data['status'];
            $user->accountdetails->expiration_date = $data['expiration_date'];
        }
        $user->accountdetails->save();
        $user->save();
        session()->flash('flash_message', 'El usuario ha sido actualizado exitosamente!');
        return Redirect::action('UsersController@index');

    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(User $user)
	{
        $usr = User::with('accountdetails')->findOrFail($user->id);
        $ad = $usr->accountdetails;
        $ad->delete();
        $usr->delete();
        session()->flash('flash_message', 'El usuario ha sido borrado exitosamente!');
        return Redirect::action('UsersController@index');
    }

    /**
     * @param User $usr
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        if(!Auth::guest()){
            $user = User::with('accountdetails','accountdetails.payments')->find(Auth::user()->id);
            $days = [];
            $now = Carbon::now();
            $days['total'] = $user->accountdetails->expiration_date->diff($user->accountdetails->sign_up_date)->days;
            $days['used'] = $now->diffInSeconds($user->accountdetails->sign_up_date) / (24.0 * 3600);
            $days['left'] = (int) ($days['total']-$days['used']);
            $days['used_perc'] = (99.0 * $days['used'] * 1.0 / $days['total']);
            $days['left_perc'] = (99.0 * $days['left'] * 1.0 / $days['total']);
            //$days['left']=-81;
            
        //aqui se valida si ya se venció la membresía se desactiva la cuenta
        if($days['left']<0){
            $days['left']="!!!! CUENTA  VENCIDA !!!!";
            // Se actualiza la cuenta y se pasa el estado a inactiva
            $a = AccountDetail::find($user->accountdetails->id);
            $a->status = 'Inactiva';
            $a->save();
            $user->accountdetails->status = 'Inactiva';
        }
            $transaction=Transaction::where('idUser', '=', Auth::user()->id)->where('borrado','=','0')->get()->last();

            $accountdetails2=AccountDetail::where('user_id','=',Auth::user()->id)->get();
            
           // dd($accountdetails);
            // aqui se preguntra si no se encuentran transaciones anteriores
            //si no hay entonces se setea por defecto en cero
            try {

             if(count($transaction)<0){
                $transaction->id=0;
            }else{
                $transaction= new Transaction();
                $transaction->id=0;
            }
        } catch (Exception $e) {
           $transaction= new Transaction();
           $transaction->id=0;
       }

       if ($user->accountdetails->status == 'Inactiva'){
		   if(Session::get('flash_message')=='Hubo un problema procesando su pago. Por favor intentelo nuevamente'){
			  $msg = 'Hubo un problema procesando su pago. Por favor intentelo nuevamente'; 
		   }else{
			   
			 $msg = 'Su cuenta se encuentra inactiva. Puede utilizar el link de abajo para realizar el pago';  
		   } 
		   
        
    }
    elseif($days['left'] < 22 && $days['left'] > 0){
        $msg = 'Su cuenta esta cerca de expirar. Puede utilizar el link de abajo para renovar su membres&iacute;';
    }
    elseif($days['left'] <= 0){
        $msg = 'Su cuenta ha expirado. Puede utilizar el link de abajo para renovar su membres&iacute;';
    }


    if(isset($msg)){
        session()->flash('flash_message', $msg);
    }


    return View('users.dashboard',compact('user','days','transaction'));
}
else{
    return view('auth.login');
}
}

    /**
     * @param $user_id
     */
    public function activate($user_id){
        $user = User::with('accountdetails','accountdetails.payments')->find(Auth::user()->id);
    }

}
