@extends('layouts.master')
@section('title', 'Edit Job Details')
@section('content')

    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Edit Job Details</div>
        </div>
        
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">Job</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Edit Job Details</li>
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
                        <div class="col-md-12">
                                <h2>Tution For {{$job_post->class_name}}
                                        <a href="#" class="btn btn-orange btn-xs pull-right" data-toggle="modal"
                                        data-target="#editJobInfo" ><i class="fa fa-edit"></i>Edit</a>
                                </h2>
                        </div>
                        
                        <div class="col-md-6">

                            <div class="panel panel-blue">
                                <div class="panel-heading">PERSONAL DETAILS</div>
                                <div class="panel-body">
                                        <ul class="job-details-heading-ul">
                                            <li> <h5><b>Full Name : </b>{{$job_post->users_name}}</h5></li>
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
                                            <li><h5><b>Class : </b>{{$job_post->class_name}}</h5></li>
                                            <li> <h5> <b>Medium :</b> {{$job_post->medium_name}}</h5></li>
                                            <li><h5> <b>Carriculum :  </b>{{$job_post->curriculum_name}}</h5></li>
                                            <li> <h5><b>Days per week : </b>{{$job_post->days_per_week}}</h5></li>
                                            <li> <h5><b>Can Travel : </b>
                                                @if ($job_post->can_travel == 1)
                                                    Yes
                                                @elseif ($job_post->can_travel == 0)
                                                    No
                                                @endif
                                            </h5></li>
                                            <li><h5><b>Salary : </b>{{$job_post->salary}} Tk</h5></li>
                                            <li><h5><b>Location :</b> {{$job_post->location_name}}</h5></li>
                                            <li><h5><b>Location Details :</b>{{$job_post->location_details}}</h5></li>
            
            
            
                                        </ul>
                                </div>

                            </div>
                            


                        </div>
                        <div class="col-md-6">
                                <div class="panel panel-blue">
                                    <div class="panel-heading">PREFERENCE DETAILS</div>
                                    <div class="panel-body">
                                            <ul class="job-details-heading-ul">
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
                                                <li><h5><b>Tutoring Day : </b>
                                                    <?php $str=""; ?>
                                                    @foreach($days as $d)
                                                        @if($d->day==1) <?php $str.=" Sunday,"; ?> @endif
                                                        @if($d->day==2) <?php $str.=" Monday,"; ?>  @endif
                                                        @if($d->day==3) <?php $str.=" Tuesday,"; ?>  @endif
                                                        @if($d->day==4) <?php $str.=" Wednesday,"; ?> @endif
                                                        @if($d->day==5) <?php $str.=" Thursday,"; ?> @endif
                                                        @if($d->day==6) <?php $str.=" Friday,"; ?>  @endif
                                                        @if($d->day==7) <?php $str.=" Saturday,"; ?>  @endif
                                                    @endforeach
                                                    {{ rtrim($str,',') }}</b>
                                                </h5></li>
                                                <li><h5><b>Tutoring Time :</b> 
                                                    <?php $str=""; ?>
                                                    @foreach ($time as $t)
                                                    @if ($job_post->id == $t->job_post_id)
                
                                                    @if($t->time_id==1) <?php $str.=" Anytime,"; ?> @endif
                                                    @if($t->time_id==2) <?php $str.=" Morning,"; ?> @endif
                                                    @if($t->time_id==3) <?php $str.=" Noon,"; ?> @endif
                                                    @if($t->time_id==4) <?php $str.=" Evening,"; ?> @endif
                
                                                    @endif
                                                    @endforeach
                                                    {{ rtrim($str,',') }}
                                                </h5></li>
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
                                                <li><h5><b>Joining Date : </b>
                                                    @if ($job_post->joining_date != null)
                                                    {{ date("F j, Y",strtotime($job_post->joining_date))}}
                                                    @endif
                                                </h5></li>
                                                <li><h5><b>Posted on : </b>{{ date("F j, Y",strtotime($job_post->created_at))}}</h5></li>
                                                
                
                                            </ul>     
                                    </div>
    
                                </div>
                           
                        </div>

                    </div>
                </div>
            </div>

        </div>
{{--  MODALS START --}}
 
 @include('job.modal.edit_job_info')
 
{{--  MODALS END --}}

</div>
@endsection
@section('extra_js')
    <script>
        $(document).ready(function () {

            //get curriculum
            $('#medium_id').on('change',function () {
                var val=this.value;
                var url="{{route('ajax.get_curriculum')}}";
                url=url+"/?id="+val;
                // alert(url);
                $.ajax({
                    url:url,
                    method:"get",
                    success:function (response) {
                        $('#curriculum_id').html(response);
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