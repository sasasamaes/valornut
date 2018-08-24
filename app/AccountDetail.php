<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountDetail extends Model {

    protected $table='account_details';
    public $timestamps = true;
    protected $dates = ['sign_up_date','expiration_date'];
    
    protected $fillable = [
        'type',
        'sign_up_date',
        'expiration_date',
        'status',
        'user_id'
    ];

    public function Users(){
        return $this->belongsTo('App\User');
    }

    public function Payments(){
        return $this->hasMany('App\Payment');
    }

}
