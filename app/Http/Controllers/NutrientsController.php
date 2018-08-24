<?php //namespace App\Http\Controllers;
//
//use App\Http\Requests;
//use App\Http\Controllers\Controller;
//
//use App\Nutrient;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\View;
//
//class NutrientsController extends Controller {
//
//    /**
//     * Display a listing of the resource.
//     *
//     * @return Response
//     */
//    public function index()
//    {
//
//        $nutrients = Nutrient::all()->toArray();
//
//        //dd($nutrients);
//        return View('nutrients.index', compact('nutrients'));
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return Response
//     */
//    public function create()
//    {
//        return View('nutrients.create');
//    }
//
//    /**
//	 * Store a newly created resource in storage.
//	 *
//	 * @return Response
//	 */
//	public function store()
//	{
//        dd(\Illuminate\Support\Facades\Request::all());
//        return null;
//	}
//
//    /**
//	 * Display the specified resource.
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function show(Nutrient $nutrient)
//	{
//		return $nutrient;
//	}
//
//    /**
//	 * Show the form for editing the specified resource.
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function edit(Nutrient $nutrient)
//	{
//		return View('nutrients.edit', compact('nutrient'));
//	}
//
//    /**
//	 * Update the specified resource in storage.
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function update(Nutrient $nutrient)
//	{
//		return 'actualizado';
//	}
//
//    /**
//	 * Remove the specified resource from storage.
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function destroy($id)
//	{
//		return 'destruido'.$id;
//	}
//
//}
