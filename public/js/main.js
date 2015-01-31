/**
 * Created by galih on 1/18/2015.
 */
var main = function () {
    console.log('siap bos');
    var usertable = $('#usertable').find('tbody');
    usertable.on('click', 'button[data-useredit]', function () {
        var data = $(this).data('useredit');
        bootbox.confirm("Are you sure?", function(result) {
            if (result) {
                location.href='/admin/user/'+data+'/edit';
            }
        });


    });

    var formdelete = $('#form-delete-user');
    var url = formdelete.attr('action');
    usertable.on('click', 'button[data-userdel]', function () {
        var data = $(this).data('userdel');
        //$('#form-delete-user input[name="id"]').val(data);
        formdelete.attr('action', url+'/'+data);
        bootbox.confirm("Are you sure?", function(result) {
            if (result) {
                $('#form-delete-user').submit();
            }
        });
    });

    var pengendaratable = $('#pengendaratable').find('tbody');
    pengendaratable.on('click', 'button[data-pengendaraedit]', function () {
        var data = $(this).data('pengendaraedit');
        bootbox.confirm("Are you sure?", function (result) {
            if (result) {
                location.href = '/admin/pengendara/' + data + '/edit';
            }
        });
    });

    var formdeletepengendara = $('#form-delete-pengendara');
    var urlpengendara = formdeletepengendara.attr('action');
    pengendaratable.on('click', 'button[data-pengendaradel]', function () {
        var data = $(this).data('pengendaradel');
        //$('#form-delete-user input[name="id"]').val(data);
        formdeletepengendara.attr('action', urlpengendara+'/'+data);
        bootbox.confirm("Are you sure?", function(result) {
            if (result) {
                $('#form-delete-pengendara').submit();
            }
        });
    });

    $('#datetimepicker1').datetimepicker({
        pickTime: false,
        defaultDate: "2014-04-24"
    });

};
$(document).ready(main());