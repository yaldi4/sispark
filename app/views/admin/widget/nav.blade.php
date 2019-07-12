<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-user fa-fw"></i> Login As Admin : {{ isset(Auth::user()->username)? Auth::user()->username : ''}}  <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
        <li><a href="{{Route('home.logout')}} "><i class="fa fa-sign-out fa-fw"></i> Logout</a>
        </li>
    </ul>
</li>