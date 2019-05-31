@extends('layouts.master')
@section('title', 'Pending Job List')
@section('content')
    <style>
        .form-group{
            padding-bottom: 12px;
        }
        
    </style>
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Pending Job List</div>
        </div>
        
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">Job</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Pending Job list</li>
        </ol>
        
        {{--  <div class="breadcrumb page-breadcrumb text-center" style="margin-right: 10px;">
            <input type="text">
            <button><i class="fa fa-search" style="color: red;"></i></button>
            <button><i class="fa fa-arrow-down" style="color: aqua;"></i></button>
        </div>  --}}
        
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE-->
    
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
        
        .jumbotron.brighten{
            padding: 20px;
        }
        .brighten {
            -webkit-filter: brightness(100%);
            -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            -o-transition: all 1s ease;
            -ms-transition: all 1s ease;
            transition: all 1s ease;
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.05);
            background: #fff;

        }

        .brighten:hover {
            -webkit-filter: brightness(100%);
            box-shadow:
                1px 1px #53a7ea,
                2px 2px #53a7ea,
                    3px 3px #53a7ea;
            -webkit-transform: translateX(-3px);
            transform: translateX(-3px);
        }

        h4 {
            color: #222;
            font-family: "Poppins",sans-serif;
            text-transform: capitalize;
            font-size: 19px;
            font-weight: 600;
        }

        h5 {
            color: #777;
            font-family: "Open Sans",sans-serif;
            text-transform: capitalize;
            font-size: 15px;
            font-weight: 400;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .mt-4{
            margin-top: 1.5rem!important;
        }

        .mb-3{
            margin-bottom: 1rem!important;
        }

        .third-btn {
            color: #fff !important;
            background: #ff9902;
            font-family: "Open Sans",sans-serif;
            text-transform: uppercase;
            font-size: 14px;
            font-weight: 600;
            display: inline-block;
            padding: 10px 24px !important;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -ms-border-radius: 3px;
            -o-border-radius: 3px;
            border-radius: 3px;
            -webkit-transition: all .5s;
            -moz-transition: all .5s;
            -o-transition: all .5s;
            transition: all 0.5s;
        }
        
            
    </style>

        <div class="row">
            @if (count($jobs_post)>0)
            @foreach ($jobs_post as $post)
            <div class="col-md-10 col-md-offset-1 jumbotron brighten ">
                    <div class="col-md-5">
                        <h4><b>Need a tutor for </b>{{$post->class_name}} </h4>
                        <h6><b class="text-blue">Curriculum: </b>{{$post->curriculum_name}}</h6>
                        <h6><b class="text-blue pull-right"></b><span class="pull-right text-muted small">Job Posted {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span></h6>
                            <ul class="mt-4">
                                    <li class="mb-3"><h5><i class="fa fa-tag" aria-hidden="true" style="color: black;"></i>{{$post->days_per_week}} days per week</h5></li>
                                <li class="mb-3"><h5><i class="fa fa-file" style="color: goldenrod;"></i> Subject:
                                    <?php $str=""; ?>
                                    @foreach ($sub as $s)
                                        @if ($post->id == $s['job_post_id'])

                                        <?php 
                                        $subjects = $s['subject_name'];
                                        $str.=" $subjects,"; 
                                        ?>
                                        @endif
                                    
                                    @endforeach
                                {{ rtrim($str,',') }}
                                </h5></li>
                                <li class="mb-3"><h5><i class="fa fa-map-marker" style="color: aqua;"></i> {{$post->location_name}}</h5></li>
                                <li><h5><i class="fa fa-clock-o" style="color: red;"></i> Joining Date: {{ date("F j, Y",strtotime($post->joining_date))}}</h5></li>
                            </ul>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center">
                                <h2 class="text-blue">Salary</h2>
                                <h2><b class="text-black">{{$post->salary}} tk</b></h2>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        
                        <a href="{{route('job.approve', base64_encode($post->id))}}" class="btn btn-blue" style="margin-top: 50px;" data-toggle="tooltip" data-placement="top" title="Approve Job"><i class="fa fa-check" aria-hidden="true"></i> </a>
                        <a href="{{route('job.edit', base64_encode($post->id))}}" class="btn btn-orange" target="_blank" style="margin-top: 50px;"  data-toggle="tooltip" data-placement="top" title="Edit Job"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                        <a href="{{route('job.reject', base64_encode($post->id))}}" class="btn btn-red" onclick="return confirm('are you sure to Reject?')" target="_blank" style="margin-top: 50px;" data-toggle="tooltip" data-placement="top" title="Reject Job"><i  class="fa fa-ban" aria-hidden="true"></i> </a>
                        
                    </div>
                </div>
            @endforeach
            @else
            <h1 class="text-danger text-center">No Job Available</h1>
            @endif
           
        </div>
        <div class="text-center">
            {{ $jobs_post->links() }}
        </div>
    </div>
@endsection
@section('extra_js')
    <script>
        $(document).ready(function () {
            
            
            $("#alert_message").fadeTo(1000, 500).slideUp(500, function(){
                $("#alert_message").alert('close');
            });

        });
    </script>
@endsection