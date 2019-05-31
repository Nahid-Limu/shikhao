@extends('layouts.master')
@section('title', 'User Profile')
@section('content')

		<!--BEGIN TITLE & BREADCRUMB PAGE-->
		<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
			<div class="page-header pull-left">
				<div class="page-title">User Profile</div>
			</div>
			<ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li><a href="#">User</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active">User Profile</li>
            </ol>
			<div class="clearfix"></div>
		</div>
		<!--END TITLE & BREADCRUMB PAGE-->

    @if ($errors->any())
    <div id="alert_message" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(Session::has('success'))
            <p id="alert_message" class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    @if(Session::has('error'))
        <p id="alert_message" class="alert alert-error">{{ Session::get('error') }}</p>
    @endif
    @if(Session::has('delete'))
        <p id="alert_message" class="alert alert-danger">{{ Session::get('delete') }}</p>
    @endif

	<div class="page-content">
        <style>
            .dot {
             
              height: 20px;
              width: 20px;
              background-color: #bbb;
              border-radius: 50%;
              display: inline-block;
            }
        </style>

        <div class="container ">
            <div class="row col-md-6 col-md-offset-3" style="background-color: white; padding: 70px;">
                <div class="col-sm-6 col-md-6">
                    @if ($user->is_permission == 1)
                        <img src="{{ asset('User_Images\superAdmin.png') }}"alt="" style="width: 100%; height: 200px;" class="img img-responsive" />
                    @elseif ($user->is_permission == 2)
                        <img src="{{ asset('User_Images\admin.png') }}"alt="" style="width: 100%; height: 200px;" class="img-rounded img-responsive" />
                    @elseif ($user->is_permission == 3)
                        <img src="{{ asset('User_Images\executive.jpg') }}"alt="" style="width: 100%; height: 200px;" class="img-rounded img-responsive" />
                    @endif
                   
                </div>
                <div class="col-sm-6 col-md-6">
                    <blockquote>
                        <p>{{$user->name}}</p> 
                        @if ($user->status == 1)
                            <small><cite title="Source Title">Active  <i class="dot" style="background-color: green;"></i></cite></small>
                        @elseif ($user->status == 0)
                            <small><cite title="Source Title">Inactivate  <i class="dot" style="background-color: red;"></i></cite></small> 
                        @endif
                        
                        <i class="fa fa-user">
                            @if ($user->is_permission == 1)
                                Super Admin
                            @elseif ($user->is_permission == 2)
                                Admin
                            @elseif ($user->is_permission == 3)
                                Executive
                            @elseif ($user->is_permission == 4)
                                
                            @elseif ($user->is_permission == 5)
                                Tutor
                            @elseif ($user->is_permission == 6)
                                Student
                            @endif
                        </i>
                    </blockquote>
                    <p> <i class="glyphicon glyphicon-envelope"></i> {{$user->email}}
                        <br/> 
                        <i class="fa fa-phone" style="margin-top: 5px;"></i> {{$user->phone}}
                        <br/> 
                        <i class="glyphicon glyphicon-calendar" style="margin-top: 5px;"></i>
                        @if ($user->created_at != null)
                            {{ date("F j, Y",strtotime($user->created_at))}}
                        @endif
                    </p>
                </div>
                
            </div>
        </div> 
            
	</div>
@endsection
@section('extra_css')
	
@endsection
@section('extra_js')
	<script>
       
        $("#alert_message").fadeTo(1000, 500).slideUp(500, function(){
            $("#alert_message").alert('close');
        });
	</script>
@endsection