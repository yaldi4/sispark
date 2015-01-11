function log(nama,tipe,tgl,ago,id)
{
  data = '<li> \
    <a href="javascript:postwith(\'\\\\admin\\\\user\\\\log\',{user:'+id+'})"> \
      <div> \
        <i class="fa fa-comment fa-fw"></i>'+nama+' baru saja '+tipe+' <span class="pull-right text-muted small"><abbr class="timeago" title="'+tgl+'">'+ago+'</abbr></span>\
        </div>\
    </a>\
  </li>\
  <li class="divider"></li>';
return data;
}
function link (id) {
  document.getElementById("coba").href = "javascript:postwith('http://localhost:8000/admin/user/log',{user:"+id+"})"
}
  var socket = io('http://'+location.hostname+':1337')

    socket.on('daftar', function(msg){
    //console.log(JSON.stringify(msg)); 
    //console.log(msg);
    $("#uscount").text(msg.count);
    new PNotify({
      title: 'Status',
      text:  msg.nama+' baru saja mendaftar',
      type: 'info',
      delay: 1000
        });
  	});

    socket.on('login', function(msg){ 
    $(".menu-operator").prepend(log(msg.nama,'login',msg.tgl,msg.ago,msg.id));
    //console.log(msg.id);
    $("#opcount").text(msg.count);
    new PNotify({
      title: 'Status ',
      text:  msg.nama+' baru saja login',
      type: 'info',
      delay: 5000
        });
    $("abbr.timeago").timeago()
    });

    socket.on('logout', function(msg){ 
    $(".menu-operator").prepend(log(msg.nama,'logout',msg.tgl,msg.ago,msg.id));
    $("#opcount").text(msg.count);
    new PNotify({
      title: 'Status ',
      text:  msg.nama+' baru saja logout',
      type: 'info',
      delay: 5000
        });
    $("abbr.timeago").timeago()
    });