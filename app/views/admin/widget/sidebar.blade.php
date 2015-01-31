{{--<li>
    <a href="{{Route('admin.index')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
</li>--}}
<li>
    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Pengendara<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li>
            <a href="{{Route('admin.pengendara.index')}}">Data Pengendara</a>
        </li>
        <li>
            <a href="">Riwayat Parkir</a>
        </li>
    </ul>
    <!-- /.nav-second-level -->
</li>
<li>
    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>User<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li>
            <a href="{{Route('admin.user.index')}}">Data User</a>
        </li>
        {{--<li>
            <a href="{{Route('admin.showriwayatoperator')}} ">Riwayat Operator</a>
        </li>--}}
    </ul>
    <!-- /.nav-second-level -->
</li>