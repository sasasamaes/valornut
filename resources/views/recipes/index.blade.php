@extends('app')

@section('title')
Lista de alimentos
@stop
<style>
th.rotate {
    /* Something you can count on */
    height: 140px;
    white-space: nowrap;
}
th.rotate > div {
    transform:
        /* Magic Numbers */
    translate(25px, 51px)
        /* 45 is really 360 - 45 */
    rotate(315deg);
    width: 30px;
}
th.rotate > div > span {
    border-bottom: 2px solid #ccc;
    padding: 0px;
    font-size: 12;
}
.alignRight{
    text-align: right;
}


</style>
@section('content')
            <div id="content-wrapper"  class="panel panel-success">
                <div class="panel-heading">
                    <h2>
                        Crear Lista de Alimentos
                    </h2>
                </div>
                <div class="panel-body container-fluid">
                    <form class="form-horizontal" id="add_food_form" name="add_food_form">
                            <div class="form-group">
                                <div class="col-xs-3">
                                <label> Grupo</label>
                                 {!! Form::select('food_group_code', $food_groups, 0, ['class'=>'form-control input-lg select2', 'id'=>'food_group_code']) !!}
                                </div>
                                  <div class="col-xs-3">

                                            <label> Alimento</label>
                                            <select id="food" name="food" class="form-control input-lg select2" placeholder="Seleccione un alimento" >
                                                <option value="" disabled selected>Por favor seleccione un grupo primero</option>
                                            </select>
                                  </div>
                            </div>
                            <div class="form-group">
                                  <div class="col-xs-2">
                                      <label> C&oacute;digo</label>
                                      <input class="form-control" id="food_code" name="food_code" placeholder="Codigo del alimento"/>
                                  </div>
                                                                    <div class="col-xs-2">
                                                                        <label> Cantidad</label>
                                                                        <input class="form-control" id="quantity" name="quantity" placeholder="Cantidad (g)"/>
                                                                    </div>
                                <div class="col-xs-2">
                                    <label for="recipe_id">
                                        Id de subtotal
                                    </label>
                                    <select id="recipe_id" name="recipe_id" class="form-control input-lg select2">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-2">
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Agregar Alimento</button>
                                </div>
                            </div>
                    </form>
                </div>

                    <hr>
                    <br>
                        <div class="col-md-12">
                        {!! Form::open(array('action' => 'RecipesController@export_to_excel', 'id'=>'recipe_form')) !!}
                        <table id="recipe_table" class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th class='rotate'><div><span>Totales</span></div></th>
                                <th class='rotate'><div><span>Id de Lista</span></div></th>
                                <th class='rotate' style="display:none;"><div><span>C&oacute;digo</span></div></th>
                                <th class='rotate'><div><span>Producto</span></div></th>
                                <th class='rotate'><div><span>Cantidad</span></div></th>
                                <th class="rotate">
                                    <div><span>Energ&iacute;a</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Prote&iacute;na</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Carbohidratos</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Grasa Total</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>&Aacute;cidos grasos mono-insaturados</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>&Aacute;cidos grasos poli-insaturados</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>&Aacute;cidos grasos saturados</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Colesterol</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Fibra diet&eacute;tica</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Calcio</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>F&oacute;sforo</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Hierro</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Potasio</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Sodio</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Zinc</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Magnesio</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Tiamina</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Riboflavina</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Niacina</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Vitamina C</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Equivalentes de retinol</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Vitamina B6</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Vitamina B12</span></div>
                                </th>
                                <th class="rotate">
                                    <div><span>Equivalentes de folato</span></div>
                                </th>
                            </tr>
                            </thead>

                            <tbody id="grand_total_body">
                                <tr id="grand_total">
                                <td>TOTAL</td>
                                 <td></td>
                                 <td></td>
                                 <td style="display:none;"></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                    <td class="alignRight grand_total"><strong>0</strong></td>
                                </tr>
                            </tbody>

                        </table>
                                            <input type="hidden" name="recipe" id="recipe">
                        {!! Form::close()!!}
                        </div>
                            <button type="submit" id="export_to_excel" name="export_to_excel" class="btn btn-block btn-primary"><strong>Exportar a Excel</strong></button>



                    <iframe id="txtArea1" style="display:none"></iframe>
                    <a href="#" class="ui-helper-hidden" style="color:white"><div id="delete-row-menu" data-command="delete-row" style="background-color:red"><span  class="glyphicon glyphicon-remove"></span><strong> Eliminar alimento</strong></div></a>
                    </div>
                    <script>
                    $( document ).ready(function() {
                        $('#export_to_excel').click(function(){
                            $("#recipe").val( $("<div>").append( $("#recipe_table").eq(0).clone() ).html());
                            //console.log($("#recipe").val());
                            $("#recipe_form").submit();
                            //alert('exporte');
                        });
                        $('[data-toggle="tooltip"]').tooltip();
                        var num_recipes = 0;
                        populateRecipeDropdown();

                        function add_recipe(food_id, quantity){
                            num_recipes++;
                            $('#recipe_table #grand_total_body').before('<tbody id="table_recipe_'+num_recipes+'"><tr class="sub_total_row" id="total_recipe_'+num_recipes+'"><td class="alignRight"><strong>Sub-Total</strong></td><td></td><td></td><td style="display:none;"></td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total">0</td><td class="alignRight sub_total"></td></tr></tbody>');                            add_food(food_id,quantity,num_recipes);
                            populateRecipeDropdown();
                            sum_sub_total(num_recipes);
                            sum_grand_total();
                        };

                        function add_food(food_id, quantity, recipe_id){
                            var food_details = get_food_details(food_id, quantity);
                            $('#recipe_table #total_recipe_'+recipe_id).before('<tr class="hasmenu"><td></td><td class="alignRight">'+recipe_id+'</td><td style="display:none;" class="alignRight " title="'+food_details['food_code']+'" data-toggle="tooltip" data-placement="top">'+food_details['food_code']+'</td><td class="alignRight" title="'+food_details['food_name']+'\nC&oacute;digo = '+food_details['food_code']+'\nFuente = '+food_details['source']+'" data-toggle="tooltip" data-placement="top">'+food_details['food_name']+'</td><td class="alignRight value">'+quantity+'</td><td class="alignRight value">'+food_details['energy']+'</td><td class="alignRight value">'+food_details['protein']+'</td><td class="alignRight value">'+food_details['carbohydrates']+'</td><td class="alignRight value">'+food_details['total_fat']+'</td><td class="alignRight value">'+food_details['mono_insaturated_fatty_acids']+'</td><td class="alignRight value">'+food_details['poly_insaturated_fatty_acids']+'</td><td class="alignRight value">'+food_details['saturated_fatty_acids']+'</td><td class="alignRight value">'+food_details['cholesterol']+'</td><td class="alignRight value">'+food_details['diet_fiber']+'</td><td class="alignRight value">'+food_details['calcium']+'</td><td class="alignRight value">'+food_details['phosphorus']+'</td><td class="alignRight value">'+food_details['iron']+'</td><td class="alignRight value">'+food_details['potassium']+'</td><td class="alignRight value">'+food_details['sodium']+'</td><td class="alignRight value">'+food_details['zinc']+'</td><td class="alignRight value">'+food_details['magnesium']+'</td><td class="alignRight value">'+food_details['thiamine']+'</td><td class="alignRight value">'+food_details['riboflavin']+'</td><td class="alignRight value">'+food_details['niacin']+'</td><td class="alignRight value">'+food_details['vitamin_c']+'</td><td class="alignRight value">'+food_details['retinol_equivalents']+'</td><td class="alignRight value">'+food_details['vitamin_b6']+'</td><td class="alignRight value">'+food_details['vitamin_b12']+'</td><td class="alignRight value">'+food_details['folate_equivalents']+'</td></tr>');                            sum_sub_total(recipe_id);
                            sum_grand_total();
                        };

                        function get_foods_list(food_group_id){
                            $.ajax(
                                {   type: "GET",
                                    url: '{{ url('recipe/get_foods_list', null, false) }}/'+food_group_id,

                                    dataType: 'json',

                                    success:function(data){
                                        var response =  data;
                                        $('#food').empty();
                                        $.each(response,function(key, value)
                                        {
                                            $('#food').append('<option value=' + key + '>' + value + '</option>');
                                        });
                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                        //console.log is better at least for debugging. You can change this back to alert
                                        //when your code goes into production
                                        console.log(XMLHttpRequest, textStatus, errorThrown);
                                    }

                                })
                            return false;
                        };

                        function get_food_details(food_id, quantity){
                            var food_details = {};
                            $.ajax(
                                {   type: "GET",
                                    url: '{{ url('food', null, false) }}/'+food_id+'/details',
                                    dataType: 'json',
                                    async: false,

                                    success:function(data){
                                        //console.log("here"+data);
                                        $.each(data,function(key, value)
                                        {
                                            if(isNumeric(value) && key != 'food_code'){
                                                food_details[key] = roundToTwo((value/100.0)*quantity);
                                            }
                                            else{
                                                food_details[key] = value;
                                            }

                                        });
                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                        //console.log is better at least for debugging. You can change this back to alert
                                        //when your code goes into production
                                        console.log(XMLHttpRequest, textStatus, errorThrown);
                                    }

                                })
                            return food_details;
                        };

                        $("#food_group_code").change(function() {
                            var group_id = $("#food_group_code").val();
                            get_foods_list(group_id);
                        });

                        $("form[name=add_food_form]").submit(function(event) {
                                event.preventDefault();
                                var $inputs = $('#add_food_form :input');
                                var values = {};
                                $inputs.each(function() {
                                        values[this.id] = $(this).val();
                                });
                                if(values['quantity'] == ''){
                                    alert('Por favor introduzca una cantidad.')
                                }
                                else{
                                    if(values['recipe_id'] == (num_recipes+1)){
                                        if(values['food_code']){
                                            add_recipe(values['food_code'],values['quantity']);
                                        }
                                        else{
                                            add_recipe(values['food'],values['quantity']);
                                        }

                                    }
                                    else{
                                        if(values['food_code']){
                                            add_food(values['food_code'],values['quantity'],values['recipe_id']);
                                        }
                                        else{
                                            add_food(values['food'],values['quantity'],values['recipe_id']);
                                        }

                                    }
                                    $('#food_code').val('');
                                    $('#recipe_id').val(values['recipe_id']);
                                     $('#recipe_id').change();
                                }


                        });

                        function sum_sub_total(recipe_id){
                               var totals=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
                                $(document).ready(function(){

                                    var $dataRows=$("#table_recipe_"+recipe_id+" tr:not('.sub_total')");

                                    $dataRows.each(function() {
                                        $(this).find('.value').each(function(i){
                                            totals[i]+=parseFloat( $(this).html());
                                        });
                                    });
                                    $("#table_recipe_"+recipe_id+" td.sub_total").each(function(i){
                                        $(this).html(roundToTwo(totals[i]));
                                    });

                                });
                        };

                        function sum_grand_total(){
                                var totals=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
                                var $dataRows=$("#recipe_table tr.sub_total_row");
                                //console.log($dataRows);
                                $dataRows.each(function() {
                                    $(this).find('.sub_total').each(function(i){
                                        totals[i]+=parseFloat( $(this).html());
                                    });
                                });
                                $("#recipe_table td.grand_total").each(function(i){
                                    $(this).html(roundToTwo(totals[i]));
                                });
                        };

                        function isNumeric(n) {
                          return !isNaN(parseFloat(n)) && isFinite(n);
                        }

                        function roundToTwo(num) {
                            return +(Math.round(num + "e+2")  + "e-2");
                        };

                        function populateRecipeDropdown(){
                            $('#recipe_id').empty();
                            if(num_recipes == 0){
                                $('#recipe_id').append('<option value=' + 1 + '>' + 1 + '</option>');

                            }
                            else{
                                for (var i = 1; i <= num_recipes+1; i++){
                                    $('#recipe_id').append('<option value=' + i + '>' + i + '</option>');
                                }
                            }


                        };

                        $(document).contextmenu({
                        		delegate: ".hasmenu",
                        		preventContextMenuForPopup: true,
                        		preventSelect: true,
                        		taphold: true,
                        		menu: "#delete-row-menu",
                        		select: function(event, ui) {
                        		    var selected_row = ui.target.closest("tr");
                        		    var recipe_number = parseInt(selected_row.children("td").eq(1).html());
                                    //alert(recipe_number);
                        			selected_row.remove();
                        			sum_sub_total(recipe_number);
                        			sum_grand_total();
                        		}
                        });
                    });
                    </script>
                </div>
            </div>


@stop

