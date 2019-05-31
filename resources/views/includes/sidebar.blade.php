<?php
$url=request()->route()->getName();
?>
<nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;" data-position="right" class="navbar-default navbar-static-side">
    <div class="sidebar-collapse menu-scroll">
        <ul id="side-menu" class="nav">
            @if(checkPermission(['super']))
                <li class="user-panel">
                    <div class="thumb"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" alt="" class="img-circle"/></div>
                    <div class="info"><p>SHIKHAO</p>
                        <ul class="list-inline list-unstyled">
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li class="active"><a href="{{url('/dashboard')}}"><i class="fa fa-home">
                            <div class="icon-bg bg-orange"></div>
                        </i><span class="menu-title">Dashboard</span></a></li>


                <li><a href="#"><i class="fa fa-user">
                            <div class="icon-bg bg-pink"></div>
                        </i><span class="menu-title">Tutor</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level @if($url === 'tutor.create' || $url==='tutor.index' || $url==='tutor.advance_search' || $url==='tutor.pending')  {{'in'}} @endif ">
                        <li><a href="{{route('tutor.create')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Add Tutor</span></a></li>
                    </ul>

                    <ul class="nav nav-second-level @if($url === 'tutor.create' || $url==='tutor.index' || $url==='tutor.advance_search' || $url==='tutor.pending')  {{'in'}} @endif ">
                        <li @if($url === 'tutor.advance_search') class="active" @endif><a href="{{route('tutor.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">All Tutor</span></a></li>
                    </ul>
                    <ul class="nav nav-second-level @if($url === 'tutor.create' || $url==='tutor.index' || $url==='tutor.advance_search' || $url==='tutor.pending')  {{'in'}} @endif ">
                        <li @if($url === 'tutor.pending') class="active" @endif><a href="{{route('tutor.pending')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Pending Tutor</span></a></li>
                    </ul>
                </li>

                <li><a href="#"><i class="fa fa-graduation-cap">
                            <div class="icon-bg bg-pink"></div>
                        </i><span class="menu-title">Student</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level @if($url === 'student.index' || $url==='student.list' || $url==='student.pendingList' || $url==="student.advance_search")  {{'in'}} @endif ">
                        <li><a href="{{route('student.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Add Student</span></a></li>
                    </ul>

                    <ul class="nav nav-second-level @if($url === 'student.index' || $url==='student.list' || $url==='student.pendingList' || $url==="student.advance_search")  {{'in'}} @endif ">
                        <li @if($url === 'student.list') class="active" @endif><a href="{{route('student.list')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">All Student</span></a></li>
                    </ul>
                    <ul class="nav nav-second-level @if($url === 'student.index' || $url==='student.list' || $url==='student.pendingList' || $url==="student.advance_search")  {{'in'}} @endif ">
                        <li @if($url === 'student.pendingList') class="active" @endif><a href="{{route('student.pendingList')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Pending Student</span></a></li>
                    </ul>
                </li>

                <li><a href="#"><i class="fa fa-tasks">
                            <div class="icon-bg bg-pink"></div>
                        </i><span class="menu-title">Job</span><span class="fa arrow"></span></a>

                    <ul class="nav nav-second-level @if($url === 'job.index' || $url==='job.list' || $url==='job.list.pending' || $url==='job.confirmed.list' )  {{'in'}} @endif ">
                        <li @if($url === 'job.index') class="active" @endif><a href="{{route('job.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Create Job</span></a></li>
                    </ul>
                    <ul class="nav nav-second-level @if($url === 'job.index' || $url==='job.list' || $url==='job.list.pending' || $url==='job.confirmed.list' )  {{'in'}} @endif ">
                        <li @if($url === 'job.list') class="active" @endif><a href="{{route('job.list')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Job List</span></a></li>
                    </ul>
                    <ul class="nav nav-second-level @if($url === 'job.index' || $url==='job.list' || $url==='job.list.pending' || $url==='job.confirmed.list' )  {{'in'}} @endif ">
                        <li @if($url === 'job.list.pending') class="active" @endif><a href="{{route('job.list.pending')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Job Pending List</span></a></li>
                    </ul>
                    <ul class="nav nav-second-level @if($url === 'job.index' || $url==='job.list' || $url==='job.list.pending' || $url==='job.confirmed.list' )  {{'in'}} @endif ">
                        <li @if($url === 'job.confirmed.list') class="active" @endif><a href="{{route('job.confirmed.list')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Job Confirmed List</span></a></li>
                    </ul>


                </li>



                <li><a href="#"><i class="fa fa-cogs">
                            <div class="icon-bg bg-pink"></div>
                        </i><span class="menu-title">Settings</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                        <li><a href="{{route('medium.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Medium</span></a></li>
                    </ul>
                    <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                        <li><a href="{{route('curriculum.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Curriculum</span></a></li>
                    </ul>
                    <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                        <li><a href="{{route('service_area.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Service Area</span></a></li>
                    </ul>
                    <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                        <li><a href="{{route('location.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Location</span></a></li>
                    </ul>

                    <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                        <li><a href="{{route('institute.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">School</span></a></li>
                    </ul>

                    <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                        <li><a href="{{route('university.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">University</span></a></li>
                    </ul>

                    <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                        <li><a href="{{route('department.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Department</span></a></li>
                    </ul>

                    <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                        <li><a href="{{route('class_table.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Classes</span></a></li>
                    </ul>

                    <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                        <li><a href="{{route('subject.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Subjects</span></a></li>
                    </ul>

                    <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                        <li><a href="{{route('education_board.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Education Board</span></a></li>
                    </ul>

                    <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                        <li><a href="{{route('grade_point.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Grade Point</span></a></li>
                    </ul>

                    <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                        <li><a href="{{route('semester_year.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Semester Year</span></a></li>
                    </ul>

                    <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                        <li><a href="{{route('occupation.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Occupation</span></a></li>
                    </ul>
                </li>

                <li><a href="#"><i class="fa fa-users">
                            <div class="icon-bg bg-pink"></div>
                        </i><span class="menu-title">Manage User</span><span class="fa arrow"></span></a>

                    <ul class="nav nav-second-level @if($url === 'createUser.view' || $url==='user.list' )  {{'in'}} @endif ">
                        <li @if($url === 'createUser.view') class="active" @endif><a href="{{route('createUser.view')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Create User</span></a></li>
                    </ul>
                    <ul class="nav nav-second-level @if($url === 'createUser.view' || $url==='user.list' )  {{'in'}} @endif ">
                        <li @if($url === 'user.list') class="active" @endif><a href="{{route('user.list')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">User List</span></a></li>
                    </ul>

                </li>
           @endif

           @if(checkPermission(['admin']))
                    <li class="user-panel">
                        <div class="thumb"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" alt="" class="img-circle"/></div>
                        <div class="info"><p>SHIKHAO</p>
                            <ul class="list-inline list-unstyled">
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <li class="active"><a href="{{url('/dashboard')}}"><i class="fa fa-home">
                                <div class="icon-bg bg-orange"></div>
                            </i><span class="menu-title">Dashboard</span></a></li>


                    <li><a href="#"><i class="fa fa-user">
                                <div class="icon-bg bg-pink"></div>
                            </i><span class="menu-title">Tutor</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level @if($url === 'tutor.create' || $url==='tutor.index' || $url==='tutor.advance_search' || $url==='tutor.pending')  {{'in'}} @endif ">
                            <li><a href="{{route('tutor.create')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Add Tutor</span></a></li>
                        </ul>

                        <ul class="nav nav-second-level @if($url === 'tutor.create' || $url==='tutor.index' || $url==='tutor.advance_search' || $url==='tutor.pending')  {{'in'}} @endif ">
                            <li @if($url === 'tutor.advance_search') class="active" @endif><a href="{{route('tutor.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">All Tutor</span></a></li>
                        </ul>
                        <ul class="nav nav-second-level @if($url === 'tutor.create' || $url==='tutor.index' || $url==='tutor.advance_search' || $url==='tutor.pending')  {{'in'}} @endif ">
                            <li @if($url === 'tutor.pending') class="active" @endif><a href="{{route('tutor.pending')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Pending Tutor</span></a></li>
                        </ul>
                    </li>

                    <li><a href="#"><i class="fa fa-graduation-cap">
                                <div class="icon-bg bg-pink"></div>
                            </i><span class="menu-title">Student</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level @if($url === 'student.index' || $url==='student.list' || $url==='student.pendingList' || $url==="student.advance_search")  {{'in'}} @endif ">
                            <li><a href="{{route('student.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Add Student</span></a></li>
                        </ul>

                        <ul class="nav nav-second-level @if($url === 'student.index' || $url==='student.list' || $url==='student.pendingList' || $url==="student.advance_search")  {{'in'}} @endif ">
                            <li @if($url === 'student.list') class="active" @endif><a href="{{route('student.list')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">All Student</span></a></li>
                        </ul>
                        <ul class="nav nav-second-level @if($url === 'student.index' || $url==='student.list' || $url==='student.pendingList' || $url==="student.advance_search")  {{'in'}} @endif ">
                            <li @if($url === 'student.pendingList') class="active" @endif><a href="{{route('student.pendingList')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Pending Student</span></a></li>
                        </ul>
                    </li>

                    <li><a href="#"><i class="fa fa-tasks">
                            <div class="icon-bg bg-pink"></div>
                        </i><span class="menu-title">Job</span><span class="fa arrow"></span></a>
                        
                        <ul class="nav nav-second-level @if($url === 'job.index' || $url==='job.list' || $url==='job.list.pending' || $url==='job.confirmed.list' )  {{'in'}} @endif ">
                            <li @if($url === 'job.index') class="active" @endif><a href="{{route('job.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Create Job</span></a></li>
                        </ul>
                        <ul class="nav nav-second-level @if($url === 'job.index' || $url==='job.list' || $url==='job.list.pending' || $url==='job.confirmed.list' )  {{'in'}} @endif ">
                            <li @if($url === 'job.list') class="active" @endif><a href="{{route('job.list')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Job List</span></a></li>
                        </ul>
                        <ul class="nav nav-second-level @if($url === 'job.index' || $url==='job.list' || $url==='job.list.pending' || $url==='job.confirmed.list' )  {{'in'}} @endif ">
                            <li @if($url === 'job.list.pending') class="active" @endif><a href="{{route('job.list.pending')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Job Pending List</span></a></li>
                        </ul>
                        <ul class="nav nav-second-level @if($url === 'job.index' || $url==='job.list' || $url==='job.list.pending' || $url==='job.confirmed.list' )  {{'in'}} @endif ">
                            <li @if($url === 'job.confirmed.list') class="active" @endif><a href="{{route('job.confirmed.list')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Job Confirmed List</span></a></li>
                        </ul>

                        
                    </li>



                    <li><a href="#"><i class="fa fa-cogs">
                                <div class="icon-bg bg-pink"></div>
                            </i><span class="menu-title">Settings</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                            <li><a href="{{route('medium.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Medium</span></a></li>
                        </ul>
                        <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                            <li><a href="{{route('curriculum.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Curriculum</span></a></li>
                        </ul>
                        <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                            <li><a href="{{route('service_area.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Service Area</span></a></li>
                        </ul>
                        <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                            <li><a href="{{route('location.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Location</span></a></li>
                        </ul>

                        <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                            <li><a href="{{route('institute.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">School</span></a></li>
                        </ul>

                        <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                            <li><a href="{{route('university.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">University</span></a></li>
                        </ul>

                        <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                            <li><a href="{{route('department.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Department</span></a></li>
                        </ul>

                        <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                            <li><a href="{{route('class_table.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Classes</span></a></li>
                        </ul>

                        <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                            <li><a href="{{route('subject.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Subjects</span></a></li>
                        </ul>

                        <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                            <li><a href="{{route('education_board.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Education Board</span></a></li>
                        </ul>

                        <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                            <li><a href="{{route('grade_point.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Grade Point</span></a></li>
                        </ul>

                        <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                            <li><a href="{{route('semester_year.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Semester Year</span></a></li>
                        </ul>

                        <ul class="nav nav-second-level @if($url === 'medium.index' || $url==='curriculum.index' || $url==='service_area.index' || $url==='location.index' || $url==='institute.index' || $url==='university.index' || $url==='department.index' || $url==='class_table.index' || $url==='subject.index' || $url==='education_board.index' || $url==='grade_point.index' || $url==='semester_year.index' || $url==='occupation.index')  {{'in'}} @endif ">
                            <li><a href="{{route('occupation.index')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Occupation</span></a></li>
                        </ul>
                    </li>

                    <li><a href="#"><i class="fa fa-users">
                            <div class="icon-bg bg-pink"></div>
                        </i><span class="menu-title">Manage User</span><span class="fa arrow"></span></a>
                        
                        <ul class="nav nav-second-level @if($url === 'createUser.view' || $url==='user.list' )  {{'in'}} @endif ">
                            <li @if($url === 'createUser.view') class="active" @endif><a href="{{route('createUser.view')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">Create User</span></a></li>
                        </ul>
                        <ul class="nav nav-second-level @if($url === 'createUser.view' || $url==='user.list' )  {{'in'}} @endif ">
                            <li @if($url === 'user.list') class="active" @endif><a href="{{route('user.list')}}"><i class="fa fa-angle-right"></i><span class="submenu-title">User List</span></a></li>
                        </ul>
                        
                    </li>
            @endif
        </ul>
    </div>
</nav>