@extends('layouts.master')
@section('title', 'Pending Student List')
@section('content')
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Pending Student List</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">Student</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Pending Student List</li>
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
        {{-- <style>
            .fa:hover{
                color: green;
            }
        </style> --}}
        
        <div class="panel panel-blue">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Student List
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
                                    <a class="" href="{{route('student.approve', base64_encode($student->id))}}" onclick="return confirm('are you sure?')" ><button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Approve Student"><i class="fa fa-check"></i></button></a>
                                    <a class="" href="{{route('student.profile', base64_encode($student->id))}}" target="_blank"><button type="button" class="btn btn-blue btn-sm" data-toggle="tooltip" data-placement="top" title="View Student"><i class="fa fa-eye"></i></button></a>
                                    <a class="" href="{{route('student.reject', base64_encode($student->id))}}" onclick="return confirm('are you sure?')"  ><button type="button" class="btn btn-red btn-sm" data-toggle="tooltip" data-placement="top" title="Reject Student"><i class="fa fa-ban"></i></button></a>
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

            
            function conf(
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    });
                    } else {
                    swal("Your imaginary file is safe!");
                    }
                });
            );
            
            $("#alert_message").fadeTo(1000, 500).slideUp(500, function(){
                $("#alert_message").alert('close');
            });

        } );
    </script>
@endsection