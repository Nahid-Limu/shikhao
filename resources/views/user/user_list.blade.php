@extends('layouts.master')
@section('title', 'User List')
@section('content')
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Job Confirmed List</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">User</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">User List</li>
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
            .fa-ban:hover{
                color: red;
            }
            .fa-check:hover{
                color: green;
            }
        </style>
        
        <div class="panel panel-blue">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-right" >
                                <a href="{{route('createUser.view')}}" class="add-new-modal btn btn-success btn-square btn-sm"> <i class="fa fa-plus"></i> Add New</a>
                            </div>   
                        User List
                            
                    </div>
                    
                </div>
            </div>
            <div class="panel-body">
                <table id="example" class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Create Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key=>$user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                @if ($user->is_permission == 2)
                                    Admin
                                @elseif ($user->is_permission == 3)    
                                    Executive
                                @endif
                            </td>
                            <td>
                                @if (Auth::user()->email == $user->email)
                                    @if ($user->status == 1)
                                        Active
                                        <a class="pull-right" onclick="return alert('This is you !!!')" ><button type="button" disabled class="btn btn-sm btn-red btn" data-toggle="tooltip" data-placement="top" title="Make InActive"><i class="fa fa-ban"></i></button></a>
                                    @elseif ($user->status == 0)    
                                        InActive
                                        <a class="pull-right" onclick="return alert('This is you !!!')" ><button type="button" disabled class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Make Active"><i class="fa fa-check"></i></button></a>
                                    @endif
                                @else
                                    @if ($user->status == 1)
                                        Active
                                        <a class="pull-right" href="{{route('user.active_inactive',[base64_encode($user->id),base64_encode(0)])}}" onclick="return confirm('are you sure?')" ><button type="button" class="btn btn-sm btn-red" data-toggle="tooltip" data-placement="top" title="Make InActive"><i class="fa fa-ban"></i></button></a>
                                    @elseif ($user->status == 0)    
                                        InActive
                                        <a class="pull-right" href="{{route('user.active_inactive', [base64_encode($user->id),base64_encode(1)])}}" onclick="return confirm('are you sure?')" ><button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Make Active"><i class="fa fa-check"></i></button></a>
                                    @endif
                                @endif
                                
                                
                            </td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->toDateString() }}</td>
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
