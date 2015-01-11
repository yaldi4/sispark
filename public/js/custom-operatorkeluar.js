$( document ).ready(function() {
    console.log( "ready!" );
    //var value = "Data Tidak ditemukan";
    $("#alarm").on("click",function(evt, $el){

      audio2.load();
      audio2.play();
      evt.preventdefault();
    });

    $('#cari').on("eldarion-ajax:success", function(evt, $el){
      document.forms["cari"].reset();
      $("#ok").focus();
    });

    $('#cari').on("eldarion-ajax:error", function(evt, $el){
      document.forms["cari"].reset();
      $("#rfid").focus();
      $("#nama").val('Data tidak ditemukan');
      //$("#kendaraan_id").text('Data tidak ditemukan');
      $("#kendaraan_id option").text('Data tidak ditemukan').attr('selected', true);
    });


    $('#hasilcari').on("eldarion-ajax:success", function(evt, $el){
    //var $node = $($el.data("prepend-inner"));
    //$node.data(data.html + $node.html());
    audio1.load();audio1.play();
    console.log('sukses');
    //document.forms["myForm"].reset();
     new PNotify({
      title: 'Status',
      text: 'Data berhasil Diinput',
      type: 'success',
      delay: 1000
        });

     $("#rfid").focus();
    });
// Put event listeners into place
        window.addEventListener("DOMContentLoaded", function() {
            // Grab elements, create settings, etc.
            var canvas = document.getElementById("canvas"),
                context = canvas.getContext("2d"),
                video = document.getElementById("video"),
                videoObj = { "video": true },
                image_format= "jpeg",
                jpeg_quality= 85,
                errBack = function(error) {
                    console.log("Video capture error: ", error.code); 
                };


            // Put video listeners into place
            if(navigator.getUserMedia) { // Standard
                navigator.getUserMedia(videoObj, function(stream) {
                    video.src = stream;
                    video.play();
                    //$("#snap").show();
                }, errBack);
            } else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
                navigator.webkitGetUserMedia(videoObj, function(stream){
                    video.src = window.webkitURL.createObjectURL(stream);
                    video.play();
                    //$("#snap").show();
                }, errBack);
            } else if(navigator.mozGetUserMedia) { // moz-prefixed
                navigator.mozGetUserMedia(videoObj, function(stream){
                    video.src = window.URL.createObjectURL(stream);
                    video.play();
                    //$("#snap").show();
                }, errBack);
            }
                  // video.play();       these 2 lines must be repeated above 3 times
                  // $("#snap").show();  rather than here once, to keep "capture" hidden
                  //                     until after the webcam has been activated.  

            
		});
});