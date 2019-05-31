@extends('layouts.master')
@section('title', 'Job List')
@section('content')
    <style>
        .form-group{
            padding-bottom: 12px;
            margin-bottom: 0px;
        }
        .dropdown-menu {
           
            width: 300px !important;
            
        }
    </style>
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

        <div class="text-center" >
            <div class="input-group" id="adv-search">
                <input id="search-box-text" type="text" class="form-control" placeholder="Search for job" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                            <div style="box-shadow: 0 7px 10px  rgba(0, 0, 0, 0.40) !important;" class="dropdown-menu dropdown-menu-right" style="padding: 15px; padding-bottom: 10px;">
                                <form class="form-horizontal"  method="get" action="{{ route('job.search') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="text-black" for="medium_id">Filter By Salary (Preferred)</label>
    
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="salary_start" placeholder="Start"/>
                                            <span class="input-group-addon">-</span>
                                            <input type="number" class="form-control" name="salary_end" placeholder="End"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black" for="medium_id">Filter By Days Per Week (Preferred)</label>
    
                                        <div class="form-group">
                                            <select name="days_per_week" id="days_per_week" class="form-control" name="days_per_week">
                                                <option value="">Select Day Per Week</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black" for="medium_id">Filter By Class (Preferred)</label>
    
                                        <div class="form-group">
                                            <select id="class_id" name="class_id"  class="form-control ">
                                                <option value="">Select Class</option>
                                                @foreach ($class as $c)
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black" for="medium_id">Filter By Service Area(Preferred)</label>
    
                                        <div class="form-group">
                                            <select id="service_area_id" name="service_area_id"  class="form-control ">
                                                <option value="">Select Service Area</option>
                                                @foreach ($service_area as $area)
                                                <option value="{{$area->id}}">{{$area->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black" for="medium_id">Filter By Location (Preferred)</label>
    
                                        <div class="form-group">
                                            <select id="location_id" name="location_id"  class="form-control" style="width: 100%">
                                                <option value="">Select Service Area First</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" style="float: right" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </form>
                                   
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
        </div>
        
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
                        <h4><b>Need a tutor for </b>{{$post->class_name}}</h4>
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
                        
                        <a href="#" class="btn btn-blue"  data-toggle="tooltip" data-placement="top" title="Apply For This Job" style="margin-top: 50px;"><i class="fa fa-check" aria-hidden="true" ></i> Apply</a>
                        <a href="{{route('job.view', base64_encode($post->id))}}" class="btn btn-blue" target="_blank"  data-toggle="tooltip" data-placement="top" title="View Details" style="margin-top: 50px;" ><i class="fa fa-eye" aria-hidden="true"></i> View</a>
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
            
            //get location
            $('#service_area_id').on('change',function () {
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
            

            $('#location_id').select2();

            $("#alert_message").fadeTo(1000, 500).slideUp(500, function(){
                $("#alert_message").alert('close');
            });

        });
    </script>
@endsection