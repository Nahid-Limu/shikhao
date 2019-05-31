@extends('layouts.master')
@section('title', 'Add New Student')
@section('content')
    <style>
        .form-group{
            padding-bottom: 12px;
        }
    </style>
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Add New Student</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">Student</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Add New Student</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE-->
    
    <div class="page-content">
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

        <form action="{{route('student.add')}}" method="post">
                @csrf
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-blue">
                                <div class="panel-heading"></div>
                                <div class="panel-body">
                                        <h5><b>Personal Information</b></h5>
                                        <hr>
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Name <span class='require'>*</span></label>  
                                            <div class="col-md-9">
                                                <input id="name" name="name" type="text" placeholder="Name" required class="form-control"/>
                                            </div>
                                            
                                        </div>

                                        <br/>
                                        <div class="form-group">
                                            <label for="email" class="col-md-3 control-label">Email <span class='require'>*</span></label>  
                                            <div class="col-md-9">
                                                <input id="email" name="email" type="email" placeholder="Email" required class="form-control"/>
                                            </div>
                                            
                                        </div>

                                        <br/>
                                        <div class="form-group">
                                            <label for="contact_number" class="col-md-3 control-label">Phone <span class='require'>*</span></label>
                                            <div class="col-md-9"><input id="contact_number" name="contact_number" type="tel" required placeholder="Phone Number" class="form-control"/></div>
                                        </div>

                                        <br/>
                                        <div class="form-group">
                                            <label for="password" class="col-md-3 control-label">Password <span class='require'>*</span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon"><i class="fa fa-unlock-alt"></i>
                                                    <input type="password" name="password" required placeholder="Enter Password" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                                        <br/>
                                        <div class="form-group">
                                            <label for="guardian_name" class="col-md-3 control-label">Guardian Name </label>
                                            <div class="col-md-9"><input id="guardian_name" name="guardian_name" type="text" placeholder="Guardian Name " class="form-control"/></div>
                                        </div>

                                        
                                        <br/>
                                        <div class="form-group">
                                            <label for="additional_contact_number" class="col-md-3 control-label">Additional Contact </label>
                                            <div class="col-md-9">
                                                <input id="additional_contact_number" name="additional_contact_number" type="tel" placeholder="Additional Contact  Number" class="form-control"/>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-group"><label for="gender" class="col-md-3 control-label">Gender <span class='require'>*</span></label>

                                            <div class="col-md-9">
                                                <select id="gender" name="gender" required class="form-control">
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                    <option value="0">Others</option>
                                                </select>
                                            </div>
                                        </div>

                                        <br/>
                                        <div class="form-group"><label for="school_id" class="col-md-3 control-label">School <span class='require'>*</span></label>

                                            <div class="col-md-9">
                                                <select id="school_id" name="school_id" required class="form-control">
                                                    <option value="">Select School</option>
                                                    @foreach ($school as $s)
                                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <hr>
                                        <div class="form-group">
                                            <button type="submit" name='submit_type' value="Finsh" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save </button>
                                            
                                            <button type="reset" class="btn btn-default pull-left"><i class="fa fa-refresh"></i> Reset</button>
                                        </div>                                                    
                                    
                                </div>
                                <div class="panel-footer"></div>
                            </div>
                </div>
            </div>
        </form>

@endsection
@section('extra_js')
    <script>
        $(document).ready(function () {
            
            
            $("#school_id").select2();
           

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

            //get school
            $('#medium_id').on('change',function () {
                var val=this.value;
                var url="{{route('ajax.get_institute')}}";
                url=url+"/?id="+val;
                // alert(url);
                $.ajax({
                    url:url,
                    method:"get",
                    success:function (response) {
                       
                        $('#school_id').html(response);
                    }
                });
            });

            $("#alert_message").fadeTo(1000, 500).slideUp(500, function(){
                $("#alert_message").alert('close');
            });

        });
    </script>
@endsection