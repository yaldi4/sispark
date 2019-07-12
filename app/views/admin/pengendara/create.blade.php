@extends('layouts.admin')
@section('head')
    @parent
    {{--{{ HTML::style('css/bootstrap-datetimepicker.min.css') }}--}}
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Pengendara</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            {{Form::open(array('route'=>'admin.pengendara.store','class'=>'form-horizontal'))}}
                <div class="form-group">
                    {{Form::label('NIM', 'NIM',array('class' => 'col-md-4 control-label'))}}
                    <div class="col-md-4">
                    {{Form::text('pengenal',Input::old('pengenal'),array('class'=>'form-control input-md','placeholder'=>'Pengenal NIM/NIP Anda'))}}
                    </div>
                    {{ $errors->first('pengenal') }}
                </div>
                <div class="form-group">
                    {{Form::label('nama', 'Nama',array('class' => 'col-md-4 control-label'))}}
                    <div class="col-md-4">
                    {{Form::text('nama',Input::old('nama'),array('class'=>'form-control input-md','placeholder'=>'Nama Anda'))}}
                    </div>
                    {{ $errors->first('nama') }}
                </div>
                <div class="form-group">
                    {{Form::label('tempat_lahir', 'Tempat Lahir',array('class' => 'col-md-4 control-label'))}}
                    <div class="col-md-4">
                    {{Form::text('tempat_lahir',Input::old('tempat_lahir'),array('class'=>'form-control input-md','placeholder'=>'Tempat Lahir Anda'))}}
                    </div>
                    {{ $errors->first('tempat_lahir') }}
                </div>
                <div class="form-group">
                    {{Form::label('tgl_lahir', 'TGL Lahir',array('class' => 'col-md-4 control-label'))}}
                    <div class="col-md-4">
                        <div class='input-group date' id='datetimepicker1'/>
                        {{Form::text('tgl_lahir',Input::old('tgl_lahir'),array('class'=>'form-control input-md'))}}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        </div>
                    </div>
                    {{ $errors->first('tgl_lahir') }}
        </div>
                <div class="form-group">
                    {{Form::label('jk', 'Jenis Kelamin',array('class' => 'col-md-4 control-label'))}}
                    <div class="col-md-4">
                    {{Form::radio('jk', 'Pria', (Input::old('jk') == 'Pria') ? true : false, array('class'=>'check-inline'))}}Pria
                    {{Form::radio('jk', 'Wanita',(Input::old('jk') == 'Wanita') ? true : false, array('class'=>'check-inline'))}}Wanita
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('no_hp', 'No HP',array('class' => 'col-md-4 control-label'))}}
                    <div class="col-md-4">
                    {{Form::text('no_hp',Input::old('no_hp'),array('class'=>'form-control input-md','placeholder'=>'08-XXX-XXX'))}}
                    </div>
                    {{ $errors->first('no_hp') }}
                </div>
                <div class="form-group">
                    {{Form::label('alamat', 'Alamat',array('class' => 'col-md-4 control-label'))}}
                    <div class="col-md-4">
                    {{Form::textarea('alamat',Input::old('alamat'),array('class'=>'form-control input-md','placeholder'=>'Jl. '))}}
                    </div>
                    {{ $errors->first('alamat') }}
                </div>
                <div class="form-group">
                    <div class="col-md-4 control-label"></div>
                    <div class="col-md-4">
                    {{Form::submit('Simpan',array('class'=>'btn btn-primary'))}}
                    {{Form::reset('Batal',array('class'=>'btn btn-warning'))}}
                    <a href="{{Route('admin.pengendara.index')}} " class="btn btn-danger btn-md" role="button">Kembali</a>
                    </div>
                </div>
            {{Form::close()}}
        </div>
    </div>
@stop
@section('footer')
    {{ HTML::script('js/moment.min.js') }}
    {{--{{ HTML::script('js/bootstrap-datetimepicker.min.js') }}--}}
    @parent
@stop