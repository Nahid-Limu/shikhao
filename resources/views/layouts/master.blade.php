<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        @if(View::hasSection('title'))
            @yield('title')
        @else
            Shikhao
        @endif
    </title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{url('assets/images/icons/favicon.ico')}}" type="image/png">
    <!--Loading bootstrap css-->
    {{--<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">--}}
    {{--<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">--}}
    @include('includes.css')
    @yield('extra_css')
    <style>
        body{
            padding-top: 0px;
        }
        .ui-widget-content .ui-state-default {
            border: 0;
            background: #2a3b4c;
            color: #ffffff;
            cursor: pointer;
        }

        .ui-widget-header {
            background: #2a3b4c;
        }
        .ui-widget-content {
            background: #ffffff;
            border: 1px solid #2a3b4c;
        }
        .ui-widget-header {
            background: #e74c3c;
            color: #ffffff;
        }
        .ui-widget-header {
            background: #2a3b4c;
            color: #ffffff;
        }
    </style>
</head>
<body class="sidebar-colors">
<div>
    <!--BEGIN THEME SETTING-->
    @include('includes.themesettings')
    <!--END THEME SETTING-->

    <!--BEGIN BACK TO TOP-->
        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
    <!--END BACK TO TOP-->

    <!--BEGIN TOPBAR-->
    @include('includes.header_topbar')
    <!--END TOPBAR-->

    <div id="wrapper">
        <!--BEGIN SIDEBAR MENU-->
            @include('includes.sidebar')
        <!--END SIDEBAR MENU-->
        
        <!--BEGIN CHAT FORM-->
            @include('includes.chat')
        <!--END CHAT FORM-->
        
        <!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper">
            
            <!--BEGIN CONTENT-->
                @yield('content')
            <!--END CONTENT-->
            
            <!--BEGIN FOOTER-->
                @include('includes.footer')
            <!--END FOOTER-->
        </div>
        <!--END PAGE WRAPPER-->
    </div>
</div>
    @include('includes.js')
    @yield('extra_js')
    <!--CORE JAVASCRIPT-->
    {{ Html::script('assets/js/main.js') }}
    {{ Html::script('assets/js/mom.js') }}
    {{ Html::script('assets/js/tpick.js') }}
</body>
</html>