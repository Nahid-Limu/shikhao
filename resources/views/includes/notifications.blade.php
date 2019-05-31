<li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-bell fa-fw"></i><span class="badge badge-green">{{count(auth()->user()->unreadNotifications)}}</span></a>
    <ul class="dropdown-menu dropdown-alerts">
        <li><p>You have {{count(auth()->user()->unreadnotifications)}} new notifications</p></li>
        <li>
            <div class="dropdown-slimscroll">
                <ul>
                    @foreach(auth()->user()->unreadnotifications as $n)
                        <li style="height: 70px; line-height: 25px;"><a href="#"><span class="label label-blue"><i class="fa fa-comment"></i></span>{{$n->data['message']}}<span class="pull-right text-muted small">{{\Carbon\Carbon::parse($n->created_at)->diffForHumans()}}</span></a></li>
                    @endforeach
                </ul>
            </div>
        </li>
        <li class="last" style="display: flex; justify-content: space-between;">
            <a href="{{route('notification.read')}}" class="read-notification" style="text-align: left; color: #0b97c4">Mark All Read</a>
            <a href="#" style="text-align: right">See all alerts</a>
        </li>
    </ul>
</li>