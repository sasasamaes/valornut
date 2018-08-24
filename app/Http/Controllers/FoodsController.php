<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Food;
use App\FoodGroup;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class FoodsController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
    {
        return Redirect::action('FoodsController@search')->with('flash_message',session('flash_message'));
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function search()
    {
        $keyword = Input::get('keyword')?Input::get('keyword'):' ';
        $foods = Food::with('foodgroups')->where('food_name', 'LIKE', "%$keyword%")->orWhere('food_code','=',$keyword)->paginate(20);
        return View('foods.search', compact('foods','keyword'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $food = new Food();
		return View('foods.create', compact('food'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $data = Input::all();
        $data['created_by'] = \Auth::user()->first_name;
        $data['modified_by'] = \Auth::user()->first_name;
        $food = new Food($data);
        $food->save();
        session()->flash('flash_message','Alimento creado correctamente!');
        return Redirect::action('FoodsController@index');
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
	public function edit(Food $food){
        $food_groups = FoodGroup::lists('food_group_name', 'food_group_code');
        return View('foods.edit', compact('food','food_groups'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function details($food_code){
        return Food::where('food_code','=',$food_code)->with('foodgroups')->first();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function fgdetails($id){
        return FoodGroup::with('foods')->findOrFail($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Food $food)
	{
        $new_food_data = Input::all();
        $new_food_data['modified_by'] = 'alfonso';
        $food->update($new_food_data);
        session()->flash('flash_message','Alimento actualizado correctamente!');
        return Redirect::action('FoodsController@index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Food $food)
	{
        $food = Food::findOrFail($food->id);
        $food->delete();
        session()->flash('flash_message', 'El alimento ha sido borrado exitosamente!');
        return Redirect::action('FoodsController@index');
	}

}
