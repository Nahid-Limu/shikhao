@extends('layouts.master')
@section('title', 'Subject')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Subject</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i> <a href="{{url('/')}}">Settings</a><i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Subject</li>
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
        <div class="panel panel-blue">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        Subject <i class="fa fa-book" aria-hidden="true"></i>

                    </div>
                    <div class="col-md-6" style="text-align: right;">
                        <a data-toggle="modal" data-target="#createSubject" class="add-new-modal btn btn-success btn-square btn-sm"><i class="fa fa-plus"></i>Add New</a>
                    </div>

                </div>
            </div>
            <div class="panel-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <table id="example" class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Subject</th>
                        <th>Subject Code</th>
                        {{--<th>Class</th>--}}
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subject as $key=>$s)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$s->name}}</td>
                            <td>{{$s->subject_code}}</td>
                            {{--<td>{{$s->class_name." (".$s->medium_name.")"}}</td>--}}
                            <td>
                                @if($s->status==1)
                                    <span class="text-green">Active</span>
                                @else
                                    <span class="text-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a class="view-modal-btn" href="{{route('subject.show',$s->id)}}"><button type="button" class="btn btn-blue btn-xs"><i class="fa fa-eye"></i>&nbsp;View</button></a>&nbsp;&nbsp;&nbsp;
                                <a class="edit-modal-btn" href="{{route('subject.edit',$s->id)}}"> <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</button></a>&nbsp;&nbsp;&nbsp;
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>

    @include('settings.subject.modal.create')
    @include('settings.subject.modal.edit-modal')


    @include('settings.subject.modal.view-modal')

@endsection



@section('extra_js')
    <script>
        $(document).ready(function() {

            $(document.body).on('hover', '.select-search', function() {
                $('.select-search').select2();
            });

            $('#example').DataTable();
            $('#example').on('click','.edit-modal-btn',function (event) {
                event.preventDefault();
                let url=$(this).attr('href')
                let method="get";
                $.ajax({
                    url:url,
                    method:method,
                    success:function (response) {
                        $('.edit-modal-body').html(response);
                        $('.select-search').select2();
                    }
                });
                $('#edit-modal').modal();

            });
            $('#example').on('click','.view-modal-btn',function (event) {
                event.preventDefault();
                var url=$(this).attr('href');
                var method="get";
                $.ajax({
                    url:url,
                    method:method,
                    success:function (response) {
                        $('.view-modal-body').html(response);
                    }
                });
                $('#view-modal').modal();

            });
            $('.select-search').select2();
            setTimeout(function() {
                $('#alert_message').fadeOut('fast');
            }, 5000);

        } );
    </script>
@endsection