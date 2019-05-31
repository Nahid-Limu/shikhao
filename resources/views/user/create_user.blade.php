@extends('layouts.master')
@section('title', 'Create user')
@section('content')

	
		<!--BEGIN TITLE & BREADCRUMB PAGE-->
		<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
			<div class="page-header pull-left">
				<div class="page-title">Create user</div>
			</div>
			<ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li><a href="#">User</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active">Create User</li>
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
            
            <div class="container">

                    <form class="well form-horizontal" action="{{route('createUser.store_user')}}" method="post"  id="contact_form">
                        @csrf
                <fieldset>
                
                <!-- Form Name -->
                <legend><center><h2><b>Create New User</b></h2></center></legend><br>
                
                <!-- Text input-->
                
                <div class="form-group">
                    <label class="col-md-4 control-label">Username</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input  name="user_name" placeholder="Username" class="form-control"  type="text" required>
                        </div>
                    </div>
                </div>
                

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">E-Mail</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input name="email" placeholder="E-Mail Address" class="form-control"  type="text" required>
                        </div>
                    </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Phone</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input name="phone" placeholder="Phone Number" class="form-control"  type="tel" required>
                        </div>
                    </div>
                </div>
                <!-- Text input-->
                
                <div class="form-group">
                    <label class="col-md-4 control-label" >Password</label> 
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input name="user_password" placeholder="Password" class="form-control"  type="password" required>
                        </div>
                    </div>
                </div>

                <!-- Text input-->
                
                <div class="form-group">
                    <label class="col-md-4 control-label" >Confirm Password</label> 
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input name="confirm_password" placeholder="Confirm Password" class="form-control"  type="password" required>
                        </div>
                    </div>
                </div>

                <div class="form-group"> 
                    <label class="col-md-4 control-label">User Type</label>
                    <div class="col-md-4 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                            <select name="user_type" class="form-control selectpicker" required>
                                <option value="">Select User Type</option>
                                @if (Auth::user()->is_permission==1)
                                <option value="2">Admin</option>
                                <option value="3">Executive</option>
                                @elseif (Auth::user()->is_permission==2)
                                <option value="3">Executive</option>
                                @endif
                                
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Select Basic -->
                
                <!-- Button -->
                <div class="form-group">
                  <label class="col-md-4 control-label"></label>
                  <div class="col-md-4"><br>
                    <button type="submit" class="btn btn-warning pull-right" ><i class="fa fa-plus"> </i> Create User</button>
                  </div>
                </div>
                
                </fieldset>
                </form>
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