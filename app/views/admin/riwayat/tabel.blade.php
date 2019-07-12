<!DOCTYPE html>
<html>
<head>
    <title>Laporan Riwayat Parkir</title>
</head>
<body>
<h1>Riwayat Parkir</h1>
<table id="example" border="1"{{--class="display"--}} {{--cellspacing="0"--}} {{--width="100%"--}}>
    <thead>
    <tr>
        <th>No Pol</th>
        <th>Operator Masuk</th>
        <th>Gambar Masuk</th>
        <th>Waktu Masuk</th>
        <th>Operator Keluar</th>
        <th>Gambar Keluar</th>
        <th>Waktu Keluar</th>
    </tr>
    </thead>
    {{--<tbody>--}}
    @foreach($data as $d)
        <tr>
            <td>{{$d->kendaraan->no_pol}}</td>
            <td>{{$d->opmasuk->username}}</td>
            <td><img src="./uploads/{{$d->pic_msk}}" alt="" width="80px" height="60px"/></td>
            <td>{{$d->msk_at}}</td>
            <td>{{isset($d->opkeluar->username) ? $d->opkeluar->username : 'Pengendara Belum Keluar'}}</td>
            <td><img src="./uploads/{{$d->pic_klr}}" alt="" width="80px" height="60px"/></td>
            <td>{{$d->klr_at}}</td>
        </tr>
    @endforeach
    {{--</tbody>--}}
    {{--<tfoot>
    <tr>
        <th>kendaraan_id</th>
        <th>op_msk</th>
        <th>pic_msk</th>
        <th>msk_at</th>
        <th>op_klr</th>
        <th>pic_klr</th>
        <th>klr_at</th>
    </tr>
    </tfoot>--}}
</table>
</body>
</html>