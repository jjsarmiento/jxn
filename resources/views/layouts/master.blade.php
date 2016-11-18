<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css"  href="{{ URL::asset('bootstrap-3.3.5-dist/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" type="text/css"  href="{{ URL::asset('css/jxn.css') }}" />
        @yield('head')
        @show
    </head>
    <body>
        @section('sidebar')
            {{--This is the master sidebar.--}}
        @show

        <div class="container" style="margin-top: 5em;">
            @yield('content')
        </div>
    </body>
</html>