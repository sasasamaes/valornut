<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FoodGroup;
use App\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;


class RecipesController extends Controller {
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
        $food_groups = FoodGroup::lists('food_group_name', 'food_group_code');
        return View('recipes.index', compact('food_groups'));
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
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function get_foods_list($group_id)
	{
		$food_list = Food::where('food_group_id', $group_id)->orderBy('food_name','asc')->lists('food_name', 'food_code');
        return $food_list;
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
     *
     */
    public function export_to_excel(){
        //dd(Input::all()['recipe']);
        $recipe = Input::all()['recipe'];
        $array = $this->getdata($recipe);

        Excel::create('lista_valornut_'.date('m_d_Y_H:m:s'), function($excel) use($array) {
            // Set the title
            $excel->setTitle('Lista de alimentos - Valornut UCR');
            // Chain the setters
            $excel->setCreator('Valornut '+date('Y'))->setCompany('Valornut - Escuela de Nutricion UCR');
            // Call them separately
            $excel->setDescription('A demonstration to change the file properties');
            $excel->sheet('Lista de alimentos - Valornut', function($sheet) use($array) {
                $sheet->fromArray($array, null, 'A1', false, false);
                $sheet->setColumnFormat(array(
                    'C:AD' => '0.00'
                ));
            });

        })->download('xlsx');

        //echo Input::all();
    }

    public function tdrows($elements)
    {
        $array = array();
        foreach ($elements as $element) {
            if($element->nodeName == 'td'){
                if(is_numeric($element->nodeValue)){
                    array_push($array, (float)$element->nodeValue);
                }
                else{
                    array_push($array, $element->nodeValue);
                }
            }
        }

        return $array;
    }
    public function getdata($contents)
    {
        $DOM = new \DOMDocument();
        $DOM->loadHTML($contents);
        $contents = str_replace("\r\n",'',$contents);
        //dd($contents);
        $table = array();
        $num_fila = 0;
        $header = ["TOTALES","","Id de lista","Código","Alimento","Cantidad (g)","Energía (Kcal)","Proteína (g)","Carbohidratos (g)","Grasa total (g)","Ácidos grasos monoinsaturados (g)","Ácidos grasos poliinsaturados (g)","Ácidos grasos saturados (g)","Colesterol (mg)","Fibra dietética (g)","Calcio (mg)","Fósforo (mg)","Hierro (mg)","Potasio (mg)","Sodio (mg)","Zinc (mg)","Magnesio (mg)","Tiamina (mg)","Riboflavina (mg)","Niacina (mg)","Vitamina C (mg)","Equivalentes de retinol (microg)","Vitamina B6 (mg)","Vitamina B12 (microg)","Equivalentes de folatos (microg)"];
        $items = $DOM->getElementsByTagName('tr');
        //dd($items);
        foreach ($items as $node) {
            if($num_fila == 0){
                array_push($table, $header);
            }
            else{
                $new_tr = array_merge(array(""),$this->tdrows($node->childNodes));
                array_push($table, $new_tr);
            }
            $num_fila++;
        }
        //dd($table);
        return $table;

    }

}
