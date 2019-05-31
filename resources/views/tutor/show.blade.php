@extends('layouts.master')
@section('title', 'Tutor Profile')
@section('content')
    <style>
        .custom-modal .form-group{
            padding: 13px;
            padding-bottom: 0px;
        }

        .bottom-padding-12{
            padding-bottom: 12px;
        }
        .subject-result .fa-trash-o:hover{
            cursor: pointer;

        }

    </style>

    <div class="page-content">
        @if(Session::has('success'))
            <p id="alert_message" class="alert alert-success">{{ Session::get('success') }}</p>
        @endif
        @if(Session::has('error'))
            <p id="alert_message" class="alert alert-error">{{ Session::get('error') }}</p>
        @endif
        @if(Session::has('delete'))
            <p id="alert_message" class="alert alert-danger">{{ Session::get('delete') }}</p>
        @endif
        @if ($errors->any())
            <div id="alert_message" class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div id="sum_box" class="row mbl">

            <div class="col-md-3">
                <div class="panel  mbm">
                    <div class="panel-body">

                        <div class="profile_img row">
                            <div class="panel-img col-sm-12">
                                <img src="@if($tutor->image!=null)
                                {{asset("Tutor_Images/".$tutor->image)}}
                                @else
                                {{asset("Tutor_Images/profile_image.jpeg")}}
                                @endif" alt="" class="img-responsive" />
                            </div>

                        </div>
                        <br>
                        <div class="col-sm-6">
                            <a href="#" data-toggle="modal"
                               data-target="#editPassword">Password <i class="fa fa-edit"></i></a>

                        </div>
                        <div class="col-sm-6">
                            <a href="#" data-toggle="modal"
                               data-target="#editPhoto">Photo <i class="fa fa-edit"></i></a>
                        </div>

                        <div class="profile_details">
                            <ul>
                                <li>
                                    <p>Full Name <span>*</span></p>
                                    <p> <span>{{$tutor->name}}</span> </p>
                                </li>
                                <li>
                                    <p>Shikhao ID</p>
                                    <p> <span>{{$tutor->shikhao_id}}</span> </p>
                                </li>
                                <li>
                                    <p>Mobile Number</p>
                                    <p> <span>+88{{$tutor->contact_number}}</span> </p>
                                </li>
                                <li>
                                    <p>Email </p>
                                    <p> <span>{{$tutor->email}}</span> </p>
                                </li>
                                <li>
                                    <p>
                                        <b><div class="col-md-8" style="padding-left: 0px"> Account Status </div></b>
                                    <div class="col-md-4">
                                        <a href="#" class="btn edit_btn btn-xs" data-toggle="modal"
                                           data-target="#editAccountStatus"><i class="fa fa-edit"></i>Edit</a>
                                    </div>
                                    </p>
                                    <p>
                                        @if($tutor->account_status==1)
                                            <span class="text-green">Active</span>
                                        @elseif($tutor->account_status==0)
                                            <span class="text-danger">Pending</span>
                                        @elseif($tutor->account_status==2)
                                            <span class="text-danger">Blocked</span>
                                        @endif
                                    </p>

                                </li>
                                <li>
                                    <p>Type </p>
                                    <p>
                                        <span class="text-blue">Tutor</span>
                                    </p>
                                </li>

                            </ul>
                        </div>


                    </div>
                </div>
            </div>


            <div class="col-md-9">
                <div class="panel">
                    <div class="panel-body profile-panel-body">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-edit" data-toggle="tab" aria-expanded="true">Profile</a></li>
                            <li><a href="#tab-education" data-toggle="tab" aria-expanded="false">Educational Information</a></li>
                            <li><a href="#tab-nominee" data-toggle="tab" aria-expanded="false">Credentials</a></li>
                        {{--<li><a href="#tab-messages" data-toggle="tab" aria-expanded="false">Messages</a></li>--}}
                        {{--<button class="btn  edit_btn" data-toggle="modal"--}}
                        {{--data-target="#myModal-3"> <i class="fa fa-edit"></i>Edit</button>--}}

                        <!-- <li><a href="#tab-messages" data-toggle="tab" aria-expanded="false">Messages</a></li> -->
                        </ul>
                        <div id="generalTabContent" class="tab-content profile-tab-content">
                            <div id="tab-edit" class="tab-pane fade in active">

                                <form action="#" class="form-horizontal">
                                    <div class="row pb-r">
                                        <div class="col-md-8">
                                            <p class="content_heading">
                                                <label for="" class="left_label"><i class="fa fa-angle-up"></i></label>
                                                Personal Information
                                                <i class="right_label fa fa-info-circle"></i>
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn edit_btn btn-xs" data-value="bounceIn" data-toggle="modal"
                                               data-target="#editPersonalInfo"><i class="fa fa-edit"></i>Edit</button>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Username (Facebook) : </label>
                                                <div class="col-md-7 col-sm-8 col-xs-7">
                                                    <p class="form-control-static">{{$tutor->facebook_username}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Occupation: </label>
                                                <div class="col-md-7 col-sm-8 col-xs-7">
                                                    <p class="form-control-static">{{$tutor->occupation_name}} &nbsp</p>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Date Of Birth : </label>
                                                <div class="col-md-7 col-sm-8 col-xs-7">
                                                    <p class="form-control-static">{{\Carbon\Carbon::parse($tutor->dob)->format('d M Y')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Gender : </label>
                                                <div class="col-md-7 col-sm-8 col-xs-7">
                                                    <p class="form-control-static">
                                                        @if($tutor->gender==1)
                                                            Male
                                                        @elseif($tutor->gender==2)
                                                            Female
                                                        @else
                                                            Others
                                                        @endif
                                                        &nbsp
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Father's Name : </label>
                                                <div class="col-md-7 col-sm-8 col-xs-7">
                                                    <p class="form-control-static">{{$tutor->fathers_name}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Mother's Name: </label>

                                                <div class="col-md-7 col-sm-8 col-xs-7">
                                                    <p class="form-control-static">{{$tutor->mothers_name}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Parent's Number: </label>

                                                <div class="col-md-7 col-sm-8 col-xs-7">
                                                    <p class="form-control-static">{{$tutor->parents_number}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">National ID: </label>

                                                <div class="col-md-7 col-sm-8 col-xs-7">
                                                    <p class="form-control-static">{{$tutor->nationalId}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Date Of Registration : </label>
                                                <div class="col-md-7 col-sm-8 col-xs-7">
                                                    <p class="form-control-static">{{\Carbon\Carbon::parse($tutor->date_of_registration)->format('d M Y')}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row pb-r">
                                        <div class="col-md-8">

                                            <p class="content_heading">
                                                <label for="" class="left_label"><i class="fa fa-angle-up"></i></label>
                                                Address Details
                                                <i class="right_label fa fa-info-circle"></i>
                                            </p>
                                        </div>

                                        <div class="col-md-4">
                                            <button class="btn edit_btn btn-xs" data-toggle="modal"
                                                    data-target="#editLocation"><i class="fa fa-edit"></i>Edit</button>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Area : </label>
                                                <div class="col-md-7 col-sm-8 col-xs-7">
                                                    <p class="form-control-static">{{$tutor->service_area_name}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Location : </label>

                                                <div class="col-md-7 col-sm-8 col-xs-7">
                                                    <p class="form-control-static">{{$tutor->location_name}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="" class="col-md-3 col-sm-4 col-xs-5 control-label">Permanent Address : </label>
                                                <div class="col-md-9 col-sm-8 col-xs-7">
                                                    <p class="form-control-static">{{$tutor->permanent_address}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row pb-r">
                                        <div class="col-md-8">
                                            <p class="content_heading">
                                                <label for="" class="left_label"><i class="fa fa-angle-up"></i></label>
                                                Preferred Choices
                                                <i class="right_label fa fa-info-circle"></i>
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn edit_btn btn-xs" data-value="bounceIn" data-toggle="modal"
                                                    data-target="#editPreferredChoices"><i class="fa fa-edit"></i>Edit</button>
                                        </div>


                                        @if(isset($tutoring_preference))

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Preferred Medium : </label>
                                                    <div class="col-md-7 col-sm-8 col-xs-7">
                                                        <p class="form-control-static">{{$tutoring_preference->medium_name}} &nbsp</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Preferred Curriculum : </label>
                                                    <div class="col-md-7 col-sm-8 col-xs-7">
                                                        <p class="form-control-static">{{$tutoring_preference->curriculum_name}}  &nbsp</p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Class : </label>
                                                    <div class="col-md-7 col-sm-8 col-xs-7">
                                                        <p class="form-control-static">
                                                        <?php $str=""; ?>
                                                        @foreach($tutoring_class as $tc)
                                                            <?php $str.=" $tc->class_name,";?>
                                                        @endforeach
                                                            <b>{{ rtrim($str,',') }}</b>
                                                            &nbsp
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Subject : </label>
                                                    <div class="col-md-7 col-sm-8 col-xs-7">
                                                        <p class="form-control-static">
                                                            <?php $str=""; ?>
                                                            @foreach($tutoring_subject as $ts)
                                                                <?php $str.=" $ts->subject_name,";?>
                                                            @endforeach
                                                            <b>{{ rtrim($str,',') }}</b>
                                                            &nbsp
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Preferred Location : </label>
                                                    <div class="col-md-7 col-sm-8 col-xs-7">
                                                        <p class="form-control-static">
                                                            <?php $str=""; ?>
                                                            @foreach($tutoring_location as $ta)
                                                                <?php $str.=" $ta->location_name,";?>
                                                            @endforeach
                                                            <b>{{ rtrim($str,',') }}</b>
                                                            &nbsp
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif

                                    </div>



                                    <div class="row pb-r">
                                        <div class="col-md-8">
                                            <p class="content_heading">
                                                <label for="" class="left_label"><i class="fa fa-angle-up"></i></label>
                                                Availability / Salary
                                                <i class="right_label fa fa-info-circle"></i>
                                            </p>
                                        </div>

                                        <div class="col-md-4">
                                            <button class="btn edit_btn btn-xs" data-toggle="modal"
                                                    data-target="#editAvailability"><i class="fa fa-edit"></i>Edit</button>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Salary (Minimum) : </label>
                                                <div class="col-md-7 col-sm-8 col-xs-7">
                                                    <p class="form-control-static">{{$tutor->minimum_salary}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Days Per Week : </label>
                                                <div class="col-md-7 col-sm-8 col-xs-7">
                                                    <p class="form-control-static">{{$tutor->number_days_week}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Available Days : </label>
                                                <div class="col-md-7 col-sm-8 col-xs-7">
                                                    <p class="form-control-static">
                                                        <?php $str=""; ?>
                                                        @foreach($days as $d)
                                                            @if($d->day_id==1) <?php $str.=" Sunday,"; ?> @endif
                                                            @if($d->day_id==2) <?php $str.=" Monday,"; ?>  @endif
                                                            @if($d->day_id==3) <?php $str.=" Tuesday,"; ?>  @endif
                                                            @if($d->day_id==4) <?php $str.=" Wednesday,"; ?> @endif
                                                            @if($d->day_id==5) <?php $str.=" Thursday,"; ?> @endif
                                                            @if($d->day_id==6) <?php $str.=" Friday,"; ?>  @endif
                                                            @if($d->day_id==7) <?php $str.=" Saturday,"; ?>  @endif
                                                        @endforeach
                                                        <b>{{ rtrim($str,',') }}</b>
                                                        &nbsp
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Time : </label>
                                                <div class="col-md-7 col-sm-8 col-xs-7">
                                                    <p class="form-control-static">
                                                        <?php $str=""; ?>
                                                        @foreach($time as $t)
                                                            @if($t->time_id==1) <?php $str.=" Anytime,"; ?>  @endif
                                                            @if($t->time_id==2) <?php $str.=" Morning,"; ?> @endif
                                                            @if($t->time_id==3) <?php $str.=" Noon,"; ?> @endif
                                                            @if($t->time_id==4) <?php $str.=" Evening,"; ?> @endif
                                                        @endforeach
                                                        <b>{{ rtrim($str,',') }}</b>
                                                        &nbsp
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row pb-r">
                                        <div class="col-md-12">
                                            <p class="content_heading">
                                                <label for="" class="left_label"><i class="fa fa-angle-up"></i></label>
                                                Additional Information
                                                <a href="#" title="edit" class="right_label" data-toggle="modal"
                                                   data-target="#myModal-1"><i class="fa fa-edit"></i></a>
                                            </p>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Verification Status : </label>
                                                <div class="col-md-7 col-sm-8 col-xs-7">
                                                    <p class="form-control-static">
                                                        @if($tutor->is_verified==1)
                                                            <span class="text-green">Verified</span>
                                                        @else
                                                            <span class="text-red"> Required Verification </span>

                                                        @endif

                                                        &nbsp</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-5 col-sm-4 col-xs-5 control-label">Verified Date : </label>

                                                <div class="col-md-7 col-sm-8 col-xs-7">
                                                    <p class="form-control-static">
                                                        @if($tutor->verified_on !=null)
                                                            {{\Carbon\Carbon::parse($tutor->verified_on)->format('d M Y')}}
                                                        @endif
                                                    &nbsp
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </form>



                            </div>

                            <!-- second tab -->
                            <div id="tab-messages" class="tab-pane fade in">
                                <div class="row mbl">
                                    <div class="col-lg-6"><span style="margin-left: 15px"></span><input
                                                type="checkbox" /><a href="#" class="btn btn-success btn-sm mlm mrm"><i
                                                    class="fa fa-send-o"></i>&nbsp;
                                            Write Mail</a><a href="#" class="btn btn-white btn-sm"><i class="fa fa-trash-o"></i>&nbsp;
                                            Delete</a></div>
                                    <div class="col-lg-6">
                                        <div class="input-group"><input type="text" class="form-control" /><span
                                                    class="input-group-btn"><button type="button" class="btn btn-white">Search</button></span></div>
                                    </div>
                                </div>

                            </div>

                            <div id="tab-education" class="tab-pane fade in">
                                <div class="row mbl">
                                    {{--<div class="row pb-r">--}}
                                    {{--@foreach($emp_edu as $e)--}}
                                    <div>
                                        <div class="col-md-8">
                                            <p class="content_heading">
                                                <label for="" class="left_label"><i class="fa fa-angle-up"></i></label>
                                                School/College Information:
                                                <i class="right_label fa fa-info-circle"></i>
                                            </p>
                                        </div>

                                        <div class="col-md-4">
                                            <a href="#" class="btn edit_btn btn-sm" data-toggle="modal"
                                               data-target="#editEducationInfo"><i class="fa fa-edit"></i>Edit</a>
                                        </div>

                                        <div class="col-md-12 bottom-padding-12">
                                            <div class="form-group">
                                                <label for="" class="text-center col-md-3 col-sm-3 col-xs-4 control-label">School/College: </label>

                                                <div class="col-md-9 col-sm-9 col-xs-8">
                                                    <p class="form-control-static">{{$tutor->institute_name}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 bottom-padding-12">
                                            <div class="form-group">
                                                <label for="" class="text-center col-md-3 col-sm-3 col-xs-4 control-label">Medium: </label>

                                                <div class="col-md-9 col-sm-9 col-xs-8">
                                                    <p class="form-control-static">{{$tutor->medium_name}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 bottom-padding-12">
                                            <div class="form-group">
                                                <label for="" class="text-center col-md-3 col-sm-3 col-xs-4 control-label">Curriculum: </label>

                                                <div class="col-md-9 col-sm-9 col-xs-8">
                                                    <p class="form-control-static">{{$tutor->curriculum_name}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 bottom-padding-12">
                                            <div class="form-group">
                                                <label for="" class="text-center col-md-3 col-sm-3 col-xs-4 control-label">SSC/ O level Result: </label>

                                                <div class="col-md-9 col-sm-9 col-xs-8">
                                                    <p class="form-control-static">{{$tutor->ssc_result}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 bottom-padding-12">
                                            <div class="form-group">
                                                <label for="" class="text-center col-md-3 col-sm-3 col-xs-4 control-label">HSC/ A level Result: </label>

                                                <div class="col-md-9 col-sm-9 col-xs-8">
                                                    <p class="form-control-static">{{$tutor->hsc_result}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 bottom-padding-12"></div>

                                    </div>

                                    <div>
                                        <div class="col-md-8">
                                            <p class="content_heading">
                                                <label for="" class="left_label"><i class="fa fa-angle-up"></i></label>
                                                University Information:
                                                <i class="right_label fa fa-info-circle"></i>
                                            </p>
                                        </div>

                                        <div class="col-md-12 bottom-padding-12">
                                            <div class="form-group">
                                                <label for="" class="text-center col-md-3 col-sm-3 col-xs-4 control-label">University: </label>

                                                <div class="col-md-9 col-sm-9 col-xs-8">
                                                    <p class="form-control-static">{{$tutor->university_name}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 bottom-padding-12">
                                            <div class="form-group">
                                                <label for="" class="text-center col-md-3 col-sm-3 col-xs-4 control-label">Department: </label>

                                                <div class="col-md-9 col-sm-9 col-xs-8">
                                                    <p class="form-control-static">{{$tutor->department_name}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 bottom-padding-12">
                                            <div class="form-group">
                                                <label for="" class="text-center col-md-3 col-sm-3 col-xs-4 control-label">Semester/Year: </label>

                                                <div class="col-md-9 col-sm-9 col-xs-8">
                                                    <p class="form-control-static">{{$tutor->semester_year_name}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12 bottom-padding-12">
                                            <div class="form-group">
                                                <label for="" class="text-center col-md-3 col-sm-3 col-xs-4 control-label">University ID : </label>
                                                <div class="col-md-9 col-sm-9 col-xs-8">
                                                    <p class="form-control-static">{{$tutor->university_student_id}} &nbsp</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 bottom-padding-12"></div>

                                    </div>
                                    {{--@endforeach--}}

                                    @if($tutor->medium_id==1)

                                        <div>
                                            <div class="col-md-8 col-sm-12 col-xs-12">
                                                <p class="content_heading">
                                                    <label for="" class="left_label"><i class="fa fa-angle-up"></i></label>
                                                    O Level (Subject Wise):
                                                    <i class="right_label fa fa-info-circle"></i>
                                                </p>
                                            </div>


                                            <div class="col-md-6 bottom-padding-12">
                                                <div class="form-group">
                                                    <p class="text-center form-control-static col-md-4 col-sm-4 col-xs-5 control-label">Subject </p>
                                                    <p class="text-center form-control-static col-md-4 col-sm-4 col-xs-4 control-label">Result </p>
                                                    <p class="text-center form-control-static col-md-4 col-sm-4 col-xs-3 control-label">Action </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 bottom-padding-12 hidden-xs">
                                                <div class="form-group">
                                                    <p class="text-center form-control-static col-md-4 col-sm-4 col-xs-5 control-label">Subject </p>
                                                    <p class="text-center form-control-static col-md-4 col-sm-4 col-xs-4 control-label">Result </p>
                                                    <p class="text-center form-control-static col-md-4 col-sm-4 col-xs-3 control-label">Action </p>
                                                </div>
                                            </div>
                                            <div class="subject-result-o">
                                                @foreach($tutoro_subject_result as $to)
                                                    <div class="col-md-6 col-xs-12 bottom-padding-12 OID-{{$to->id}}">
                                                        <div class="form-group">
                                                            <label for="" class="text-center col-md-4 col-sm-4 col-xs-5 control-label">{{$to->subject_name}} : </label>
                                                            <div class="col-md-5 col-sm-5 col-xs-5">
                                                                <p class="text-center">{{ $to->grade_point_name }} &nbsp</p>

                                                            </div>
                                                            <div class="col-md-3 col-sm-2 col-xs-2">
                                                                <p class="text-center"><a class="o_delete" href="{{route('o_subject_result.delete',base64_encode($to->id))}}"><i class="fa fa-trash-o" aria-hidden="true" style="color:red"></i></a> &nbsp</p>

                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>

                                        <div  class="col-md-12">
                                            <div style="width: 25%; margin: 0 auto">
                                                <a href="#" style="margin-top: 30px; text-align: center;" data-toggle="modal"
                                                   data-target="#addSubjectO" class="btn btn-green"> Add Subject (O level) <i class="fa fa-plus-circle"></i> </a>

                                            </div>

                                        </div>





                                        <div>
                                            <div class="col-md-8 col-sm-12">
                                                <p class="content_heading">
                                                    <label for="" class="left_label"><i class="fa fa-angle-up"></i></label>
                                                    A Level (Subject Wise):
                                                    <i class="right_label fa fa-info-circle"></i>
                                                </p>
                                            </div>


                                            <div class="col-md-6 col-sm-12 bottom-padding-12">
                                                <div class="form-group">
                                                    <p class="text-center form-control-static col-md-4 col-sm-4 col-xs-5 control-label">Subject </p>
                                                    <p class="text-center form-control-static col-md-4 col-sm-4 col-xs-4 control-label">Result </p>
                                                    <p class="text-center form-control-static col-md-4 col-sm-4 col-xs-3 control-label">Action </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 hidden-xs bottom-padding-12">
                                                <div class="form-group">
                                                    <p for="" class="text-center form-control-static col-md-4 col-sm-4 col-xs-5 control-label">Subject </p>
                                                    <p for="" class="text-center form-control-static col-md-4 col-sm-4 col-xs-4 control-label">Result </p>
                                                    <p for="" class="text-center form-control-static col-md-4 col-sm-4 col-xs-3 control-label">Action </p>
                                                </div>
                                            </div>
                                            <div class="subject-result-a">
                                                @foreach($tutora_subject_result as $ta)
                                                    <div class="col-md-6 bottom-padding-12 ID-{{$ta->id}}">
                                                        <div class="form-group">
                                                            <label for="" class="text-center col-md-4 col-sm-4 col-xs-5 control-label">{{$ta->subject_name}} : </label>
                                                            <div class="col-md-5 col-sm-5 col-xs-5">
                                                                <p class="text-center">{{ $ta->grade_point_name }} &nbsp</p>

                                                            </div>
                                                            <div class="col-md-3 col-sm-3 col-xs-2">
                                                                <p class="text-center"><a class="a_delete" href="{{route('a_subject_result.delete',base64_encode($ta->id))}}"><i class="fa fa-trash-o" aria-hidden="true" style="color:red"></i></a> &nbsp</p>

                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>

                                        <div  class="col-md-12">
                                            <div style="width: 25%; margin: 0 auto">
                                                <a href="#" style="margin-top: 30px; text-align: center;" data-toggle="modal"
                                                   data-target="#addSubjectA" class="btn btn-green"> Add Subject (A level) <i class="fa fa-plus-circle"></i> </a>

                                            </div>

                                        </div>



                                    @else

                                        <div>
                                            <div class="col-md-10">
                                                <p class="content_heading">
                                                    <label for="" class="left_label"><i class="fa fa-angle-up"></i></label>
                                                    HSC Result (Subject Wise):
                                                    <i class="right_label fa fa-info-circle"></i>
                                                </p>
                                            </div>

                                            <div class="col-md-6 col-sm-12 col-xs-12 bottom-padding-12">
                                                <div class="form-group">
                                                    <p class="text-center form-control-static col-md-4 col-sm-4 col-xs-5 control-label">Subject </p>
                                                    <p class="text-center form-control-static col-md-5 col-sm-5 col-xs-4 control-label">Result </p>
                                                    <p class="text-center form-control-static col-md-3 col-sm-3 col-xs-3 control-label">Action </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 bottom-padding-12">
                                                <div class="form-group">
                                                    <p for="" class="text-center form-control-static col-md-4 col-sm-4 col-xs-5 control-label">Subject </p>
                                                    <p for="" class="text-center form-control-static col-md-5 col-sm-5 col-xs-5 control-label">Result </p>
                                                    <p class="text-center form-control-static col-md-3 col-sm-3 col-xs-3 control-label">Action </p>
                                                </div>
                                            </div>
                                            <div class="subject-result">
                                                @foreach($tutor_hsc_subject_result as $thsc)
                                                    <div class="col-md-6 col-sm-12 bottom-padding-12 ID-{{$thsc->id}}">
                                                        <div class="form-group">
                                                            <label for="" class="text-center col-md-4 col-sm-4 col-xs-6 control-label">{{$thsc->subject_name}} : </label>
                                                            <div class="col-md-5 col-sm-5 col-xs-4">
                                                                <p class="text-center">{{ $thsc->grade_point_name }} &nbsp</p>

                                                            </div>
                                                            <div class="col-md-3 col-sm-3 col-xs-2">
                                                                <p class="text-center"><a class="hsc_delete" href="{{route('hsc_subject_result.delete',base64_encode($thsc->id))}}"><i class="fa fa-trash-o" aria-hidden="true" style="color:red"></i></a> &nbsp</p>

                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>

                                        <div  class="col-md-12">
                                            <div style="width: 25%; margin: 0 auto">
                                                <a href="#" style="margin-top: 30px; text-align: center;" data-toggle="modal"
                                                   data-target="#addResult" class="btn btn-green"> Add Subject (HSC) <i class="fa fa-plus-circle"></i> </a>

                                            </div>

                                        </div>

                                    @endif

                                </div>

                            </div>


                            <div id="tab-nominee" class="tab-pane fade in">
                                <div class="row mbl">
                                        @if (count($tutor_attachment)>0)
                                        <div class="panel panel-default" style="margin-left: 10px;">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                                
                                                            Credentials List
                                                                
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                
                                                <div class="panel-body">
                                                    <table id="example" class="table table-hover table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Title</th>
                                                            <th class="text-center">Attachment</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($tutor_attachment as $key=>$attachment)
                                                            <tr>
                                                                <td>{{$attachment->title}}</td>
                                                                <td  class="text-center">
                                                                   <a href="{{asset("Tutor_Credentials/".$attachment->attachment)}}"> Open        <i class="fa fa-download center" aria-hidden="true"></i></a>
                                                                </td>
                                                                
                                                                <td>
                                                                    <a href="{{route('tutor.delete_credentials',$attachment->id)}}" onclick="return confirm('are you sure?')" ><button type="button" class="btn btn-sm btn-red" data-toggle="tooltip" data-placement="top" title="Make Active"><i class="fa fa-trash-o"></i></button></a>
                                                                </td>
                                                                
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> 
                                        @endif
                                               
                                       
                                        
                                    <div  class="col-md-12">
                                        <div style="width: 25%; margin: 0 auto">
                                            <a href="#" style="margin-top: 30px; text-align: center;" data-toggle="modal"
                                               data-target="#add_credentials" class="btn btn-green"> Add Credentials <i class="fa fa-plus-circle"></i> </a>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>


            </div>


        </div>

    </div>
    <!--END CONTENT-->



    <!-- Modal -->

    @include('tutor.modal.edit_location')

    @include('tutor.modal.add_result')

    @include('tutor.modal.add_subject_o')

    @include('tutor.modal.add_subject_a')

    @include('tutor.modal.edit_personal_info')

    @include('tutor.modal.edit_preferred_choices')

    @include('tutor.modal.edit_availibility')

    @include('tutor.modal.edit_education_info')

    @include('tutor.modal.edit_account_status')

    @include('tutor.modal.edit_password')

    @include('tutor.modal.edit_image')
    
    @include('tutor.modal.add_credentials')

    <!-- End Modal -->



@endsection


@section('extra_js')
    {{ Html::script('assets/js/sweetalert.min.js') }}
    <script>

        $(window).load(function(){
            $('[data-toggle="tooltip"]').tooltip();
            var url = window.location;
            $('ul.nav li').removeClass('active');
            $('ul.nav li:first-child').addClass('active');
            $('ul.nav a[href="'+ url +'"]').parents('li').addClass('active');
        });
    </script>
    <script>

        $( document ).ready(function() {

            $('#class_id_section').select2();

            $('#subject_id_section').select2();

            $('#preferred_location_id').select2({
                maximumSelectionLength: 3
            });

            $('#preferred_service_area_id').on('change',function () {
                var val=this.value;
                var url="{{route('service_area.get_location')}}";
                url=url+"/?id="+val;
                // alert(url);
                $.ajax({
                    url:url,
                    method:"get",
                    success:function (response) {
                        $('#preferred_location_id').html(response);
                    }
                });
            });

            $('#preferred_medium_id').on('change',function () {
                var val=this.value;
                var url="{{route('ajax.get_preferred_curriculum')}}";
                url=url+"/?id="+val;
                // alert(url);
                $.ajax({
                    url:url,
                    method:"get",
                    success:function (response) {
                        $('#preferred_curriculum_section').html(response);
                    }
                });
            });

            $('#service_area').on('change',function () {
                var val=this.value;
                var url="{{route('service_area.get_location')}}";
                url=url+"/?id="+val;
                $.ajax({
                    url:url,
                    method:"get",
                    success:function (response) {
                        $('#location_id').html(response);
                    }
                });
            });

            $('.medium_id').on('change',function () {
                var val=this.value;
                var url="{{route('ajax.get_curriculum')}}";
                url=url+"/?id="+val;
                // alert(url);
                $.ajax({
                    url:url,
                    method:"get",
                    success:function (response) {
                        $('.curriculum_section').html(response);
                    }
                });
            });

            $('.subject-result').on('click','.hsc_delete',function (event) {
                event.preventDefault();
                var url=$(this).attr('href');
                var method="delete";

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url:url,
                                method:method,
                                data:{
                                    "_token": "{{ csrf_token() }}",
                                },
                                success: function (response) {
                                    $('.ID-'+response).remove();
                                    swal("Poof! Subject record has been deleted!", {
                                        icon: "success",
                                    });

                                },
                                error:function () {
                                    alert('failed');

                                }
                            });

                        }
                    });


            });

            $('.subject-result-a').on('click','.a_delete',function (event) {
                event.preventDefault();
                var url=$(this).attr('href');
                var method="delete";

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url:url,
                                method:method,
                                data:{
                                    "_token": "{{ csrf_token() }}",
                                },
                                success: function (response) {
                                    $('.ID-'+response).remove();
                                    swal("Poof! Subject record has been deleted!", {
                                        icon: "success",
                                    });

                                },
                                error:function () {
                                    alert('failed');

                                }
                            });

                        }
                    });


            });

            $('.subject-result-o').on('click','.o_delete',function (event) {
                event.preventDefault();
                var url=$(this).attr('href');
                var method="delete";

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url:url,
                                method:method,
                                data:{
                                    "_token": "{{ csrf_token() }}",
                                },
                                success: function (response) {
                                    $('.OID-'+response).remove();
                                    swal("Poof! Subject record has been deleted!", {
                                        icon: "success",
                                    });

                                },
                                error:function () {
                                    alert('failed');

                                }
                            });

                        }
                    });


            });


            $('.btn-save').click(function (event) {

                event.preventDefault();
                var form=$('#store_hsc');
                $.ajax({
                    url:"{{route('tutor_subject_result.store_hsc')}}",
                    method:'post',
                    data:form.serialize(),
                    success:function (response) {
                        if(response==="duplicate"){
                            swal("Insertion Failed!", "The subject is already added!", "warning");
                        }
                        else {
                            $('.subject-result').append(response);
                            swal('Subject Added Successfully!', "with result", 'success');
                        }

                    }
                });
                $('#addResult').modal('toggle');


            });

            $('#save-btn-a').click(function (event) {
                // alert('work');
                event.preventDefault();
                var form=$('#store_a_level');
                $.ajax({
                    url:"{{route('tutor_subject_result.store_a_level')}}",
                    method:'post',
                    data:form.serialize(),
                    success:function (response) {
                        if(response==="duplicate"){
                            swal("Insertion Failed!", "The subject is already added!", "warning");
                        }
                        else {
                            $('.subject-result-a').append(response);
                            swal('Subject Added Successfully!', "with result", 'success');
                        }

                    }
                });
                $('#addSubjectA').modal('toggle');


            });

            $('#save-btn-o').click(function (event) {
                event.preventDefault();
                var form=$('#store_o_level');
                $.ajax({
                    url:"{{route('tutor_subject_result.store_o_level')}}",
                    method:'post',
                    data:form.serialize(),
                    success:function (response) {
                        if(response==="duplicate"){
                            swal("Insertion Failed!", "The subject is already added!", "warning");
                        }
                        else {
                            $('.subject-result-o').append(response);
                            swal('Subject Added Successfully!', "with result", 'success');
                        }

                    }
                });
                $('#addSubjectO').modal('toggle');


            });

            $('.edit_hsc_result_btn').click(function (event) {
                event.preventDefault();
                $('#edit-hsc-modal').modal();
                // alert('kk');

            });



            $('#service_area').on('change',function () {
                var val=this.value;
                var url="{{route('service_area.get_location')}}";
                url=url+"/?id="+val;
                // alert(url);
                $.ajax({
                    url:url,
                    method:"get",
                    success:function (response) {
                        $('#location_id').html(response);
                    }
                });
            });

            $('.edit_education_btn').click(function (event) {
                event.preventDefault();
                let url=$(this).attr('href');
                let method="get";
                $.ajax({
                    url:url,
                    method:method,
                    success:function (response) {
                        $('#education-edit-form').html(response);

                    }

                });
                $('#editEmployeeEducation').modal();

            });


            $('.edit_nominee_btn').click(function (event) {
                event.preventDefault();
                let url=$(this).attr('href');
                // alert(url);
                let method="get";
                $.ajax({
                    url:url,
                    method:method,
                    success:function (response) {
                        $('#nominee-edit-form').html(response);

                    }

                });
                $('#editNominee').modal();

            });

            $('.combobox').select2();



            setTimeout(function() {
                $('#alert_message').fadeOut('fast');
            }, 5000);
        });
    </script>



@endsection