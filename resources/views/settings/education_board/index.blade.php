@extends('layouts.master')
@section('title', 'Education Board')
@section('content')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Education Board</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i> <a href="{{url('/')}}">Settings</a><i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Education Board</li>
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
                        Education Board <i class="fa fa-empire" aria-hidden="true"></i>

                    </div>
                    <div class="col-md-6" style="text-align: right;">
                        <a data-toggle="modal" data-target="#createEducationBoard" class="add-new-modal btn btn-success btn-square btn-sm"><i class="fa fa-plus"></i>Add New</a>
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
                        <th>Education Board</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($education_board as $key=>$d)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$d->name}}</td>
                            <td>
                                @if($d->status==1)
                                    <span class="text-green">Active</span>
                                @else
                                    <span class="text-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a class="view-modal-btn" href="{{route('education_board.show',$d->id)}}"><button type="button" class="btn btn-blue btn-xs"><i class="fa fa-eye"></i>&nbsp;View</button></a>&nbsp;&nbsp;&nbsp;
                                <a class="edit-modal-btn" href="{{route('education_board.edit',$d->id)}}"> <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</button></a>&nbsp;&nbsp;&nbsp;
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>

    @include('settings.education_board.modal.create')
    @include('settings.education_board.modal.edit-modal')


    @include('settings.education_board.modal.view-modal')

@endsection



@section('extra_js')
    <script>
        $(document).ready(function() {
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
            setTimeout(function() {
                $('#alert_message').fadeOut('fast');
            }, 5000);

        } );
    </script>
@endsection