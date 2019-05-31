@extends('layouts.master')
@section('title', 'Confirmed Job Detais')
@section('content')
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Confirmed Job Detais</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">Job</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Confirmed Job Detais</li>
        </ol>
        <div class="clearfix"></div>
    </div>
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
        
        <style>
                ul {
                    list-style-type: none;
                  }
                ul li{
                    margin-bottom: 15px;
                }

               h5{
                    font-size: 14px;
                    color: black;
                }
                ul li h5 b{
                    margin-right: 10px;
                }
        </style>
        
        <div class="row">
            <div class="col-md-6">
                    <div class="panel panel-blue">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    <i class="fa fa-graduation-cap" style="font-size: 20px;"> Student</i>
                                </div>
                                
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <tr>
                                    <td><h5><b>Name:</b></h5></td>
                                    <td><h5>
                                            <a href="{{route('student.profile', base64_encode($student->id))}}" target="_blank">{{$student->name}}</a>
                                        </h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h5><b>Phone:</b></h5></td>
                                    <td><h5>{{$student->contact_number}}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5><b>Gender:</b></h5></td>
                                    <td>
                                        <h5>
                                            @if ($student->gender == 1)
                                                Male    
                                            @elseif ($student->gender == 2)
                                                Female
                                            @elseif ($student->gender == 0)
                                                Other
                                            @endif
                                        </h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h5><b>School:</b></h5></td>
                                    <td><h5>{{$student->school}}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5><b>Class:</b></h5></td>
                                    <td><h5>{{$student->class}}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5><b>Medium:</b></h5></td>
                                    <td><h5>{{$student->medium}}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5><b>Location:</b></h5></td>
                                    <td><h5>{{$student->location}}</h5></td>
                                </tr>
                            </table>
                        </div>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="panel panel-blue">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    <i class="fa fa-user" style="font-size: 20px;"> Tutor</i>
                                </div>
                                
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <tr>
                                    <td><h5><b>Name:</b></h5></td>
                                    <td><h5>
                                            <a href="{{route('tutor.show',base64_encode($tutor->id))}}" target="_blank">{{$tutor->name}}</a>
                                        </h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h5><b>Phone:</b></h5></td>
                                    <td><h5>{{$tutor->contact_number}}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5><b>Gender:</b></h5></td>
                                    <td>
                                        <h5>
                                            @if ($tutor->gender == 1)
                                                Male    
                                            @elseif ($tutor->gender == 2)
                                                Female
                                            @elseif ($tutor->gender == 0)
                                                Other
                                            @endif
                                        </h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h5><b>Occupation:</b></h5></td>
                                    <td><h5>{{$tutor->occupation}}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5><b>University:</b></h5></td>
                                    <td><h5>{{$tutor->university}}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5><b>Department:</b></h5></td>
                                    <td><h5>{{$tutor->department}}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5><b>Location:</b></h5></td>
                                    <td><h5>{{$tutor->location}}</h5></td>
                                </tr>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                    <div class="panel panel-blue">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    <i class="fa fa-tasks" style="font-size: 20px;"> Job Details</i>
                                </div>
                                
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Personla Details
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <td><h5><b>Class:</b></h5></td>
                                                        <td><h5>{{$job->class}}</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h5><b>Medium:</b></h5></td>
                                                        <td><h5>{{$job->medium}}</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h5><b>Curriculum:</b></h5></td>
                                                        <td><h5>{{$job->curriculum}}</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h5><b>Days Per Week:</b></h5></td>
                                                        <td><h5>{{$job->days_per_week}}</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h5><b>Salary:</b></h5></td>
                                                        <td><h5>{{$tutor_student_job->salary}}</h5></td>
                                                    </tr>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        Preference Details
                                                        <button class="btn btn-xs btn-orange pull-right" data-toggle="modal" data-target="#edit_Preference_Details"><i class="fa fa-edit"></i> Edit</button>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <td><h5><b>Tutor Rating:</b></h5></td>
                                                        <td><h5>{{$tutor_student_job->tutor_rating}}</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h5><b>Student Rating:</b></h5></td>
                                                        <td><h5>{{$tutor_student_job->student_rating}}</h5></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h5><b>Selection Procedure:</b></h5></td>
                                                        <td>
                                                            <h5>
                                                                @if ($tutor_student_job->selection_method == 1)
                                                                    Assigned By Admin
                                                                @elseif ($tutor_student_job->selection_method == 2)
                                                                    Student Choice
                                                                @elseif ($tutor_student_job->selection_method == 3)
                                                                    Assigned By System
                                                                @endif
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><h5><b>Special Requirement:</b></h5></td>
                                                        <td>
                                                            <h5>{{$job->special_requirement}}</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><h5><b>Joining Date:</b></h5></td>
                                                        <td>
                                                            <h5>
                                                                @if ($job->joining_date != null)
                                                                {{ date("F j, Y",strtotime($job->joining_date))}}
                                                                @endif
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    
                                                </table>
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
    @include('job.modal.edit_preference')
    </div>


@endsection
@section('extra_js')
    <script>
        $(document).ready(function() {
            
            

            $("#alert_message").fadeTo(1000, 500).slideUp(500, function(){
                $("#alert_message").alert('close');
            });

        } );
    </script>
@endsection