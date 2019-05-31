@extends('layouts.master')
@section('title', 'Tutor Pending List')
@section('content')
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Tutor Pending List</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">Tutor</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Tutor Pending List</li>
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
            .fa:hover{
                color: green;
            }
        </style>
        
        <div class="panel panel-blue">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Tutor Pending List
                        </div>
                        <div class="col-md-6" style="text-align: right;">
                            <a href="{{route('student.index')}}" class="add-new-modal btn btn-success btn-square btn-sm"> <i class="fa fa-plus"></i> Add New</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-hover table-bordered">
                        <thead>
                        <tr>
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
                        <tbody>
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
                                <td style="">
                                    <a href="{{route('tutor.approve',base64_encode($t->id))}}" onclick="return confirm('Are you sure?')" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Approve Tutor"><i class="fa fa-check"></i></a>
                                    <a href="{{route('tutor.show',base64_encode($t->id))}}" class="btn btn-blue btn-sm" target="_blank"  data-toggle="tooltip" data-placement="top" title="View Details"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('tutor.reject',base64_encode($t->id))}}" onclick="return confirm('Are you sure?')"  ><button type="button" class="btn btn-red btn-sm" data-toggle="tooltip" data-placement="top" title="Reject Tutor"><i class="fa fa-ban"></i></button></a>
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
            $('.combobox').select2();

            $('#search-box-text').keyup(function () {
                var val=this.value;
                var url;

                if(val.length>2) {

                    url = "{{ route('tutor.name_search',"") }}";
                    url = url + "/" + val;
                    $('#pagination').hide();

//                    alert(url);
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
//                    alert(url);



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

            $("#alert_message").fadeTo(1000, 500).slideUp(500, function(){
                $("#alert_message").alert('close');
            });

        } );
    </script>
@endsection