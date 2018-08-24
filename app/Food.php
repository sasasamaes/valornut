<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model {
    public static function boot() {
        parent::boot();

        Food::saving(function($model){
            foreach ($model->attributes as $key => $value) {
                $model->{$key} = empty($value) ? null : $value;
            }
        });
    }
    protected $fillable = [
        'food_code',
        'food_name',
        'added_by',
        'modified_by',
        'food_group_id',
        'food_code',
        'food_name',
        'food_group_id',
        'energy',
        'protein',
        'total_fat',
        'carbohydrates',
        'diet_fiber',
        'calcium',
        'phosphorus',
        'iron',
        'thiamine',
        'riboflavin',
        'niacin',
        'vitamin_c',
        'retinol_equivalents',
        'mono_insaturated_fatty_acids',
        'poly_insaturated_fatty_acids',
        'saturated_fatty_acids',
        'cholesterol',
        'potassium',
        'sodium',
        'zinc',
        'magnesium',
        'vitamin_b6',
        'vitamin_b12',
        'folate_equivalents',
        'source',
        'food_group_id'
    ];
    public $timestamps = true;

    public function FoodGroups(){
        return $this->belongsTo('App\FoodGroup','food_group_id','food_group_code' );
    }

/*    public function Nutrients(){
        return $this->belongsToMany('App\Nutrient')->withPivot('quantity');
    }*/


}
