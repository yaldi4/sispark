<!doctype html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="UTF-8">
    @section('head')
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/metisMenu.min.css') }}
    {{ HTML::style('css/sb-admin-2.css') }}
    {{ HTML::style('css/font-awesome.min.css') }}
    {{ HTML::script('js/jquery-1.8.3.min.js') }}
    @show
    <title>{{ $name or 'Sistem RFID' }}</title>
</head>
<body>
<div class="container">
    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        @yield('content')
    </div>
    @section('footer')
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/sb-admin-2.js') }}
        {{ HTML::script('js/metisMenu.min.js') }}
    @show
</div>
</body>
</html>