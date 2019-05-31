@extends('layouts.master')
@section('title', 'Tutor List')
@section('content')
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Tutor List</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">Tutor</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Tutor List</li>
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
        <div class="panel panel-blue">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-3">
                        Tutor List
                    </div>
                    {{--<div class="row">--}}
                    <div class="col-md-6">
                        <div class="input-group" id="adv-search">
                            <input id="search-box-text" type="text" class="form-control" placeholder="Search by using Name or Phone or Shikhao ID" />
                            <div class="input-group-btn">
                                <div class="btn-group" role="group">
                                    <div class="dropdown dropdown-lg">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                                        <div style="box-shadow: 0 7px 10px rgba(0, 0, 0, 0.40) !important;" class="dropdown-menu dropdown-menu-right" role="menu">
                                            {!! Form::open(['method'=>'GET','action'=>'TutorController@advance_search']) !!}
                                            <div class="form-group">
                                                <label class="text-black" for="medium_id">Filter By Medium (Preferred)</label>

                                                <div class="option-group">
                                                    <div>
                                                        <select id="medium_id" style="width: 100%;" name="medium_id" class="form-control">
                                                            <option value="">Select Medium</option>
                                                            @foreach($medium as $m)
                                                                <option value="{{$m->id}}">{{$m->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <br>

                                                <label class="text-black" for="service_area_id">Service Area</label>

                                                <div class="option-group">
                                                    <div><select id="service_area_id" style="width: 100%;" name="service_area_id" class="form-control">
                                                            <option value="">Select Service Area</option>
                                                            @foreach($service_area as $sa)
                                                                <option value="{{$sa->id}}">{{$sa->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
{{--                                                    {!! Form::select('service_area_id',[''=>'Select Service Area']+ $service_area,null,['style'=>'width:100%;','class'=>' form-control']) !!}--}}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <br>
                                                <label class="text-black" for="location_id">Location (Preferred)</label>
                                                <div class="option-group">
                                                    <select id="location_id" style="width: 100%;" name="location_id" class="form-control combobox">
                                                        <option value="">Select Service Area</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                {{--<br>--}}
                                                <label class="text-black" for="contain">Gender</label>
                                                <div class="option-group">
                                                    {!! Form::select('gender',[''=>'Select Gender']+ ['1'=>'Male','2'=>'Female','0'=>'Other'],null,['style'=>'width:100%;','class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <br>

                                                <label class="text-black" for="class_id">Class (Preferred)</label>

                                                <div class="option-group">
                                                    <div><select id="class_id" style="width: 100%;" name="class_id" class="form-control">
                                                            <option value="">Select Class </option>
                                                            @foreach($class as $c)
                                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <br>

                                                <label class="text-black" for="class_id">Subject (Preferred)</label>

                                                <div class="option-group">
                                                    <div><select id="subject_id" style="width: 100%;" name="subject_id" class="form-control combobox">
                                                            <option value="">Select Subject</option>
                                                            @foreach($subject as $s)
                                                                <option value="{{$s->id}}">{{$s->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {{--<br>--}}
                                                <label class="text-black" for="contain">Account Status</label>
                                                <div class="option-group">
                                                    {!! Form::select('account_status',[''=>'Select Type']+ [''=>'Select Account Status','1'=>'Approved','0'=>'Pending','2'=>'Blocked','3'=>'Rejected'],null,['style'=>'width:100%;','class'=>'form-control']) !!}
                                                </div>
                                            </div>

                                            <br> <br>
                                            <button type="submit" style="float: right" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--</div>--}}
                    <div class="col-md-3" style="text-align: right;">
                        <a href="{{route('tutor.create')}}" class="add-new-modal btn btn-success btn-square btn-sm"> <i class="fa fa-plus"></i> Add New</a>
                    </div>

                </div>
            </div>
            <div id="table" class="panel-body">
                <table id="example" class="table table-hover table-bordered">
                    <thead>
                    <tr style="background: #e9f5ff;">
                        <th>Name</th>
                        <th>Shikhao ID</th>
                        <th>Phone</th>
                        <th>Occupation</th>
                        <th>Gender</th>
                        <th>Location</th>
                        <th>Curriculum</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="table-body">
                    @foreach($tutor as $t)
                        <tr>
                            <td>{{$t->name}}</td>
                            <td>{{$t->shikhao_id}}</td>
                            <td>{{$t->contact_number}}</td>
                            <td>{{$t->occupation_name}}</td>
                            <td>
                                @if($t->gender==1)
                                    Male
                                @else
                                    Female
                                @endif
                            </td>
                            <td>{{$t->location_name}}</td>
                            <td>{{$t->curriculum_name}}</td>
                            <td style="padding: 5px; text-align: center;">
                                {{-- <a target="_blank"  title="View Details" href="{{route('tutor.show',base64_encode($t->id))}}" class="btn btn-default btn-sm"><i class="fa fa-eye fa-lg"></i></a> --}}
                                <a class="" href="{{route('tutor.show',base64_encode($t->id))}}" target="_blank"><button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View Details"><i class="fa fa-eye"></i></button></a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div id="pagination">
                    <center>
                        {{ $tutor->links() }}
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

                    url = "{{ route('tutor.name_search',"") }}";
                    url = url + "/" + val;
                    $('#pagination').hide();

                }
                else {
                    $('#pagination').show();
                    url="{{route('tutor.all')}}";
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