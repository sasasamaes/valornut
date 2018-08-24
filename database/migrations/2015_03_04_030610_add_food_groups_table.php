<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFoodGroupsTable extends Migration {

    /**
     * Add food_groups_table
	 *
	 * @return void
	 */
	public function up()
	{
//		Schema::create('food_groups', function(Blueprint $table)
//		{
//			$table->increments('id');
//            $table->integer('food_group_code')->unsigned();
//            $table->string('food_group_name', 256);
//            $table->string('added_by', 256);
//            $table->string('modified_by', 256);
//            $table->timestamps();
//        });
//
//        Schema::create('foods', function(Blueprint $table)
//        {
//            $table->increments('id');
//            $table->integer('food_code')->unsigned();
//            $table->string('food_name', 256);
//            $table->integer('food_group_id')->unsigned();
//            $table->decimal('energy', 12, 6);
//            $table->decimal('protein', 12, 6);
//            $table->decimal('total_fat', 12, 6);
//            $table->decimal('carbohydrates', 12, 6);
//            $table->decimal('diet_fiber', 12, 6);
//            $table->decimal('calcium', 12, 6);
//            $table->decimal('phosphorus', 12, 6);
//            $table->decimal('iron', 12, 6);
//            $table->decimal('thiamine', 12, 6);
//            $table->decimal('riboflavin', 12, 6);
//            $table->decimal('niacin', 12, 6);
//            $table->decimal('vitamin_c', 12, 6);
//            $table->decimal('retinol_equivalents', 12, 6);
//            $table->decimal('mono_insaturated_fatty_acids', 12, 6);
//            $table->decimal('poly_insaturated_fatty_acids', 12, 6);
//            $table->decimal('saturated_fatty_acids', 12, 6);
//            $table->decimal('cholesterol', 12, 6);
//            $table->decimal('potassium', 12, 6);
//            $table->decimal('sodium', 12, 6);
//            $table->decimal('zinc', 12, 6);
//            $table->decimal('magnesium', 12, 6);
//            $table->decimal('vitamin_b6', 12, 6);
//            $table->decimal('vitamin_b12', 12, 6);
//            $table->decimal('folate_equivalents', 12, 6);
//            $table->string('source', 256);
//            $table->string('added_by', 256);
//            $table->string('modified_by', 256);
//            $table->foreign('food_group_id')->references('food_group_code')->on('food_groups');
//            $table->timestamps();
//        });
//
//        Schema::create('food_food_group', function(Blueprint $table){
//            $table->increments('id');
//            $table->integer('food_id');
//            $table->integer('food_group_id');
//            $table->timestamps();
//        });
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('food_food_group');
        //Schema::drop('food_nutrient');
        //Schema::drop('foods');
        //Schema::drop('food_groups');
        //Schema::drop('nutrients');
    }

}
