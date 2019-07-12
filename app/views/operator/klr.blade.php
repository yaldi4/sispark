@extends('layouts.op')
@section('head')
    @parent
    {{HTML::style('css/pnotify.custom.min.css')}}
@stop

@section('content')
    <div class="panel-heading"><i class="fa fa-user fa-fw"></i>Operator Keluar
    </div>
    <div class="panel-body">
    <audio style="display:none;" id="audio1" src="{{asset('audio/terima_kasih.mp3')}}" controls preload="auto" autobuffer>
    </audio>
    <audio style="display:none;" id="audio2" src="{{asset('audio/alarm2.mp3')}}" controls preload="auto" autobuffer>
    </audio>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9 text-center">
                <video id="video" width="320px" height="240px" autoplay></video>

                <div class="row">
                    <div class="col-md-6 ">
                        Gambar Keluar
                        <canvas id="canvas" width="320px" height="240px"></canvas>
                        <img id="screenshot" src>
                    </div>
                    <div class="col-md-6 ">
                        Gambar Masuk
                        <img src="" class="hasilcari" data-refresh-url="{{Route('op.getpic')}} " alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                {{Form::open(array('route'=>'op.postrfid','method'=>'POST','id'=>'cari','class'=>'form-horizontal ajax','data-refresh'=>'.hasilcari'))}}
                <div class="form-group">
                    {{Form::label('rfid', 'RFID')}}
                    {{Form::text('rfid','',array('class'=>'form-control','placeholder'=>'RFID ','autofocus','autocomplete'=>'off'))}}
                    {{ $errors->first('rfid') }}
                </div>
                {{Form::close()}}


                <form class="form-horizontal ajax" method="POST" id="hasilcari" action="{{Route('op.kfrmkeluar')}} ">
                    <!-- Text input-->
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class="form-control input-md hasilcari" placeholder=" " autocomplete="off" name="nama" type="text" value="" id="nama" data-refresh-url="{{Route('op.getnama')}}"></div>

                    <div class="form-group">
                        <label for="kendaraan_id">No Polisi</label>
                        <input class="form-control input-md hasilcari" placeholder=" " autocomplete="off" name="nama" type="text" value="" id="kendaraan_id" data-refresh-url="{{Route('op.getkendaraan')}} ">
                    </div>

                    <div class="form-group">

                    </div>

                </form>
                <input class="btn btn-primary" type="submit" id="ok" value="Konfirmasi">
            </div>
        </div>

    </div>
@stop

@section('footer')
    @parent
    {{HTML::script('js/pnotify.custom.min.js')}}
    {{HTML::script('js/opkeluar.js')}}
@stop