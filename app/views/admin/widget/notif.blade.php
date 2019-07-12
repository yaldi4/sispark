<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-bell fa-fw"></i> @if (($count) > 0) <span class="badge" id="opcount">{{$count}} </span> @endif <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu menu-operator dropdown-alerts" style="height: auto;overflow-x: hidden;max-height: 150px;">
        @foreach($notif as $notification)
            <li >
                <a class="oplink" href="javascript:postwith('http://{{$_SERVER['HTTP_HOST']}}/admin/riwayat/log',{user:'{{$notification->user_id}} '})">
                    <div>
                        <i class="fa fa-comment fa-fw"></i>{{ $notification->body }}
                        <span class="pull-right text-muted small"><abbr class="timeago" title="{{ date('c',strtotime($notification->created_at))}} ">{{ date('F j, Y',strtotime($notification->created_at))}}</abbr></span>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
        @endforeach

        <li>
            <a class="text-center" href="">
                <strong>See All Alerts</strong>
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
    <!-- /.dropdown-alerts -->
</li>