@extends('layouts.admin')
@section('head')
    @parent
    {{ HTML::style('css/jquery.dataTables.css') }}
    {{ HTML::script('js/jquery.dataTables.js') }}
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Pengendara</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <a href="{{Route('admin.pengendara.create')}} " class="btn btn-primary btn-md" role="button">Tambah Pengendara</a><br><br>
        {{ Datatable::table()
        ->setID('pengendaratable')
        ->setClass('table table-bordered table-hover table-striped ')
        ->setOptions(array("sPaginationType" => "two_button"))
        ->addColumn('pengenal','nama')       // these are the column headings to be shown
        ->addColumn('aksi')
        ->setUrl(route('api.pengendara'))   // this is the route where data will be retrieved
        ->render() }}

        {{ Form::open(array('url' => 'admin/pengendara/','id'=>'form-delete-pengendara' ,'class' => 'pull-right')) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::close() }}
    </div>
@stop
@section('footer')
    @parent
    {{ HTML::script('js/bootbox.min.js') }}
@stop