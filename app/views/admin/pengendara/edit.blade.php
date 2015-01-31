@extends('layouts.admin')
@section('head')
    @parent
    {{ HTML::style('css/bootstrap-datetimepicker.min.css') }}
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Pengendara</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            {{Form::model($pengendara, array('route'=> array('admin.pengendara.update', $pengendara->id),'method' =>'PUT','class'=>'form-horizontal'))}}
            <div class="form-group">
                {{Form::label('NIM', 'NIM',array('class' => 'col-md-4 control-label'))}}
                <div class="col-md-4">
                    {{Form::text('pengenal',$pengendara->pengenal,array('class'=>'form-control input-md','placeholder'=>'Pengenal NIM/NIP Anda'))}}
                </div>
                {{ $errors->first('pengenal') }}
            </div>
            <div class="form-group">
                {{Form::label('nama', 'Nama',array('class' => 'col-md-4 control-label'))}}
                <div class="col-md-4">
                    {{Form::text('nama',$pengendara->nama,array('class'=>'form-control input-md','placeholder'=>'Nama Anda'))}}
                </div>
                {{ $errors->first('nama') }}
            </div>
            <div class="form-group">
                {{Form::label('tempat_lahir', 'Tempat Lahir',array('class' => 'col-md-4 control-label'))}}
                <div class="col-md-4">
                    {{Form::text('tempat_lahir',$pengendara->tempat_lahir,array('class'=>'form-control input-md','placeholder'=>'Tempat Lahir Anda'))}}
                </div>
                {{ $errors->first('tempat_lahir') }}
            </div>
            <div class="form-group">
                {{Form::label('tgl_lahir', 'TGL Lahir',array('class' => 'col-md-4 control-label'))}}
                <div class="col-md-4">
                    <div class='input-group date' id='datetimepicker1' data-date-format="YYYY-MM-DD"/>
                    {{Form::text('tgl_lahir',$pengendara->tgl_lahir,array('class'=>'form-control input-md'))}}
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                </div>
            </div>
            {{ $errors->first('tgl_lahir') }}
        </div>
        <div class="form-group">
            {{Form::label('jk', 'Jenis Kelamin',array('class' => 'col-md-4 control-label'))}}
            <div class="col-md-4">
                {{Form::radio('jk', 'Pria', ($pengendara->jk == 'Pria') ? true : false, array('class'=>'check-inline'))}}Pria
                {{Form::radio('jk', 'Wanita',($pengendara->jk == 'Wanita') ? true : false, array('class'=>'check-inline'))}}Wanita
            </div>
        </div>
        <div class="form-group">
            {{Form::label('no_hp', 'No HP',array('class' => 'col-md-4 control-label'))}}
            <div class="col-md-4">
                {{Form::text('no_hp',$pengendara->no_hp,array('class'=>'form-control input-md','placeholder'=>'08-XXX-XXX'))}}
            </div>
            {{ $errors->first('no_hp') }}
        </div>
        <div class="form-group">
            {{Form::label('alamat', 'Alamat',array('class' => 'col-md-4 control-label'))}}
            <div class="col-md-4">
                {{Form::textarea('alamat',$pengendara->alamat,array('class'=>'form-control input-md','placeholder'=>'Jl. '))}}
            </div>
            {{ $errors->first('alamat') }}
        </div>
        <div class="form-group">
            <div class="col-md-4 control-label"></div>
            <div class="col-md-4">
                {{Form::submit('Update',array('class'=>'btn btn-primary'))}}
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
    {{ HTML::script('js/bootstrap-datetimepicker.min.js') }}
    @parent
@stop