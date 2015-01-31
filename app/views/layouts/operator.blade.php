<!doctype html>
<html lang="en">
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
    <title>{{$title or 'Document'}}</title>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href={{URL::to('/')}} ><img src="{{URL::to('favicon.ico')}}" width="30" height="30" alt="UIN SUSKA">Sistem Informasi Parkir</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                {{--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login As Operator
                        @if (Auth::user()->hasRole('Operator Masuk'))
                            Masuk :
                        @endif
                        @if (Auth::user()->hasRole('Operator Keluar'))
                            Keluar :
                        @endif
                        {{Auth::user()->pengenal }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{Route('home.logout')}}">Logout</a></li>
                    </ul>
                </li>--}}
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<div id="container" style="width: 1350px;">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default" style="margin-top: 60px">
                <div class="panel-heading"><i class="fa fa-user fa-fw"></i>Operator Masuk
                </div>
                <div class="panel-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @section('footer')
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/sb-admin-2.js') }}
        {{ HTML::script('js/metisMenu.min.js') }}
        {{HTML::script('js/opmain.js')}}
    @show
</div>
</body>
</html>