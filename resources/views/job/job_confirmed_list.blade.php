@extends('layouts.master')
@section('title', 'Job Confirmed List')
@section('content')
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Job Confirmed List</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">Job</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Job Confirmed List</li>
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
            .btn:hover{
                color: red;
            }
        </style>
        
        <div class="panel panel-blue">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        Job Confirmed List
                    </div>
                    
                </div>
            </div>
            <div class="panel-body">
                <table id="example" class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Student Name</th>
                        <th>Tutor Name</th>
                        <th>Salary</th>
                        <th>Starting Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($job_confirmed_list as $key=>$job)
                        <tr>
                            <td>Tution For {{$job->class}}</td>
                            <td>{{$job->student_name}}</td>
                            <td>{{$job->tutor_name}}</td>
                            <td>{{$job->salary}}</td>
                            <td>{{$job->started_on}}</td>
                            <td style="padding: 5px; text-align: center;">
                                
                                <a class="" href="{{route('job.confirmed.view', base64_encode($job->id))}}" target="_blank"><button type="button" class="btn btn-sm btn-blue" data-toggle="tooltip" data-placement="top" title="View Job"><i class="fa fa-eye"></i></button></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
           
    </div>


@endsection
@section('extra_js')
    <script>
        $(document).ready(function() {
            
            $('#example').DataTable();

            $("#alert_message").fadeTo(1000, 500).slideUp(500, function(){
                $("#alert_message").alert('close');
            });

        } );
    </script>
@endsection