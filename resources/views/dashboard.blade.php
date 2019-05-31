@extends('layouts.master')
@section('title', 'Dashboard')

    <script>
        window.onload = function () {
            
            //job chart
            var chart = new CanvasJS.Chart("jobChart", {
                
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                animationEnabled: true,
                title:{
                    text: "Job Statistics (Last 30 Day's)",
                    horizontalAlign: "center",
                    fontSize: 20,
                },
                data: [{
                    type: "doughnut",
                    startAngle: 60,
                    //innerRadius: 60,
                    indexLabelFontSize: 12,
                    indexLabel: "{label} - #percent%",
                    toolTipContent: "<b>{label}:</b> {y} (#percent%)",
                    dataPoints: [
                        { y: <?php echo $approved_job; ?>, label: "Approved Job", color: "green"  },
                        { y: <?php echo $pending_job; ?>, label: "Pending Job", color: "#ff9248"   },
                        { y: <?php echo $confirm_job; ?>, label: "Confirm Job" },
                        { y: <?php echo $rejected_job; ?>, label: "Rejected Job", color: "crimson" },
                        
                    ]
                }]
            });
            chart.render();

            //tutor chart
            var chart = new CanvasJS.Chart("tutorChart", {
                
                
                theme: "light1", // "light2", "dark1", "dark2"
                animationEnabled: true, // change to true		
                title:{
                    text: "Tutor Statistics (Last 30 Day's)",
                    horizontalAlign: "center",
                    fontSize: 20,
                },
                axisX:{
                    labelFontSize: 12
                  },
                data: [
                {
                    // Change type to "bar", "area", "spline", "pie",etc.
                    type: "bar",
                    dataPoints: [
                        { label: "Approved Tutor", color: "green",  y:<?php echo $approved_tutor; ?>  },
                        { label: "Pending Tutor", color: "#ff9248", y: <?php echo $pending_tutor; ?>  },
                        { label: "Blocked Tutor", y: <?php echo $blocked_tutor; ?>  },
                        { label: "Rejected Tutor", color: "crimson",  y: <?php echo $rejected_tutor; ?>  },
                    ]
                }
                ]
            });
            chart.render();

            //student chart
            var chart = new CanvasJS.Chart("studentChart", {
                
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                animationEnabled: true,
                title:{
                    text: "Student Statistics (Last 30 Day's)",
                    horizontalAlign: "center",
                    fontSize: 20,
                },
                data: [{
                    type: "pie",
                    startAngle: 60,
                    //innerRadius: 60,
                    indexLabelFontSize: 12,
                    indexLabel: "{label} - #percent%",
                    toolTipContent: "<b>{label}:</b> {y} (#percent%)",
                    dataPoints: [
                        { y: <?php echo $approved_student; ?>, label: "Approved Student", color: "green"  },
                        { y: <?php echo $pending_student; ?>, label: "Pending Student", color: "#ff9248"   },
                        { y: <?php echo $blocked_student; ?>, label: "Blocked Student" },
                        { y: <?php echo $rejected_student; ?>, label: "Rejected Student", color: "crimson" },
                        
                    ]
                }]
            });
            chart.render();
            
        }
    </script>
@section('content')
<style>
    .mbm{
        padding-top: 20px;
        padding-bottom: 20px;
    }
</style>
	@if(checkPermission(['super']) || checkPermission(['admin']))
		<!--BEGIN TITLE & BREADCRUMB PAGE-->
		<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
			<div class="page-header pull-left">
				<div class="page-title">Dashboard</div>
			</div>
			<ol class="breadcrumb page-breadcrumb pull-right">
				<li><i class="fa fa-home"></i>&nbsp;<a href="{{URL('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
				<li class="hidden"><a href="#">dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
				<li class="active">Dashboard</li>
			</ol>
			<div class="clearfix"></div>
		</div>
		<!--END TITLE & BREADCRUMB PAGE-->
    @endif

    @if ($errors->any())
    <div id="alert_message" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(Session::has('success'))
            <p id="alert_message" class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    @if(Session::has('error'))
        <p id="alert_message" class="alert alert-error">{{ Session::get('error') }}</p>
    @endif
    @if(Session::has('delete'))
        <p id="alert_message" class="alert alert-danger">{{ Session::get('delete') }}</p>
    @endif
	<div class="page-content" style="background-color: ">
			<div id="sum_box" class="row mbl">
                <a href="{{route('tutor.index')}}">
					<div class="col-sm-6 col-md-3">
                    <div class="panel profit db mbm">
                        <div class="panel-body"><p class="icon"><i style="color: #556e8f;" class="icon fa fa-users"></i></p><h4 class="value"><span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0"></span>
                                <span>
                                    <b>{{ $countTutor }}</b>
								</span>
                            </h4>

                            <p class="description"><b>Tutors</b></p>

                            <div class="progress progress-sm mbn">
                                <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 43454%;" class="progress-bar progress-bar-success"><span class="sr-only">80% Complete (success)</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
                <a href="{{route('student.list')}}">
                    <div class="col-sm-6 col-md-3">
                        <div class="panel income db mbm">
                            <div class="panel-body"><p class="icon"><i class="icon fa fa-drupal"></i></p><h4 class="value">
                                    <span><b>{{ $countStudent }}</b></span></h4>

                                <p class="description"><b>Students</b></p>

                                <div class="progress progress-sm mbn">
                                    <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 435%;" class="progress-bar progress-bar-info"><span class="sr-only">60% Complete (success)</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{route('job.list')}}">
                    <div class="col-sm-6 col-md-3">
                        <div class="panel task db mbm">
                            <div class="panel-body"><p class="icon"><i class="icon fa fa-tasks"></i></p><h4 class="value"><span><b>{{$countActiveJobs}}</b></span></h4>
                                <p class="description"><b>Active Jobs</b></p>

                                <div class="progress progress-sm mbn">
                                    <div role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 435%;" class="progress-bar progress-bar-danger"><span class="sr-only">50% Complete (success)</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{route('job.confirmed.list')}}">
                    <div class="col-sm-6 col-md-3">
                        <div class="panel visit db mbm">
                            <div class="panel-body"><p class="icon"><i style="color: darkgreen" class="icon fa fa-check"></i></p><h4 class="value"><span><b>{{$countConfirmJobs}}</b></span></h4>

                                <p class="description"><b>Confirmed Jobs</b></p>

                                <div class="progress progress-sm mbn">
                                    <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 435%;" class="progress-bar progress-bar-warning"><span class="sr-only">70% Complete (success)</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{route('tutor.pending')}}">
                    <div class="col-sm-6 col-md-3">
                        <div class="panel profit db mbm">
                            <div class="panel-body"><p class="icon"><i class="icon fa fa-user-md"></i></p><h4 class="value"><span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0"></span>
                                    <span>
                                        <b>{{ $countPendingTutor }}</b>
                                    </span>
                                </h4>

                                <p class="description"><b>Pending Tutors</b></p>

                                <div class="progress progress-sm mbn">
                                    <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 43454%;" class="progress-bar progress-bar-success"><span class="sr-only">80% Complete (success)</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{route('student.pendingList')}}">
                    <div class="col-sm-6 col-md-3">
                        <div class="panel income db mbm">
                            <div class="panel-body"><p class="icon"><i class="icon fa fa-drupal"></i></p><h4 class="value">
                                    <span><b>{{ $countPendingStudent }}</b></span></h4>

                                <p class="description"><b>Pending Students</b></p>

                                <div class="progress progress-sm mbn">
                                    <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 435%;" class="progress-bar progress-bar-info"><span class="sr-only">60% Complete (success)</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{route('job.list.pending')}}">
                    <div class="col-sm-6 col-md-3">
                        <div class="panel task db mbm">
                            <div class="panel-body"><p class="icon"><i class="icon fa fa-tasks"></i></p><h4 class="value"><span><b>{{$countPendingJobs}}</b></span></h4>
                                <p class="description"><b>Pending Jobs</b></p>

                                <div class="progress progress-sm mbn">
                                    <div role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 435%;" class="progress-bar progress-bar-danger"><span class="sr-only">50% Complete (success)</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="col-sm-6 col-md-3">
                        <div class="panel visit db mbm">
                            <div class="panel-body"><p class="icon"><i style="color: #a83e3e;" class="icon fa fa-times"></i></p><h4 class="value"><span><b>{{
                                $countRejectedJobs
                                }}</b></span></h4>

                                <p class="description"><b>Rejected Jobs</b></p>

                                <div class="progress progress-sm mbn">
                                    <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 435%;" class="progress-bar progress-bar-warning"><span class="sr-only">70% Complete (success)</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <div class="col-md-12" style="margin-top: 25px; margin-bottom: 25px; ">
                    <div class="col-md-4" style="padding: 10px;">
                        <div id="jobChart" style="height: 300px; width: 100%;"></div>
                    </div>
                    <div class="col-md-4" style="padding: 10px;">
                        <div id="tutorChart" style="height: 300px; width: 100%;"></div>
                    </div>
                    <div class="col-md-4" style="padding: 10px;">
                        <div id="studentChart" style="height: 300px; width: 100%;"></div>
                    </div>
                </div>

				<div class="col-md-12">
					<div id="v-cal">
						<div class="vcal-header">
							<button class="vcal-btn" data-calendar-toggle="previous">
								<svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
									<path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
								</svg>
							</button>

							<div class="vcal-header__label" data-calendar-label="month">
								March 2017
							</div>


							<button class="vcal-btn" data-calendar-toggle="next">
								<svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
									<path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
								</svg>
							</button>
						</div>
						<div class="vcal-week">
							<span>Mon</span>
							<span>Tue</span>
							<span>Wed</span>
							<span>Thu</span>
							<span>Fri</span>
							<span>Sat</span>
							<span>Sun</span>
						</div>
						<div class="vcal-body" data-calendar-area="month"></div>
					</div>
				</div>
			</div>

	</div>
@endsection
@section('extra_css')
	<style>
		#v-cal .vcal-body {
			background-color: rgba(var(--vcal-selected-bg-color), 0.3);
			display: flex;
			flex-wrap: wrap;
			height: 286px;
		}
	</style>
@endsection
@section('extra_js')
	<script>
        window.addEventListener('load', function () {
            vanillaCalendar.init({
                disablePastDays: true
            });
        })

        $("#alert_message").fadeTo(5000, 1000).slideUp(5000, function(){
            $("#alert_message").alert('close');
        });
	</script>
@endsection