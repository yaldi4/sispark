$(document).ready(function(){
var myStack = {"dir1": "up", "dir2": "left", "firstpos1": 25, "firstpos2": 25};
function show_stack_bottomright(type) {
                    var opts = {
                        title: "Over Here",
                        text: "Check me out. I'm in a different stack.",
                        addclass: "stack-bottomright",
                        stack: myStack
                    };
                    switch (type) {
                    case 'error':
                        opts.title = "Oh No";
                        opts.text = "Watch out for that water tower!";
                        opts.type = "error";
                        break;
                    case 'info':
                        opts.title = "Registration";
                        opts.text = "Seseorang baru saja mendaftar";
                        opts.type = "info";
                        break;
                    case 'success':
                        opts.title = "Good News Everyone";
                        opts.text = "I've invented a device that bites shiny metal asses.";
                        opts.type = "success";
                        break;
                    }
                    new PNotify(opts);
                }
//function notifCekTabelNotif($parameter){
//  
//}
//functin notifCekRealtime(){
//    
//}
//notifCekTabelNotif();
var conn = new ab.Session('ws://localhost:8080',
        function() {
            conn.subscribe('pendaftaran', function(topic, data) {
                // This is where you would add the new article to the DOM (beyond the scope of this tutorial)
                //trgierr eldarion funtion(topic,data);
                //notif();
                show_stack_bottomright('info');
                console.log('New user has registered on "' + topic + '" : ' + data.rfid);
            });
        },
        function() {
            console.warn('WebSocket connection closed');
        },
        {'skipSubprotocolCheck': true}
    );
  
});