    <div id="header-topbar-option-demo" class="page-header-topbar">
        <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" data-intro="&lt;b&gt;Topbar&lt;/b&gt; has other styles with live demo. Go to &lt;b&gt;Layouts-&gt;Header&amp;Topbar&lt;/b&gt; and check it out." class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" href="{{url('/dashboard')}}" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">SHIKHAO</span><span style="display: none" class="logo-text-icon">µ</span></a></div>
            <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>

                <div class="news-update-box hidden-xs"><span class="text-uppercase mrm pull-left">News:</span>
                    <ul id="news-update" class="ticker list-unstyled">
                        <li>Welcome To Shikhao</li>
                    </ul>
                </div>
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    @include('includes.notifications')

                    @if(checkPermission(['receptionist']) || checkPermission(['doctor']) || checkPermission(['labattendent']) || checkPermission(['nurse']))
                    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs">{{ Auth::user()->name }}</span>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <li><a href="" ><i class="fa fa-user"></i>My Profile</a></li>
                            {{--<li><a href="#"><i class="fa fa-envelope"></i>My Inbox<span class="badge badge-danger">3</span></a></li>--}}
                            {{--<li><a href="#"><i class="fa fa-tasks"></i>My Tasks<span class="badge badge-success">7</span></a></li>--}}
                            {{--<li class="divider"></li>--}}
                            {{--<li><a href="#"><i class="fa fa-lock"></i>Lock Screen</a></li>--}}
                            {{--<li><a href="#"><i class="fa fa-windows"></i>Theme Style</a></li>--}}
                            <li><a href="{{url('/logout')}}"><i class="fa fa-key"></i>Log Out</a></li>
                        </ul>
                    </li>
                    @else
                        <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs">{{ Auth::user()->name }}</span>&nbsp;<span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-user pull-right">
                                <li><a href="{{route('user.user_profile')}}" type="button"><i class="fa fa-user"></i>My Profile</a></li>
                                <li><a href="" type="button" data-toggle="modal" data-target="#changePassword"><i class="fa fa-key"></i>Change Password</a></li>
                                {{--<li><a href="#"><i class="fa fa-envelope"></i>My Inbox<span class="badge badge-danger">3</span></a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-tasks"></i>My Tasks<span class="badge badge-success">7</span></a></li>--}}
                                {{--<li class="divider"></li>--}}
                                {{--<li><a href="#"><i class="fa fa-lock"></i>Lock Screen</a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-windows"></i>Theme Style</a></li>--}}
                                <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out"></i>Log Out</a></li>
                            </ul>
                        </li>
                    @endif
            {{--<li id="topbar-chat" class="hidden-xs"><a href="javascript:void(0)" data-step="4" data-intro="&lt;b&gt;Form chat&lt;/b&gt; keep you connecting with other coworker" data-position="left" class="btn-chat"><i class="fa fa-comments"></i><span class="badge badge-info">3</span></a></li> --}}
                </ul>
            </div>
        </nav>
    </div>

    <!-- Modal -->
    <div id="changePassword" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content animated swing">
    <form action="{{route('changePass')}}" method="post">
        @csrf
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Change Password</b></h4>
      </div>
      
        <div class="modal-body">
            <div class="control-group">
                <label for="current_password" class="control-label">Current Password</label>
                <div class="controls">
                    <input type="password" class="form-control" name="current_password" required>
                </div>
            </div>
            <div class="control-group">
                <label for="new_password" class="control-label">New Password</label>
                <div class="controls">
                    <input type="password" class="form-control" name="new_password" id="new_password" required>
                </div>
            </div>
            <div class="control-group">
                <label for="confirm_password" class="control-label">Confirm Password</label>
                <div class="controls">
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
                </div>
            </div>
            
            <i class="fa fa-eye" id="show"> Show Password</i>
            
        
        </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-md btn-red pull-left">Reset</button>
            <button type="submit" class="btn btn-md btn-blue" ><i class="fa fa-refresh"> Change</i></button>
        </div>
        </form>
        </div>

    </div>
    </div>
    
{{ Html::script('assets/js/jquery-1.10.2.min.js') }}
<script type='text/javascript'>
    $(document).ready(function(){
        $('#show').click(function(){
            if($("#new_password").val() != '' ){
                
                $("#new_password").attr("type","text");
                $("#confirm_password").attr("type","text");
            }
            
        });
    });
</script>
