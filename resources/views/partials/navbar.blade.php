<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{url('/recipes', null, false)}}">  {!! HTML::image('images/logo_01_small.png') !!}</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
            <li> {!! HTML::decode(HTML::linkAction('RecipesController@index', '<strong>Listas de Alimentos</strong>')) !!} </li>
            <li> {!! HTML::decode(HTML::linkAction('UsersController@dashboard', '<strong>Mi Cuenta</strong>')) !!} </li>
        @if (Auth::admin())
            <li> {!! HTML::decode(HTML::linkAction('FoodsController@search', '<strong>Alimentos</strong>')) !!} </li>
            <li> {!! HTML::decode(HTML::linkAction('UsersController@index', '<strong>Usuarios</strong>')) !!} </li>
            <!--<li><a href="#"><span class="glyphicon glyphicon-stats"></span> Estadisticas</a></li>!-->
        @endif
      </ul>
           <ul class="nav navbar-nav navbar-right">
        <li> {!! HTML::decode(HTML::linkAction('PagesController@about', '<strong>Fuentes</strong>')) !!} </li>
        <li> {!! HTML::decode(HTML::linkAction('PagesController@instructions', '<strong>Instrucciones</strong>')) !!} </li>
        <li> {!! HTML::decode(HTML::linkAction('PagesController@contact', '<span class="glyphicon glyphicon-phone-alt"></span><strong> Contacto</strong>')) !!} </li>
        <li> <a>Bienvenido(a): {{ !Auth::guest()?Auth::user()->first_name:'Invitado' }}</a> </li>
        <li> {!! !Auth::guest()?HTML::linkAction('PagesController@logout','Salir'):'' !!} </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>