@extends('layouts.home')

@section('head')
    @parent
@stop

@section('content')
    <div class="col-lg-6 col-md-offset-1">
        <div class="panel panel-default" style="margin-top: 90px">
            <div class="panel-heading">
                <h3 class="panel-title">Selamat Datang di Sistem RFID Parkir UIN SUSKA</h3>
            </div>
            <div class="panel-body">
                <img src="{{URL::to('/images/islamic center.jpg')}}" class="img-responsive img-rounded" alt="" width="555" height="400">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Sign In</h3>
            </div>
            <div class="panel-body">
                {{Form::open(array('route'=>'home.login','method'=>'post'))}}
                <fieldset>
                    <div class="form-group">
                        {{Form::text('username',Input::old('username'),array('class'=>'form-control','placeholder'=>'Username','autofocus'))}}
                    </div>
                    <div class="form-group">
                        {{Form::password('password',array('class'=>'form-control','placeholder'=>'Password'))}}
                    </div>
                    <div class="form-group">
                        {{Form::select('role',array(''=>'Pilih','Operator Masuk'=>'operator masuk','Operator Keluar'=>'operator keluar' ),Input::old('tipe'), array('class' => 'form-control input-md'))}}
                    </div>
                    <div class="checkbox">
                        <label>
                            {{Form::checkbox('remember','Remember Me')}}Remember Me
                            <!--<input name="remember" type="checkbox" value="Remember Me">Remember Me-->
                        </label>
                    </div>
                    <!-- Change this to a button or input when using this as a form -->
                    {{Form::submit('Sign in',array('class'=>'btn btn-lg btn-success btn-block'))}}

                </fieldset>
                {{Form::close()}}
            </div>
        </div>
    </div>
        @stop
@section('footer')
    @parent
@stop
