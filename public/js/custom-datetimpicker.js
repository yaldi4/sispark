var url = $('#form-confirm-delete-dialog > form').attr('action');
  $('tbody').on('click', 'button.delete-btn', function(){
    var id = $(this).attr('data-user-id');
    $('#form-confirm-delete-dialog > form').attr('action', url+'/'+id);
    $('#form-confirm-delete-dialog input[name="id"]').val($(this).attr('data-user-id'));
    });

  $('#modal-delete-btn').click(function(){
  	$('#form-confirm-delete-dialog > form').submit();
  });

$(function () {
  $('#datetimepicker').datetimepicker({
      pickTime: false,
      defaultDate: "2014-04-24",
  });
});