$( document ).ready(function() {
    console.log( "ready!" );
    //var value = "Data Tidak ditemukan";
    $("#alarm").on("click",function(){
      audio2.load();
      audio2.play();
    });

    $('#cari').on("eldarion-ajax:success", function(evt, $el){
      document.forms["cari"].reset();
      $("#snap").focus();
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
    //$("#welcome)".play();
    console.log('sukses');
    //document.forms["myForm"].reset();
     new PNotify({
      title: 'Status',
      text: 'Data berhasil Diinput',
      type: 'success',
      delay: 1000
        });
     audio1.load();audio1.play();
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
                    $("#snap").show();
                }, errBack);
            } else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
                navigator.webkitGetUserMedia(videoObj, function(stream){
                    video.src = window.webkitURL.createObjectURL(stream);
                    video.play();
                    $("#snap").show();
                }, errBack);
            } else if(navigator.mozGetUserMedia) { // moz-prefixed
                navigator.mozGetUserMedia(videoObj, function(stream){
                    video.src = window.URL.createObjectURL(stream);
                    video.play();
                    $("#snap").show();
                }, errBack);
            }
                  // video.play();       these 2 lines must be repeated above 3 times
                  // $("#snap").show();  rather than here once, to keep "capture" hidden
                  //                     until after the webcam has been activated.  

            // Get-Save Snapshot - image 
            document.getElementById("snap").addEventListener("click", function() {
                context.drawImage(video, 0, 0, 320, 240);
                //console.log(video.width);
                // the fade only works on firefox?
                $("#video").fadeOut("fast");
                $("#canvas").fadeIn("fast");
                $("#snap").hide();
                $("#reset").show();
                $("#upload").show();
                $("#upload").focus();
            });
            // reset - clear - to Capture New Photo
            document.getElementById("reset").addEventListener("click", function() {
                $("#video").fadeIn("fast");
                $("#canvas").fadeOut("fast");
                $("#snap").show();
                $("#snap").focus();
                $("#reset").hide();
                $("#upload").hide();
            });
            // Upload image to sever 
            document.getElementById("upload").addEventListener("click", function(){
                var dataUrl = canvas.toDataURL("image/png", 0.85);
                var root = 'http://' + window.location.host + '/operator/pic';
                //base = root.toString(); 
                $("#uploading").show();
                $.ajax({
                  type: "POST",
                  url: root,
                  data: { 
                     imgBase64: dataUrl,
                     user: "Joe",
                     userid: 25
                  }
                }).done(function(msg) {
                  console.log("saved");
                  $("#uploading").hide();
                  $("#uploaded").show();
                  $("#uploaded").fadeOut("fast");
                  $("#video").fadeIn("fast");
                  $("#canvas").fadeOut("fast");
                  $("#upload").hide();
                  $("#snap").show();
                  $("#reset").hide();
                  //$("#hasilcari").submit();
                  audio1.load();audio1.play();
                  new PNotify({
                  title: 'Status',
                  text: 'Data berhasil Diinput',
                  type: 'success',
                  delay: 1000
                    });
                  
                  $("#rfid").focus();
                });
            });
        }, false);

});