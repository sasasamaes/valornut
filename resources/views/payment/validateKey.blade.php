
@extends('app')
@section('title')
Usuario - {!! $user->first_name !!}
@stop

@section('content')
            <div id="content-wrapper"  class="panel panel-primary">
                <div class="panel-heading">
                    <h2>
                    
                    </h2>
                </div>
                <div class="panel-body container-fluid">
                                                         
                      </div>
                      <div class="col-md-6" id="account_details_info">
                       <h1> <?php if(isset($llave)){
	echo $llave;
}else{
	echo 'holamundo';
}
  ?> </h1>
                            								   
					  </div>		
				</div>							
                    </div>
										
						
                    
                   
                
            
@stop
