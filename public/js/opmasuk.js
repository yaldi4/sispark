/**
 * Created by galih on 1/31/2015.
 */
var main = function () {
    var canvas = $('#canvas')[0];
    var context = canvas.getContext("2d");
    var video = $('#video')[0];
    var videoObj = {"video":true};
    var image_format = "jpg";
    var jpeg_quality = "85";
    var errback = function (error) {
            console.log("video capture error: ", error.code);
        };
    if (navigator.getUserMedia) {
        navigator.getUserMedia(videoObj, function (stream) {
            video.src = stream;
            video.play();
        }, errback);
    } else if (navigator.webkitGetUserMedia) {
        navigator.webkitGetUserMedia(videoObj, function (stream) {
            video.src = window.webkitURL.createObjectURL(stream);
            video.play();
        }, errback);
    } else if (navigator.mozGetUserMedia) {
        navigator.mozGetUserMedia(videoObj, function (stream) {
            video.src = window.URL.createObjectURL(stream);
            video.play();
        }, errback);
    }

    var vid = $("#video");
    var canv = $("#canvas");
    var root = 'http://' + window.location.host + '/operator/pic'
    var cari = $('#cari');
    var hasilcari = $('#hasilcari');

    cari.on('submit', function(e){
        var form = $(this);
        context.drawImage(video, 0, 0, 320, 240);
        var dataUrl = canvas.toDataURL("image/png", 0.85);
        $.ajax({
            type: "POST",
            url: root,
            data: {
                imgBase64: dataUrl,
                rfid: $('#rfid').val()
            },
            success: function(msg){
                //alert( "Data Saved: " + msg );
                new PNotify({
                    title: 'Status',
                    text: 'Anda telah masuk',
                    type: 'success',
                    delay: 1000
                });
                audio1.load();audio1.play();
            },
            statusCode: {
                333: function () {
                    //alert('page not found');
                },

                400: function () {
                    //console.log('hasil cari not ok/ sudah masuk');
                    document.forms["cari"].reset();
                    new PNotify({
                        title: 'Status',
                        text: 'Anda telah masuk',
                        type: 'error',
                        delay: 1000
                    });
                }
            }
        }).done(function(msg) {
            document.forms["cari"].reset();
            rfid.focus();
        });
        console.log('cari ok');
    });

    cari.on("eldarion-ajax:error", function(evt, $el){
        console.log('cari NOT ok');
        document.forms["cari"].reset();
        $('#nama').val("Tidak ditemukan");
        $('#kendaraan_id').val("Tidak Ditemukan");
        new PNotify({
            title: 'Status',
            text: 'Data RFID tidak ditemukan',
            type: 'error',
            delay: 1000
        });
        audio3.load();audio3.play();
    });
};
$(document).ready(main());
