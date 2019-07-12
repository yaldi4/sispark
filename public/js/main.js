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

    var btninfo = $('#linkpost');
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
        locale: 'id',
        format: 'YYYY-MM-D',
        defaultDate: "2014-04-24"
    });
    var awalpicker = $('#datetimepicker6');
    awalpicker.datetimepicker({
        locale: 'id',
        format: 'YYYY-MM-D HH:m:ss'
    });
    var akhirpicker = $('#datetimepicker7');
    akhirpicker.datetimepicker({
        locale: 'id',
        format: 'YYYY-MM-D HH:m:ss'
    });
    awalpicker.on("dp.change",function (e) {
        akhirpicker.data("DateTimePicker").minDate(e.date);
    });
    akhirpicker.on("dp.change",function (e) {
        awalpicker.data("DateTimePicker").maxDate(e.date);
    });


    btninfo.on('click', function (event) {
        event.preventDefault();
        var btn = $(this);
        var bar = btn.data('info');
        $.ajax({
            url: 'http://'+window.location.host+'/admin/riwayat/parkir',
            type:'POST',
            dataType:'JSON',
            data:bar,
            success: function (data) {
                console.log(data);
            }
        });
    });

    //$('#parkirtable').dataTable().fnDraw();
    $("#filter").on('click', function (event) {
        event.preventDefault();

        var btn = $(this);
        var awal = awalpicker.find("input").val();
        var akhir = akhirpicker.find("input").val();
        $.post('http://'+window.location.host+'/admin/riwayat/parkir',
            {
                awal: awal,
                akhir: akhir
            },
            function(data,status){
                //alert("Data: " + data + "\nStatus: " + status);
                if (status == 'success') {
                    $('#parkirtable').dataTable().fnDraw();
                }
            });
    });
    $("#download").on('click', function (event) {
        event.preventDefault();

        var btn = $(this);
        var awal = awalpicker.find("input").val();
        var akhir = akhirpicker.find("input").val();
        $.post('http://'+window.location.host+'/admin/riwayat/parkir',
            {
                awal: awal,
                akhir: akhir
            },
            function(data,status){
                //alert("Data: " + data + "\nStatus: " + status);
                if (status == 'success') {
                    location.href = '/admin/riwayat/download';
                }
            });

    });

};
$(document).ready(main());