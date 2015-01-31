@extends('layouts.admin')
@section('head')
    @parent
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Kendaraan</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            {{Form::open(array('route'=>'admin.kendaraan.store','class'=>'form-horizontal'))}}
            <div class="form-group">
                {{Form::label('RFID', 'RFID',array('class' => 'col-md-4 control-label'))}}
                <div class="col-md-4">
                    {{Form::text('rfid',Input::old('rfid'),array('class'=>'form-control input-md','placeholder'=>'RFID Kendaraan'))}}
                </div>
                {{ $errors->first('rfid') }}
            </div>
            <div class="form-group">
                {{Form::label('no_pol', 'No Polisi',array('class' => 'col-md-4 control-label'))}}
                <div class="col-md-4">
                    {{Form::text('no_pol',Input::old('no_pol'),array('class'=>'form-control input-md','placeholder'=>'No Polisi Kendaraan'))}}
                </div>
                {{ $errors->first('no_pol') }}
            </div>
            <div class="form-group">
                {{Form::label('merek', 'Merek',array('class' => 'col-md-4 control-label'))}}
                <div class="col-md-4">
                    {{Form::text('merek',Input::old('merek'),array('class'=>'form-control input-md','placeholder'=>'Merek Kendaraan'))}}
                </div>
                {{ $errors->first('merek') }}
            </div>
            <div class="form-group">
                {{Form::label('tipe', 'Tipe',array('class' => 'col-md-4 control-label'))}}
                <div class="col-md-4">
                    {{Form::text('tipe',Input::old('tipe'),array('class'=>'form-control input-md','placeholder'=>'Tipe Kendaraan'))}}
                </div>
                {{ $errors->first('tipe') }}
            </div>
            <div class="form-group">
                {{Form::label('warna', 'Warna',array('class' => 'col-md-4 control-label'))}}
                <div class="col-md-4">
                    {{Form::text('warna',Input::old('warna'),array('class'=>'form-control input-md','placeholder'=>'Warna Kendaraan'))}}
                </div>
                {{ $errors->first('warna') }}
            </div>
            <div class="form-group">
                {{Form::label('jenis', 'Jenis',array('class' => 'col-md-4 control-label'))}}
                <div class="col-md-4">
                    {{Form::text('jenis',Input::old('jenis'),array('class'=>'form-control input-md','placeholder'=>'Jenis Kendaraan'))}}
                </div>
                {{ $errors->first('jenis') }}
            </div>
            <div class="form-group">
                <div class="col-md-4 control-label"></div>
                <div class="col-md-4">
                    {{Form::submit('Simpan',array('class'=>'btn btn-primary'))}}
                    {{Form::reset('Batal',array('class'=>'btn btn-warning'))}}
                    <a href="{{Route('admin.kendaraan.index')}} " class="btn btn-danger btn-md" role="button">Kembali</a>
                </div>
            </div>
        {{Form::close()}}
    </div>
    </div>
@stop
@section('footer')
    @parent
@stop