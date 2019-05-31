@extends('layouts.master')
@section('title', 'Student List')
@section('content')
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Student List</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">Student</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Student List</li>
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
            .fa-eye:hover{
                color: red;
            }
        </style>

        <div class="panel panel-blue">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-3">
                        Student List
                    </div>
                    <div class="col-md-5">
                        <div class="text-center" >
                            <div class="input-group" id="adv-search">
                                <input id="search-box-text" type="text" class="form-control" placeholder="Search by using Name or Phone or Shikhao ID" />
                                <div class="input-group-btn">
                                    <div class="btn-group" role="group">
                                        <div class="dropdown dropdown-lg">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                                            <div style="box-shadow: 0 7px 10px  rgba(0, 0, 0, 0.40) !important;" class="dropdown-menu dropdown-menu-right" style="padding: 15px; padding-bottom: 10px;">
                                                {!! Form::open(['method'=>'get','action'=>"StudentController@advance_search"]) !!}
                                                    <div class="form-group">
                                                        <label class="text-black" for="institute_id">Filter By Institute</label>

                                                        <div class="form-group">
                                                            <select style="width: 100%" name="institute_id" id="institute_id" class="form-control combobox">
                                                                <option value="">Select Institute</option>
                                                                @foreach($school as $s)
                                                                    <option @if($request->institute_id==$s->id) selected @endif value="{{$s->id}}">{{$s->name}}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="text-black" for="gender">Filter By Gender</label>

                                                        <div class="form-group">
                                                            <select name="gender" id="gender" class="form-control">
                                                                <option @if($request->gender==1) selected @endif value="1">Male</option>
                                                                <option @if($request->gender==2) selected @endif value="2">Female</option>
                                                                <option @if($request->gender==0) selected @endif value="0">Others</option>
                                                                <option @if($request->gender=='') selected @endif value="">All</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="form-group">
                                                        <label class="text-black" for="account_status">Filter By Status</label>

                                                        <div class="form-group">
                                                            <select name="account_status" id="account_status" class="form-control">
                                                                <option @if($request->account_status==0) selected @endif  value="0">Pending</option>
                                                                <option @if($request->account_status==1) selected @endif value="1">Approved</option>
                                                                <option @if($request->account_status==2) selected @endif value="2">Blocked</option>
                                                                <option @if($request->account_status==3) selected @endif value="3">Rejected</option>
                                                                <option @if($request->account_status=='') selected @endif value="">All</option>

                                                            </select>
                                                        </div>
                                                    </div>


                                                    <br/><br/>

                                                    <button type="submit" style="float: right" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                                </form>

                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="text-align: right;">
                        <a href="{{route('student.index')}}" class="add-new-modal btn btn-success btn-square btn-sm"> <i class="fa fa-plus"></i> Add New</a>
                    </div>
                </div>
            </div>
            <div id="table" class="panel-body">
                <table id="example" class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Shikhao ID</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Institute</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $key=>$student)
                        <tr>
                            <td>{{$student->name}}</td>
                            <td>{{$student->shikhao_id}}</td>
                            <td>{{$student->contact_number}}</td>
                            <td>
                                @if($student->gender==1)
                                    Male
                                @elseif($student->gender==2)
                                    Female
                                @elseif($student->gender==0)
                                    Others
                                @endif
                            </td>

                            <td>{{$student->institute_name}}</td>

                            <td style="padding: 5px; text-align: center;">
                                <a class="" href="{{route('student.profile', base64_encode($student->id))}}" target="_blank"><button type="button" class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="View Student"><i class="fa fa-eye"></i></button></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div id="pagination">
                    <center>
                        {{ $students->appends(['institute_id'=>"$request->institute_id",'gender'=>$request->gender, 'account_status'=>$request->account_status])->links() }}
                    </center>
                </div>
            </div>
        </div>


    </div>


@endsection
@section('extra_js')
    <script>
        $(document).ready(function() {
            $('.combobox').select2();

            $('#search-box-text').keyup(function () {
                var val=this.value;
                var url;

                if(val.length>1) {

                    url = "{{ route('student.name_search',"") }}";
                    url = url + "/" + val;
                    $('#pagination').hide();

                }
                else {
                    $('#pagination').show();
                    url="{{route('student.all')}}";
                }
                $.ajax({
                    url:url,
                    method:'get',
                    success:function (response) {
                        $('#table').html(response);

                    }
                });

            });

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

            setTimeout(function() {
                $('#alert_message').fadeOut('fast');
            }, 5000);

        } );
    </script>
@endsection