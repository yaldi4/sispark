@extends('layouts.admin')
@section('head')
    @parent
    {{ HTML::style('css/jquery.dataTables.css') }}
    {{ HTML::style('css/lightbox.css') }}
    {{ HTML::style('css/tabletools.2.2.2.css') }}
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
            <div class="col-md-12">
                <div class='col-md-4'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker6'>
                            <input type='text' class="form-control" />
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                </span>
                        </div>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker7'>
                            <input type='text' class="form-control" />
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                </span>
                        </div>
                    </div>
                </div><a id="filter" class="btn btn-primary btn-md" role="button">Filter</a>
                <a id="download" class="btn btn-primary btn-md" role="button">Download</a>
            </div>
    <br>
        {{--<a href="" id="linkpost" class="btn btn-primary btn-md" data-info="{foo:bar,a:bee}" role="button">Tes</a><br><br>--}}
            {{Datatable::table()
                ->setID('parkirtable')
                ->setClass('table table-bordered table-hover table-striped ')
                ->addColumn('kendaraan')       // these are the column headings to be shown
                ->addColumn('Gambar Masuk')
                ->addColumn('opmasuk')
                ->addColumn('tgl_masuk')
                ->addColumn('Gambar Keluar')
                ->addColumn('opkeluar')
                ->addColumn('tgl_keluar')
                ->setUrl(route('api.parkir'))   // this is the route where data will be retrieved
                ->setOptions(
                array(
                'aaSorting'=>[[3,'desc']],
                    )
                )
                ->render() }}

        {{ Form::open(array('url' => 'admin/pengendara/','id'=>'form-delete-pengendara' ,'class' => 'pull-right')) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::close() }}
    </div>
@stop
@section('footer')
    @parent
    {{ HTML::script('js/lightbox.min.js') }}
@stop