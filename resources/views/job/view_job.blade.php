@extends('layouts.master')
@section('title', 'Job List')
@section('content')
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Job List</div>
        </div>
        
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">Job</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Job list</li>
        </ol>
        
        {{--  <div class="breadcrumb page-breadcrumb text-center" style="margin-right: 10px;">
            <input type="text">
            <button><i class="fa fa-search" style="color: red;"></i></button>
            <button><i class="fa fa-arrow-down" style="color: aqua;"></i></button>
        </div>  --}}


        
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE-->

    <style>
        .ex-padding{
            padding: 30px 30px;
        }
        .job-details-heading{
            padding: 30px;
            background: #fff;
            box-shadow: 0 0 4px 0 rgba(0,0,0,.08), 0 2px 4px 0 rgba(0,0,0,.12);
        }
        .job-details-heading h2{
            font-size: 26px;
            font-weight: bold;
        }
        .job-details-heading-ul{
            margin:0;
            padding: 0;
        }
        .job-details-heading-ul li{
            list-style: none;
            margin-bottom: 15px;
        }
        .job-details-heading-ul li h5{
            font-size: 14px;
        }
        .job-details-heading-ul li h5 b{
            margin-right: 6px;
        }

        .tutor-list-col-heading{
            padding: 10px;
            background: #101010c4;
            color:#fff;
        }
        .tutor-list-col-heading h2{
            margin-top: 0px;
            font-size: 24px;
            font-weight: bold;
        }
        .tutor-list-col-body{
            padding: 20px;
            background: #fff;
            border-bottom: 2px solid #ccc;
        }
        .tutor-list-col-img{
            width:100px;
            height:100px;

        }
        .tutor-list-col-img img{
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .tutor-list-col-img h5{
            text-align:center;
        }

        .tutor-list-col-img h5{

        }
        .mb_2{
            margin-bottom: 15px;
        }
        .tutor-list-full-body{

            background: #fff;
            box-shadow: 0 0 4px 0 rgba(0,0,0,.08), 0 2px 4px 0 rgba(0,0,0,.12);
        }
        .tutor-list-col-body:hover{
            background: #ececec;
            box-shadow: 0 0 4px 0 rgba(0,0,0,.08), 0 2px 4px 0 rgba(0,0,0,.12);


        }
        .tutor-form-select{
            background: #fff;
            padding-top: 20px;
            padding-bottom: 20px;
            box-shadow: 0 0px 5px rgba(0,0,0,.5);
            margin-bottom: 10px;

        }
        .form_tutor_find{}
        .form_tutor_find .form-group .form-control{
            border: 2px solid #ccc;
            border-radius: 5px !important;
        }
        .form_tutor_find .form-group label{
            font-size: 15px;
            color: #000;
        }
        .p_r_0{
            padding-right: 6px;
        }
        .m_0_a{

        }
        .m_0_a .form-group{
            margin: 0 auto;
            text-align: center;
        }
        .form_tutor_find .form-group button{
            width: 190px;
            margin-top: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }

        @media(max-width:767px){
            .ex-padding{
                padding: 20px 10px;
            }
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

        <div class="job-details">
            <div class="row ex-padding">
                <div class="col-md-12  job-details-heading">
                    <div class="job-details-heading-left">
                        {{-- <h4>Tuition ID # <span>4102019072628</span></h4> --}}
                        <h2>Tution For {{$job_post->class_name}}</h2>
                        
                        <div class="col-md-6">


                            <ul class="job-details-heading-ul">
                                <li> <h5> <b>Medium :</b> {{$job_post->medium_name}}</h5></li>
                                <li><h5> <b>Carriculum :  </b>{{$job_post->curriculum_name}}</h5></li>
                                <li> <h5><b>Full Name : </b>{{$job_post->users_name}}</h5></li>
                                <li><h5><b>Class : </b>{{$job_post->class_name}}</h5></li>
                                <li> <h5><b>Student Gender : </b>
                                    @if ($job_post->student_gender == 1)
                                        Male
                                    @elseif ($job_post->student_gender == 2)
                                        Female
                                    @elseif ($job_post->student_gender == 0)
                                        Other
                                    @else
                                        
                                    @endif
                                </h5></li>
                                <li> <h5><b>Days per week : </b>{{$job_post->days_per_week}}</h5></li>

                                <li><h5><b>Tutor gender preference : </b>
                                    
                                    @if ($job_post->preferred_gender == 1)
                                        Male
                                    @elseif ($job_post->preferred_gender == 2)
                                        Female
                                    @elseif ($job_post->preferred_gender == 0)
                                        Other
                                    @else
                                        
                                    @endif
                                </h5></li>
                                <li><h5><b>Tutor special requirement : </b>{{$job_post->special_requirement}}</h5></li>
                                



                            </ul>


                        </div>
                        <div class="col-md-6">
                            <ul class="job-details-heading-ul">
                                <li><h5><b>Subjects : </b>
                                    <?php $str=""; ?>
                                    @foreach ($sub as $s)
                                        @if ($job_post->id == $s['job_post_id'])

                                        <?php 
                                        $subjects = $s['subject_name'];
                                        $str.=" $subjects,"; 
                                        ?>
                                        @endif
                                    
                                    @endforeach
                                {{ rtrim($str,',') }}
                                </h5></li>
                                <li><h5><b>Tutoring Time :</b> </h5></li>
                                <li><h5><b>Location :</b> {{$job_post->location_name}}</h5></li>
                                <li><h5><b>Location Details :</b>{{$job_post->location_details}}</h5></li>
                                <li><h5><b>Tutor School/University preference : </b>
                                    
                                    @isset($job_post->school_name)
                                    {{$job_post->school_name}}
                                    @endisset

                                    @if ($job_post->school_name && $job_post->university_name)
                                        /
                                    @endif
                                    
                                    @isset($job_post->university_name)
                                    {{$job_post->university_name}}
                                    @endisset
                                    
                                    
                                </h5></li>
                                <li><h5><b>Salary : </b>{{$job_post->salary}} Tk</h5></li>
                                <li><h5><b>Posted on : </b>{{ date("F j, Y",strtotime($job_post->created_at))}}</h5></li>
                                <li><h5><b>Joining Date : </b>
                                        @if($job_post->joining_date!=null){{ date("F j, Y",strtotime($job_post->joining_date))}}
                                    </h5>@endif
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>


        {{--        applied Tutors--}}

        <div class="tutor-list">
            <div class="row ex-padding">
                <div class="tutor-list-full-body">
                    <div class="col-md-12 tutor-list-col-heading">
                        <h2>Applied Tutors List</h2>
                        
                    </div>


                    <div class="col-md-12 tutor-form-select">

                            <form class="form_tutor_find" id="advance_search_tutor_form" method="get">
                                {!! Form::hidden('job_post_id',base64_encode($job_post->id),['id'=>'job_post_id']) !!}
                                <div class="row">

                                    <div class="col-md-2 p_r_0">
                                        <div class="form-group">
                                            <label for="">Study</label>
                                            <div class="select_label">
                                                <select class="form-control combobox" name="university_id" id="university_id">
                                                    <option value="">Select University</option>
                                                    @foreach($university as $u)
                                                        <option value="{{$u->id}}">{{$u->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 p_r_0">
                                        <div class="form-group">
                                            <label for="">Medium</label>
                                            <div class="select_label">
                                                <select class="form-control combobox" name="medium_id" id="medium_id" >
                                                    <option value="">Select Medium</option>
                                                    @foreach($medium as $m)
                                                        <option value="{{$m->id}}">{{$m->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 p_r_0">
                                        <div class="form-group">
                                            <label for="">Area</label>
                                            <div class="select_label">
                                                <select class="form-control combobox" name="service_area_id" id="service_area_id" >
                                                    <option value="">Select Area</option>
                                                    @foreach($service_area as $sa)
                                                        <option value="{{$sa->id}}">{{$sa->name}}</option>
                                                    @endforeach
{{--                                                    <option value="3">Chittagong</option>--}}

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 p_r_0">
                                        <div class="form-group">
                                            <label for="">Location</label>
                                            <div class="select_label">
                                                <select class="form-control combobox" name="location_id" id="location_id">
                                                    <option value="">Select Area First</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-2 p_r_0">
                                        <div class="form-group">
                                            <label for="">Gender</label>
                                            <div class="select_label">
                                                <select class="form-control combobox" name="gender" id="gender">
                                                    <option value="">Gender</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                    <option value="3">Other</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 p_r_0">
                                        <div class="form-group">
                                            <label for="">Class</label>
                                            <div class="select_label">
                                                <select class="form-control combobox" name="class_id" id="class_id" >
                                                    <option value="">Select Class</option>
                                                    @foreach($class as $c)
                                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>





                                    <div class="col-md-12 p_r_0 m_0_a">
                                        <div class="form-group">

                                            <button type="submit" id="find-tutor" class="btn btn-blue">Find Tutor</button>
                                        </div>
                                    </div>


                                 </div>
                            </form>



                    </div>
                    <section id="applicant_list">
                        @if(count($applicants)==0)
                            <h3 style="text-align: center; padding-bottom: 15px;">No One Applied Yet!</h3>

                        @endif
                        @foreach($applicants as $a)
                            <?php
                                $sub='';
                                $subjects=\Illuminate\Support\Facades\DB::table('tutoring_subject')
                                    ->leftJoin('subject','tutoring_subject.subject_id','=','subject.id')
                                    ->where('tutor_id','=',$a->tutor_id)
                                    ->get(['subject.name as subject_name']);
                                foreach ($subjects as $s){
                                    $sub.=$s->subject_name.", ";
                                }
                                $sub=rtrim($sub,', ');
                                $tim='';
                                $time=\Illuminate\Support\Facades\DB::table('tutoring_time')
                                    ->where('tutoring_time.tutor_id','=',$a->tutor_id)
                                    ->get();
                                foreach ($time as $t){
                                    if($t->time_id==1){
                                        $tim.="Anytime, ";
                                    }
                                    elseif ($t->time_id==2){
                                        $tim.="Morning, ";
                                    }
                                    elseif ($t->time_id==3){
                                        $tim.="Noon, ";
                                    }
                                    elseif ($t->time_id==4){
                                        $tim.="Evening, ";
                                    }
                                }
                                $tim=rtrim($tim,', ');
                                $tu_lo='';
                                $locations=\Illuminate\Support\Facades\DB::table('tutoring_location')
                                    ->leftJoin('location','tutoring_location.location_id','=','location.id')
                                    ->where('tutoring_location.tutor_id','=',$a->tutor_id)
                                    ->get(['location.name as location_name']);
                                foreach ($locations as $l){
                                    $tu_lo.=$l->location_name.", ";
                                }
                                $tu_lo=rtrim($tu_lo,', ');

                            ?>
                            <div class="col-md-12 tutor-list-col-body">
                            <div class="col-md-4 mb_2">
                                <div class="tutor-list-col-img">
                                    <img class="img-responsive" src="@if($a->image!=null)
                                    {{asset("Tutor_Images/".$a->image)}}
                                    @else
                                    {{asset("Tutor_Images/profile_image.jpeg")}}
                                    @endif" >
                                    <h5><b> {{$a->tutor_name}}</b></h5>

                                </div>



                            </div>
                            <div class="col-md-8 ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="job-details-heading-ul">
                                            <li><h5> Medium: <b>{{$a->medium_name}}</b></h5></li>
                                            <li><h5> Curriculum: <b> {{$a->curriculum_name}}</b></h5></li>
{{--                                            <li><h5><b>Class : </b>Class-10</h5></li>--}}
                                            <li> <h5> Gender :
                                                    @if($a->gender ==1)
                                                        <b>Male</b>
                                                    @elseif($a->gender ==2)
                                                        <b>Female</b>
                                                    @else
                                                        <b>Other</b>
                                                    @endif
                                                </h5></li>

                                            <li> <h5>Days per week : <b>{{$a->number_days_week }} day/days</b> </h5></li>
                                            <li><h5> Subjects : <b>{{$sub}}</b></h5></li>
                                            <li><h5> Tutoring Location : <b>{{$tu_lo}}</b></h5></li>

                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="job-details-heading-ul">


                                            <li><h5>Tutoring Time : <b>{{$tim}}</b></h5></li>
                                            <li><h5>Location :<b>{{$a->location_name}}</b></h5></li>
                                            <li><h5>Applied on : @if($a->created_at!=null)
                                                        <b>{{\Carbon\Carbon::parse($a->created_at)->format('d M Y')}}</b>
                                                     @endif
                                                </h5></li>
                                            <li> <h5>
                                                    <a href="{{route('tutor.show',base64_encode($a->tutor_id))}}" target="_blank" class="btn btn-blue">View Details</a>
                                                    <a href="{{route('job.assign_tutor')}}" id="{{base64_encode($a->id)}}" class="btn btn-blue assign-btn"> <i class="fa fa-check"></i> Assign</a>
                                                </h5>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-md-12">
                            <div class="col-md-5" style="margin: 0 auto;">

                            </div>
                            {{$applicants->links()}}
                        </div>
                    </section>

                </div>


            </div>
        </div>

    </div>
@endsection
@section('extra_js')
    {{ Html::script('assets/js/sweetalert.min.js') }}
    <script>
        $(document).ready(function () {
            $('.assign-btn').click(function (event) {
                event.preventDefault();
                let url=$(this).attr('href');
                let job_apply_id=$(this).attr('id');
                let job_post_id=$("#job_post_id").val();
                swal("Are you sure?", {
                    buttons: {
                        cancel: "No!",
                        catch: {
                            text: "Confirm!",
                            value: "catch",
                        },
                    },
                })
                    .then((value) => {
                        switch (value) {
                            case "catch":
                                $.ajax({
                                    url:url,
                                    method:'post',
                                    data:{
                                        "_token": "{{ csrf_token() }}",
                                        "job_post_id":job_post_id,
                                        "job_apply_id":job_apply_id,
                                    },
                                    success:function (response) {
                                        location.href="{{route('job.list')}}";
                                    },
                                });
                                break;

                            default:
                                swal("No changes made. ");
                        }
                    });

            });
            $('.combobox').select2();

            $('#service_area_id').on('change',function () {
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

            $('#find-tutor').click(function (event) {
                event.preventDefault();
                var url="{{route('job.advance_search_tutor')}}";
                // alert(url);
                $.ajax({
                    url:url,
                    method: 'get',
                    data: $("#advance_search_tutor_form").serialize(),
                    success:function (response) {
                        $("#applicant_list").html(response);


                    }
                });
            });
            
            $('#subject_id').select2({
                placeholder: "Select Subject"  
            });
            
            $('#day').select2({
                placeholder: "Select Day"  
            });
            $('#time').select2({
                placeholder: "Select Time"  
            });
            
            $("#alert_message").fadeTo(1000, 500).slideUp(500, function(){
                $("#alert_message").alert('close');
            });

        });
    </script>
@endsection