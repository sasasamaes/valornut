@extends('app')

@section('title')
Instrucciones
@stop

@section('content')
            <div id="content-wrapper"  class="panel panel-success">
                <div class="panel-heading">
                    <h2>
                        Instrucciones para el ingreso de datos
                    </h2>
                </div>
                <div class="panel-body container-fluid">
                            <p>

                        1.	Digitar el código del alimento o seleccionar un grupo de alimentos y después, el alimento.
                        <br>
                        2.	Digitar la cantidad del alimento correspondiente, en gramos enteros sin decimales.
                        <br>
                        3.	Cuando ha digitado el código y la cantidad de cada alimento, haga ‘clic’ en el botón ‘Agregar Alimento’.  Después, aparecerá en la parte inferior de la ventana, el valor nutritivo para esta cantidad del alimento indicado.
                        <br>
                        4.	Las cantidades en la fila ‘Totales’ corresponden a las sumas de energía y cada nutriente para los alimentos incluidos en un análisis.  Si usted desea incluir la opción de ‘Sub-totales’, debe indicar en la ventana ‘Id de Subtotal’ el número correspondiente.  Por ejemplo, al digitar los ingredientes de 2 diferentes recetas, usando ‘Id=1’ para cada ingrediente de la primera receta, y ‘Id=2’ para cada ingrediente de la segunda receta, el programa incluirá el valor nutritivo de cada receta como ‘sub-totales’.
                        <br>
                        5.	El programa permite exportar los datos digitados y el análisis de su valor nutritivo en un archivo de Excel.  No permite guardar el análisis en formato del programa, lo cual se pierde al cerrar ValorNut.  Para guardar los datos en formato de Excel, haga ‘clic’ en el botón de Excel y en la siguiente ventana, seleccione ‘Guardar’ para copiar su archivo en el lugar y con el nombre deseado.

                            </p>
                </div>
            </div>

@stop
