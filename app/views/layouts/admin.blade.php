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
        {{ HTML::style('css/pnotify.custom.min.css') }}
        {{ HTML::style('css/datetimepicker4.css') }}
        {{ HTML::script('js/jquery-1.8.3.min.js') }}
        <script src="http://{{$_SERVER['SERVER_NAME']}}:1337/socket.io/socket.io.js"></script>
        <script> function postwith (to,p) {
                var myForm = document.createElement("form");
                myForm.method="post" ;
                myForm.action = to ;
                for (var k in p) {
                    var myInput = document.createElement("input") ;
                    myInput.setAttribute("name", k) ;
                    myInput.setAttribute("value", p[k]);
                    myForm.appendChild(myInput) ;
                }
                document.body.appendChild(myForm) ;
                myForm.submit() ;
                document.body.removeChild(myForm) ;
            }</script>
    @show
    <title>{{$title or 'Document'}} </title>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href={{URL::to('/')}} ><img src="{{URL::to('favicon.ico')}}" width="30" height="30" alt="UIN SUSKA">Sistem Informasi Parkir</a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->

            <!-- /.dropdown -->
            @include('admin.widget.notif')
            @include('admin.widget.nav')
            <!-- /.dropdown -->
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    @include('admin.widget.sidebar')
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
    </nav>
    <div id="page-wrapper" style="min-height: 365px;">
        @yield('content')



    </div>
    @section('footer')
        {{ HTML::script('js/bootstrap.min.js')}}
        {{ HTML::script('js/sb-admin-2.js')}}
        {{ HTML::script('js/metisMenu.min.js')}}
        {{ HTML::script('js/pnotify.custom.min.js')}}
        {{ HTML::script('js/moment.2.9.js') }}
        {{ HTML::script('js/timeago.js') }}
        {{ HTML::script('js/datetimepicker4.js') }}
        {{ HTML::script('js/notif.js') }}
        <script > $("abbr.timeago").timeago();</script>
        {{ HTML::script('js/main.js') }}
    @show
</div>
</body>
</html>