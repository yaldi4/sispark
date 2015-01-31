@extends('layouts.admin')
@section('head')
    @parent
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah User</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            {{Form::model($user, array('route'=> array('admin.user.update', $user->id),'method' =>'PUT','class'=>'form-horizontal'))}}
            <div class="form-group">
                {{Form::label('username', 'Username', array('class' => 'col-md-4 control-label'))}}
                <div class="col-md-4">
                    {{Form::text('username',null,array('class'=>'form-control input-md','placeholder'=>'Username Anda'))}}
                </div>
                {{ $errors->first('username') }}
            </div>

            <div class="form-group">
                {{Form::label('password', 'Password', array('class' => 'col-md-4 control-label'))}}
                <div class="col-md-4">
                    {{Form::password('password',array('class'=>'form-control input-md','placeholder'=>'Password Anda'))}}
                </div>
                {{ $errors->first('password') }}
            </div>

            <div class="form-group">
                {{Form::label('tipe', 'Tipe User',array('class' => 'col-md-4 control-label'))}}
                <div class="col-md-4">
                    {{Form::select('role',array(''=>'Pilih','admin'=>'Admin','operator'=>'Operator' ),$user->role, array('class' => 'form-control input-md'))}}
                </div>
                {{ $errors->first('role') }}
            </div>

            <div class="form-group">
                <div class="col-md-4 control-label"></div>
                <div class="col-md-4">
                    {{Form::submit('Update',array('class'=>'btn btn-primary'))}}
                    {{Form::reset('Batal',array('class'=>'btn btn-warning'))}}
                    <a href="{{Route('admin.user.index')}} " class="btn btn-danger btn-md" role="button">Kembali</a>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
@stop
@section('footer')
    @parent
@stop