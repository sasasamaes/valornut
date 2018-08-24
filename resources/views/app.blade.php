<!doctype html>

<html lang="en">
    @include('partials.header')

<body>

    <div id="container" class="panel panel-default">
        <div id="top_logo">{!!HTML::image('images/logo.gif')!!}</div>
        <div id="navbar-container">
            @include('partials.navbar')
        </div>
        <div id="flash_messages" style="margin-left: 120px; margin-right: 120px">
            @if (Session::has('flash_message'))
                <div class="alert alert-info" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>{!! Session::get('flash_message') !!}</strong>
                </div>
            @endif
        </div>

        
        <div id="content-container">
            @yield('content')
        </div>
    </div>
            @include('partials.footer')
    <!-- End container div -->
</body>

</html>