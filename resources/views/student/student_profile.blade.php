@extends('layouts.master')
@section('title', 'Add New Student')
@section('content')
    
<!--BEGIN TITLE & BREADCRUMB PAGE-->
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Student Profile</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-right">
        <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="#">Student</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Profile</li>
    </ol>
    <div class="clearfix"></div>
</div>
<!--END TITLE & BREADCRUMB PAGE-->
    <style>

        .fade-scale .form-group{
            padding: 13px;
            padding-bottom: 0px;
        }

        body {background: #EAEAEA;}
        .user-details {position: relative; padding: 0;}
        .user-details .user-image {position: relative;  z-index: 1; width: 100%; text-align: center;}
        .user-image img { clear: both; margin: auto; position: relative;}

        .user-details .user-info-block {width: 100%; position: absolute; top: 55px; background: rgb(255, 255, 255); z-index: 0; padding-top: 35px;}
        .user-info-block .user-heading {width: 100%; text-align: center; margin: 10px 0 0;}
        .user-info-block .navigation {float: left; width: 100%; margin: 0; padding: 0; list-style: none; border-bottom: 1px solid #428BCA; border-top: 1px solid #428BCA;}
        .navigation li {margin-left: 40%; padding: 0;}
        .navigation li a {padding: 20px 30px; float: left;}
        .navigation li.active a {background: #428BCA; color: #fff;}
        .user-info-block .user-body {float: left; padding: 5%; width: 90%;}
        .user-body .tab-content > div {float: left; width: 100%;}
        .user-body .tab-content h4 {width: 100%; margin: 10px 0; color: #333;}
        .tab-content{border: none;}
    

        .info ul li {
            list-style: none;
            border-bottom: 1px dotted #ccc;
            margin-bottom: 8px;
        }
        .info ul li p {
            line-height: 2;
        }
        .info ul li p:first-child {
            color: #444;
            font-weight: 600;
        }
        .ptext{
            padding: 0px;
        }
        .ptext li{
        display: flex;
        }
        .ptext li p:first-child{
            width: 40%;
        }
        .ptext li p:last-child{
            width: 60%;
        }
        .form-group{
            line-height: 2;
        }
    </style>
    <div class="page-content">

        <div class="">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 user-details">
                    <div class="user-image">
                            @if ($student->gender == 1)
                            <img width="100PX" src="{{ asset('Student_Image\male_student_default.png') }}" alt="Karan Singh Sisodia" title="{{$student->name}}" class="img-circle">
                            @elseif($student->gender == 2)
                            <img width="100PX" src="{{ asset('Student_Image\female_student_default.png') }}" alt="Karan Singh Sisodia" title="{{$student->name}}" class="img-circle">
                            @endif
                        
                    </div>
                    <div class="user-info-block">
                        <div class="user-heading">
                            <h3>{{ strtoupper($student->name) }}</h3>
                            <span class="help-block">Student</span>
                        </div>
                        <ul class="navigation">
                            <li class="active" >
                                <a data-toggle="tab" href="#information">
                                    <span class="glyphicon glyphicon-user"></span>
                                </a>
                            </li>
                            <li style="">
                                <a data-toggle="tab" href="#settings">
                                    <span class="glyphicon glyphicon-cog"></span>
                                </a>
                            </li>
                            
                        </ul>
                        <div class="user-body">
                            <div class="tab-content">
                                <div id="information" class="tab-pane active info">
                                    <div class="col-sm-10 col-md-12 col-md-offset-1">
                                        <ul class="ptext">
                                            <li>
                                                <p>Shikhao Id</p>
                                                <p> <span>: {{$student->shikhao_id}}</span> </p>
                                            </li>
                                            
                                            
                                            <li>
                                                <p>Email </p>
                                                <p> <span>: {{$student->email}}</span> </p>
                                            </li>
                                            <li>
                                                <p>Account Status </p>
                                                <p>:
                                                    @if ($student->account_status == 1)
                                                    <span class="text-green">Approved</span>
                                                    @elseif($student->account_status == 0)
                                                    <span class="text-orange">Pending</span>
                                                    @elseif($student->account_status == 2)
                                                    <span class="text-red">Blocked</span>
                                                    @endif
        
                                                    {{--  if admin  --}}
                                                    @if (Auth::user()->is_permission==1 || Auth::user()->is_permission==2 || Auth::user()->is_permission==3)
                                                    <a href="#" class="btn edit_btn btn-xs" data-toggle="modal"
                                                    data-target="#approvedStudent"><i class="fa fa-edit"></i>Edit</a>
                                                    @endif
                                                    
                                                        
                                                </p>
                                            </li>
                                                
            
                                            <li>
                                                <p>Created By </p>
                                                <p>
                                                    <span class="text-blue">: {{$createdBy->name}}</span>
                                                </p>
                                            </li>
            
                                        </ul>
                                    </div>
                                </div>
                                <div id="settings" class="tab-pane">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="panel">
                                            <div class="panel-body">
                                                        <div class="row pb-r">
                                                            <div class="col-md-12">
                                                                <p class="content_heading">
                                                                    <label for="" class="left_label"><i class="fa fa-angle-up"></i></label>
                                                                    Personal Information
                                                                    <i class="right_label fa fa-info-circle"></i>
                                                                    
                                                                    <a href="#" class="btn edit_btn btn-sm" data-toggle="modal"
                                                                            data-target="#editPersonalInfo"><i class="fa fa-edit"></i>Edit</a>
                                                                </p>
                                                                <hr>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="" class="col-md-6 control-label">Name : </label>
                                                                    <div class="col-md-6 ">
                                                                        <p class="form-control-static">{{$student->name}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="" class="col-md-6 control-label">Gender : </label>
                                                                    <div class="col-md-6 ">
                                                                        <p class="form-control-static">
                                                                            @if ($student->gender == 1)
                                                                                Male
                                                                            @elseif($student->gender == 2)
                                                                                Female
                                                                            @elseif($student->gender == 3)
                                                                                Other
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="" class="col-md-6 control-label">Guardian Name: </label>
                            
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static">{{$student->guardian_name}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                            
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="" class="col-md-6 control-label">Contact Number : </label>
                                                                    <div class="col-md-6 col-sm-8 col-xs-7">
                                                                        <p class="form-control-static">{{$student->contact_number}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                            
                            
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="" class="col-md-6 control-label">Additional Contact : </label>
                                                                    <div class="col-md-6 col-sm-8 col-xs-7">
                                                                        <p class="form-control-static">{{$student->additional_contact_number}}</p>
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
                    </div>
                </div>
            </div>
        </div>

            {{--  MODALS START --}}
    <input type="hidden" id="id" value="{{$student->id}}">
    @include('student.modal.edit_personal_info')
    @include('student.modal.edit_account_status')
    
        {{--  MODALS END --}}
    </div>
        
@endsection

@section('extra_js')
    {{ Html::script('assets/js/sweetalert.min.js') }}
<script>
    $(document).ready(function() {
        var id = $("#id").val();
        var _token = '{{ csrf_token() }}';

        //Update PersonalInfo
        $( "#updateInfo" ).click(function() {
            var name = $("#name").val();
            var guardian_name = $("#guardian_name").val();
            var contact_number = $("#contact_number").val();
            var additional_contact_number = $("#additional_contact_number").val();
            var gender = $("#gender").val();
            
            //alert( _token );
            $.ajax({
                url:"{{route('student.edit.personalInfo')}}",
                method:"post",
                data: {_token : _token, id : id, name : name, guardian_name : guardian_name, contact_number : contact_number, additional_contact_number : additional_contact_number, gender : gender},
                success:function (response) {

                    if(response == 0){
                        swal("Nothing Update", "", "warning");
                        setTimeout(function () {
                            location.reload(); 
                         }, 2000); 
                    }else{
                        swal(response, "", "success");
                        setTimeout(function () {
                            location.reload(); 
                         }, 2000); 
                    }
                    
                }
            });

        });


        //Update Student status
        $( "#updateStudentStatus" ).click(function() {
            var account_status = $("#account_status:checked").val();
            
            //alert( account_status );
            $.ajax({
                url:"{{route('student.update.studentStatus')}}",
                method:"post",
                data: {_token : _token, id : id, account_status : account_status},
                success:function (response) {
                    
                    if(response == 3){
                        swal("Nothing Update", "", "warning");
                        setTimeout(function () {
                            location.reload(); 
                         }, 2000); 
                    }else{
                        swal(response, "", "success");
                        setTimeout(function () {
                            location.reload(); 
                         }, 2000); 
                    }

                    
                    
                    
                }
            });

        });

        $("#service_area_id").select2();
        $("#location_id").select2();
        $("#medium_id").select2();
        $("#school_id").select2();
        $("#class_id").select2();
        
    });
</script>
@endsection