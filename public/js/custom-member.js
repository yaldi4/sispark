var url = $('#form-confirm-delete-dialog > form').attr('action');
  $('tbody').on('click', 'button.delete-btn', function(){
    var id = $(this).attr('delete-kendaraan-id');
    $('#form-confirm-delete-dialog > form').attr('action', url+'/'+id);
    $('#form-confirm-delete-dialog input[name="id"]').val($(this).attr('delete-kendaraan-id'));
    });

  $('#modal-delete-btn').click(function(){
    $('#form-confirm-delete-dialog > form').submit();
  });

  var edit = $('#form-edit-kendaraan > form').attr('action');

  $('tbody').on('click', 'button.edit-btn', function(){
    var id = $(this).attr('edit-kendaraan-id');
    //$('#form-edit-kendaraan > form').attr('action', url+'/'+id);
    $('#form-edit-kendaraan input[name="id"]').val($(this).attr('edit-kendaraan-id'));
    $('#form-edit-kendaraan > form').submit();
    });