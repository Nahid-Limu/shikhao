@extends('layouts.master')
@section('title', 'Hospital Information')
@section('content')
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Company Information</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{URL('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">Company</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Information</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE-->
    <div class="page-content">
        @if(Session::has('message'))
            <p id="alert_message" class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
        @endif
        <div class="panel panel-blue">
            <div class="panel-heading">Update Company Information</div>
            <div class="panel-body">
                {{Form::open(array('url' => 'company/information/update','method' => 'post'))}}
                @foreach($company as $info)
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Company Name*</label>
                            <input type="text" name="c_name" class="form-control" value="{{$info->company_name}}" id="email" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Company Phone*</label>
                            <input type="text" name="c_phone" class="form-control" value="{{$info->company_phone}}" id="email" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Company Email*</label>
                            <input type="email" name="c_email" class="form-control" value="{{$info->company_email}}" id="email" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Company Address*</label>
                            <textarea name="c_address" rows="4" cols="50" class="form-control" required>{{$info->company_address}}</textarea>
                        </div>
                        <input type="hidden" name="c_id" value="{{$info->id}}">
                        @if(checkPermission(['super']) || checkPermission(['admin']))
                        <button type="submit" class="btn btn-success">Update Information</button>

                        @endif
                    </div>
                </div>
                @endforeach
                {{ Form::close() }}
            </div>
        </div>
      </div>
    <script>
        setTimeout(function() {
            $('#alert_message').fadeOut('fast');
        }, 5000);
    </script>
@endsection