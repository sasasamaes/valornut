<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model {

		protected $table='transactions';
        protected $fillable=['idUser','keyTransaction,borrado'];


}
