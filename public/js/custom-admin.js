//<script src="http://localhost:1337/socket.io/socket.io.js"></script>
var url = $('#form-insert-rfid > form').attr('action');
  $('tbody').on('click', 'button.insert-btn', function(){
    var id = $(this).attr('create-rfid-id');
    //$('#form-confirm-delete-dialog > form').attr('action', url+'/'+id);
    $('#form-insert-rfid input[name="id"]').val($(this).attr('create-rfid-id'));
    $('#form-insert-rfid > form').submit();
    });

//  $('#modal-delete-btn').click(function(){
//    $('#form-confirm-delete-dialog > form').submit();
//  });

  var edit = $('#form-edit-rfid > form').attr('action');

  $('tbody').on('click', 'button.edit-btn', function(){
    var id = $(this).attr('edit-rfid-id');
    //$('#form-edit-kendaraan > form').attr('action', url+'/'+id);
    $('#form-edit-rfid input[name="id"]').val($(this).attr('edit-rfid-id'));
    $('#form-edit-rfid > form').submit();
    });

//var url = $('#form-edit-user > form').attr('action');
$('tbody').on('click', 'button.edit-btn', function(){
    //var id = $(this).attr('edit-user-id');
    //$('#form-edit-kendaraan > form').attr('action', url+'/'+id);
    $('#form-edit-user input[name="id"]').val($(this).attr('edit-user-id'));
    $('#form-edit-user > form').submit();
    });

$('tbody').on('click', 'button.delete-btn', function(){
    var id = $(this).attr('delete-user-id');
    //$('#form-edit-kendaraan > form').attr('action', url+'/'+id);
    $('#form-delete-user input[name="id"]').val($(this).attr('delete-user-id'));
    $('#form-delete-user > form').submit();
    });

