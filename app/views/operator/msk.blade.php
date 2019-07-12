@extends('layouts.op')
@section('head')
    @parent
    {{ HTML::style('css/pnotify.custom.min.css') }}
@stop
@section('content')
    <div class="panel-heading"><i class="fa fa-user fa-fw"></i>Operator Masuk
    </div>
    <div class="panel-body">
    <div class="col-md-5 col-md-offset-1">
        <audio style="display:none;" id="audio1" src="{{asset('audio/selamat_datang.mp3')}}" controls preload="auto" >
        </audio>
        {{--<audio style="display:none;" id="audio2" src="{{asset('audio/ALARM.WAV')}}" controls preload="auto" >--}}
        {{--</audio>--}}
        <audio style="display:none;" id="audio3" src="{{asset('audio/alarm2.mp3')}}" controls preload="auto" >
        </audio>
        <div class="camcontent">
            <video id="video" width="320px"
                   height="240px" autoplay></video>
            <canvas id="canvas" width="320px" height="240px"></canvas>
        </div>
        {{--<div class="cambuttons">--}}
        {{--<button id="snap" style="display:none;">  Capture </button>--}}
        {{--<button id="reset" style="display:none;">  Reset  </button>--}}
        {{--<button id="upload" style="display:none;"> Upload </button>--}}
        {{--<br> <span id=uploading style="display:none;"> Uploading has begun . . .  </span>--}}
        {{--<span id=uploaded  style="display:none;"> Success, your photo has been uploaded!--}}
        {{--<a href="javascript:history.go(-1)"> Return </a> </span>--}}
        {{--</div>--}}
        <!--<div class='select'>
          <label for='videoSource'>Video source: </label><select id='videoSource'></select>
        </div>

        <video id="camera-stream" width="300" muted autoplay></video>-->
    </div>

    <div class="col-md-4 col-md-offset-1">
        {{Form::open(array('route'=>'op.postrfid','method'=>'POST','id'=>'cari','class'=>'form-horizontal ajax','data-refresh'=>'.hasilcari'))}}
        <div class="form-group">
            {{Form::label('rfid', 'RFID')}}
            {{Form::text('rfid','',array('class'=>'form-control input-md','placeholder'=>'RFID ','autofocus','autocomplete'=>'off'))}}
            {{ $errors->first('rfid') }}
        </div>
        {{Form::close()}}
        <br>
        <form class="form-horizontal ajax" method="POST" id="hasilcari" action="{{Route('op.kfrmmasuk')}} ">
            <!-- Text input-->
            <div class="form-group">
                <label for="nama">Nama</label>
                <input class="form-control input-md hasilcari" placeholder=" " autocomplete="off" name="nama" type="text" value="" id="nama" data-refresh-url="{{Route('op.getnama')}} ">
            </div>

            <div class="form-group">
                <label for="kendaraan_id">No Polisi</label>
                <input class="form-control input-md hasilcari" placeholder=" " autocomplete="off" name="nama" type="text" value="" id="kendaraan_id" data-refresh-url="{{Route('op.getkendaraan')}} ">
            </div>

            <!--<div class="form-group">
                    <input class="btn btn-primary" type="submit" id="ok" value="Konfirmasi">
            </div>-->
        </form>
        {{--<button id="alarm" class="btn btn-danger"> Alarm </button>--}}
    </div>
        </div>
@stop
@section('footer')
    @parent
    {{ HTML::script('js/pnotify.custom.min.js') }}
    {{HTML::script('js/opmasuk.js')}}
@stop