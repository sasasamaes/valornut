<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodGroup extends Model {

    protected $fillable = [
        'id',
        'food_group_code',
        'food_group_name',
        'added_by',
        'modified_by',
    ];

    public function Foods(){
        return $this->hasMany('App\Food','food_group_code','food_group_id');
    }

}
