@extends('app')

@section('title')
Fuentes
@stop

@section('content')
            <div id="content-wrapper"  class="panel panel-success">
                <div class="panel-heading">
                    <h2>
                          Fuente de información de la composición nutricional de los alimentos
                    </h2>
                </div>
                <div class="panel-body container-fluid">
                            <p>


                                Las fuentes de información en la base de datos de la composición nutricional de los alimentos incluida en el Programa, son las siguientes:

                                <p><strong>Alimentos con códigos menores a 1000: </strong> Arias Astúa, J.F., Maroto Meneses, L. y Vega Quesada, N. (2010) Sistematización y tipificación de preparaciones comunes de alimentos en algunas zonas del Gran Área Metropolitana de Costa Rica, 2010. (Tesis de licenciatura). Universidad de Costa Rica.
                                </p><p><strong>Alimentos con códigos de 1001 al 22025: </strong> INCAP (2007) Tabla de Composición de Alimentos de Centroamérica (segunda edición).  OPS/INCAP Guatemala.
                                </p><p><strong>Alimentos con códigos de 23001 al 23013: </strong> valor nutritivo calculado para alimentos de fortificación obligatoria en Costa Rica.
                                <p><strong>Alimentos con códigos mayores a 24000: </strong> valor nutritivo de alimentos disponibles en la base de datos de composición de alimentos de los Estados Unidos de América.  Recuperado de: http://www.nal.usda.gov/fnic/foodcomp/search/
                                </p>

                            </p>
                </div>
            </div>

@stop
