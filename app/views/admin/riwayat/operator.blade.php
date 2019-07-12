@extends('layouts.admin')
@section('head')
    @parent
    {{ HTML::style('css/jquery.dataTables.css') }}
    {{ HTML::script('js/jquery.dataTables.js') }}
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Riwayat Parkir</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <br>
        {{--<a href="" id="linkpost" class="btn btn-primary btn-md" data-info="{foo:bar,a:bee}" role="button">Tes</a><br><br>--}}
        {{Datatable::table()
            ->setID('parkirtable')
            ->setClass('table table-bordered table-hover table-striped ')
            ->addColumn('operator')
            ->addColumn('subject','body','created_at')
            ->setUrl(route('api.log'))   // this is the route where data will be retrieved
            ->render() }}

        {{ Form::open(array('url' => 'admin/pengendara/','id'=>'form-delete-pengendara' ,'class' => 'pull-right')) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::close() }}
    </div>
@stop
@section('footer')
    @parent
@stop