@extends('layouts.admin')
@section('head')
    @parent
    {{ HTML::style('css/jquery.dataTables.css') }}
    {{ HTML::script('js/jquery.dataTables.js') }}
    {{ HTML::script('js/tabletools2.2.2.js') }}
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
        </div>
        <br>
        {{--<a href="" id="linkpost" class="btn btn-primary btn-md" data-info="{foo:bar,a:bee}" role="button">Tes</a><br><br>--}}


    </div>
@stop
@section('footer')
    <script>
        $(document).ready(function() {
            var table = $('#example').dataTable( {
                "sDom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "{{URL::to('copy_csv_xls_pdf.swf')}}"
                },
                "ajax": "{{Route('api.parkir')}}",
                "columns": [
                    { "data": "kendaraan_id" },
                    { "data": "op_msk" },
                    {"data" : "pic_msk"},
                    { "data": "msk_at" },
                    { "data": "op_klr" },
                    { "data": "pic_klr" },
                    { "data": "klr_at" }
                ]
            } );
        } );
    </script>
    @parent
@stop