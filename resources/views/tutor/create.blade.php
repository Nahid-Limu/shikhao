@extends('layouts.master')
@section('title', 'Tutor Register')
@section('content')
    <style>
        .row{
            padding-bottom: 12px;
        }

        .stepwizard-step p {
            margin-top: 10px;
        }
        .stepwizard-row {
            display: table-row;
        }
        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;

        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
    </style>
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Tutor Register</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i> <a href="{{url('/')}}">Tutor</a><i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">register</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <div class="page-content">
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
        <div class="row">
            <div class="col-lg-12">

            <div class="panel panel-blue">
                <div class="panel-heading"></div>
                <div class="panel-body pan">
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                        <p><b>Personal Information</b></p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                        <p><b>Educational Background</b></p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                        <p><b>Teaching Preference</b></p>
                    </div>
                </div>
            </div>
            {!! Form::open(['method'=>'post','action'=>'TutorController@store','files'=>true]) !!}
                <div class="row setup-content" id="step-1">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3><b> First Step</b></h3>

                            <div class="form-body pal"><h5><b>Personal Information</b></h5>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="name" class="col-md-3 control-label">Full Name <span class='require'>*</span></label>

                                            <div class="col-md-9"><input id="name" required name="name" type="text" placeholder="Name" class="form-control"/></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="contact_number" class="col-md-3 control-label">Phone Number <span class='require'>*</span></label>

                                            <div class="col-md-9">
                                                <div class="input-icon"><i class="fa fa-phone" aria-hidden="true"></i><input id="contact_number" required name="contact_number" type="text" placeholder="Phone Number" class="form-control"/></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="email" class="col-md-3 control-label">Email <span class='require'>*</span></label>

                                            <div class="col-md-9">
                                                <div class="input-icon"><i class="fa fa-envelope"></i><input type="email" required name="email" placeholder="Email Address" class="form-control"/></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="password" class="col-md-3 control-label">Password <span class='require'>*</span></label>

                                            <div class="col-md-9">
                                                <div class="input-icon"><i class="fa fa-unlock-alt"></i><input type="password" required name="password" placeholder="Enter Password" class="form-control"/></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group"><label for="facebook_username" style="padding-left: 0px;"  class="col-md-3 control-label">Facebook Username</label>
                                            <div class="col-md-9"><input id="facebook_username" name="facebook_username" type="text" placeholder="Facebook Username" class="form-control"/></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group"><label for="gender" class="col-md-3 control-label">Gender <span class='require'>*</span></label>

                                            <div class="col-md-9"><select id="gender" name="gender" required class="form-control">
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                    <option value="0">Others</option>
                                                </select></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="dob" class="col-md-3 control-label">Date Of Birth</label>

                                            <div class="col-md-9"><input id="dob" name="dob" type="date" class="form-control"/></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="occupation_id" class="col-md-3 control-label">Occupation <span class='require'>*</span></label>

                                            <div class="col-md-9"><select id="occupation_id" required name="occupation_id" class="form-control">
                                                    <option value="">Select Occupation</option>
                                                    @foreach($occupation as $o)
                                                        <option value="{{$o->id}}">{{$o->name}}</option>
                                                    @endforeach
                                                </select></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="fathers_name" class="col-md-3 control-label">Father's Name</label>

                                            <div class="col-md-9"><input id="fathers_name" name="fathers_name" type="text" placeholder="Father's Name" class="form-control"/></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="mothers_name" class="col-md-3 control-label">Mother's Name</label>

                                            <div class="col-md-9"><input id="mothers_name" name="mothers_name" type="text" placeholder="Mother's Name" class="form-control"/></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="nationalId" class="col-md-3 control-label">National ID</label>

                                            <div class="col-md-9"><input id="nationalId" name="nationalId" type="text" placeholder="National ID Number" class="form-control"/></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="parents_number" class="col-md-3 control-label">Parents's Number</label>

                                            <div class="col-md-9"><input id="parents_number" name="parents_number" type="text" placeholder="Parents's Number" class="form-control"/></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="minimum_salary" class="col-md-3 control-label">Salary (TAKA)  <i class="fa fa-info-circle" data-toggle="tooltip" title="Minimum Salary." aria-hidden="true"></i></label>

                                            <div class="col-md-9"><input id="minimum_salary" name="minimum_salary" type="number" placeholder="Minimum Salary" class="form-control"/></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="number_days_week" class="col-md-3 control-label">Tutoring Days <i class="fa fa-info-circle" data-toggle="tooltip" title="Number of days want to tutor in a week. " aria-hidden="true"></i>
                                            </label>

                                            <div class="col-md-9"><input id="number_days_week" name="number_days_week" type="text" placeholder="Tutoring Days In a Week" class="form-control"/></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="image" class="col-md-3 control-label">Photo</label>

                                            <div class="col-md-9"><input type="file" class="form-control" id="image" name="image"/></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="status" class="col-md-3 control-label">Status <span class='require'>*</span></label>

                                            <div class="col-md-9"><select id="status" name="account_status" required class="form-control">
                                                    @if(checkPermission(['admin']))
                                                        <option value="1">Approved</option>
                                                        <option value="2">Pending</option>
                                                    @else
                                                        <option value="2">Pending</option>
                                                    @endif
                                                    {{--<option value="0">Others</option>--}}
                                                </select></div>
                                        </div>
                                    </div>
                                </div>

                                <h5><b>Address</b></h5>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="service_area" class="col-md-3 control-label">Service Area <span class='require'>*</span></label>
                                            <div class="col-md-9">
                                                <select id="service_area" name="service_area_id" required class="form-control">
                                                    <option value="">Select Area</option>
                                                    @foreach($service_area as $area)
                                                        <option value="{{$area->id}}">{{$area->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="location_id" class="col-md-3 control-label">Location <span class='require'>*</span></label>

                                            <div class="col-md-9">
                                                <select id="location_id" required name="location_id" class="form-control">
                                                    <option value="">Select Service Area First</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="permanent_address" class="col-md-3 control-label">Permanent Address</label>

                                            <div class="col-md-9"><textarea id="permanent_address" name="permanent_address" type="text" placeholder="Permanent Address" class="form-control"></textarea></div>
                                        </div>
                                    </div>

                                </div>

                            </div>



                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-2">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3><b> Second Step</b></h3>

                            <div class="form-body pal"><h5><b>Educational Information</b></h5>
                                <hr>

                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group"><label for="medium_id" class="col-md-3 control-label">Medium <span class='require'>*</span></label>

                                            <div class="col-md-6">
                                                <select id="medium_id" name="medium_id" required class="form-control">
                                                    <option value="">Select Medium</option>
                                                    @foreach($medium as $m)
                                                        <option value="{{$m->id}}">{{$m->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group"><label for="english_bangla_curriculum_id" class="col-md-3 control-label">Curriculum </label>

                                            <div class="col-md-6" id="curriculum_section">
                                                <div class="input-icon">
                                                    <select id="english_bangla_curriculum_id" name="english_bangla_curriculum_id" class="form-control">
                                                        <option value="">Select Medium First</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group"><label for="school_id" class="col-md-3 control-label">School/College <span class='require'>*</span></label>

                                            <div class="col-md-6">
                                                <select id="school_id" name="school_id" style="width: 100%" required class="form-control">
                                                    <option value="">Select School</option>
                                                    @foreach($school as $s)
                                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group"><label for="ssc_result" class="col-md-3 control-label">SSC Result</label>

                                            <div class="col-md-6">
                                                <input id="ssc_result" name="ssc_result" type="text" placeholder="Enter SSC GPA/Division" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group"><label for="hsc_result" class="col-md-3 control-label">HSC Result</label>

                                            <div class="col-md-6">
                                                <input id="ssc_result" name="hsc_result" type="text" placeholder="Enter HSC GPA/Division" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group"><label for="university_id" class="col-md-3 control-label">University </label>

                                            <div class="col-md-6">
                                                <select id="university_id" name="university_id" style="width: 100%" class="form-control">
                                                    <option value="">Select University</option>
                                                    @foreach($university as $u)
                                                        <option value="{{$u->id}}">{{$u->name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group"><label for="department_id" class="col-md-3 control-label">Department </label>

                                            <div class="col-md-6">
                                                <select id="department_id" name="department_id" class="form-control">
                                                    <option value="">Select Department</option>
                                                    @foreach($department as $d)
                                                        <option value="{{$d->id}}">{{$d->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group"><label for="semester_year_id" class="col-md-3 control-label">Year/Semester</label>

                                            <div class="col-md-6">
                                                <select id="semester_year_id" name="semester_year_id" class="form-control">
                                                    <option value="">Select Year Semester</option>
                                                    @foreach($ys as $u)
                                                        <option value="{{$u->id}}">{{$u->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group"><label for="university_student_id" class="col-md-3 control-label">University ID</label>

                                            <div class="col-md-6">
                                                <input id="university_student_id" name="university_student_id" type="text" placeholder="University ID Number" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row setup-content" id="step-3">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3><b> Third Step</b></h3>

                            <div class="form-body pal"><h5><b>Tutor Preference</b></h5>


                                <hr>

                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group"><label for="medium_id" class="col-md-3 control-label">Preferred Medium <span class='require'>*</span></label>

                                            <div class="col-md-6">
                                                <select id="preferred_medium_id" name="preferred_medium_id" required class="form-control">
                                                    <option value="">Select Medium</option>
                                                    @foreach($medium as $m)
                                                        <option value="{{$m->id}}">{{$m->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group"><label for="preferred_curriculum_id" class="col-md-3 control-label">Preferred Curriculum
                                                <i class="fa fa-info-circle" data-toggle="tooltip" title="Pick the curricula you are confident about. Understand that a student's academic progress is dependent on a tutor." aria-hidden="true"></i>
                                            </label>

                                            <div class="col-md-6" id="preferred_curriculum_section">
                                                <div class="input-icon">
                                                    <select id="preferred_curriculum_id" name="preferred_curriculum_id" class="form-control">
                                                        <option value="">Select Medium First</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group"><label for="class_id" class="col-md-3 control-label">Preferred Class/Grade <span class='require'>*</span></label>

                                            <div class="col-md-6">
                                                <select id="class_id_section" multiple="multiple" style="width: 100%;" name="class_id[]" required class="form-control">
                                                    <option value="">Select Medium First</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group"><label for="subject_id" class="col-md-3 control-label">Preferred Subject <span class='require'>*</span></label>

                                            <div class="col-md-6">
                                                <select id="subject_id_section" name="subject_id[]" style="width: 100%;" multiple required class="form-control">
                                                    <option value="">All</option>
                                                    @foreach($subject as $s)
                                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group"><label for="preferred_service_area_id" class="col-md-3 control-label">Preferred Service Area<span class='require'>*</span></label>

                                            <div class="col-md-6">
                                                <select id="preferred_service_area_id" name="preferred_service_area_id" required class="form-control">
                                                    <option value="">Select Area</option>
                                                    @foreach($service_area as $s)
                                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group"><label for="preferred_location_id" class="col-md-3 control-label">Location<span class='require'>*</span></label>

                                            <div class="col-md-6">
                                                <select id="preferred_location_id" multiple name="preferred_location_id[]" style="width: 100%" required class="form-control">
                                                    <option value="">Select Service Area First</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group">
                                            <label for="day"  class="col-md-3 control-label">Preferred Day<span class='require'>*</span></label>

                                            <div class="col-md-6">
                                                <select id="day" name="day[]" style="width: 100%" multiple required class="form-control">
                                                    {{--<option value="0">All</option>--}}
{{--                                                    <option value="0">Flexible</option>--}}
                                                    <option value="1">Sunday</option>
                                                    <option value="2">Monday</option>
                                                    <option value="3">Tuesday</option>
                                                    <option value="4">Wednesday</option>
                                                    <option value="5">Thursday</option>
                                                    <option value="6">Friday</option>
                                                    <option value="7">Saturday</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        <div class="form-group">
                                            <label for="time" class="col-md-3 control-label">Preferred Time<span class='require'>*</span></label>

                                            <div class="col-md-6">
                                                <select id="time" name="time[]" style="width: 100%" multiple required class="form-control">
                                                    {{--<option value="0">All</option>--}}
                                                    <option value="1">Any Time</option>
                                                    <option value="2">Morning</option>
                                                    <option value="3">Noon</option>
                                                    <option value="4">Evening</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>

@endsection



@section('extra_js')
    <script>

        $(document).ready(function () {

            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function(){
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url'],input[type='email'],input[type='password'],input[type='number'],select"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for(var i=0; i<curInputs.length; i++){
                    if (!curInputs[i].validity.valid){
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-primary').trigger('click');

            $('#service_area').on('change',function () {
                var val=this.value;
                var url="{{route('service_area.get_location')}}";
                url=url+"/?id="+val;
                $.ajax({
                    url:url,
                    method:"get",
                    success:function (response) {
                        $('#location_id').html(response);
                    }
                });
            });
            $('#medium_id').on('change',function () {
                var val=this.value;
                var url="{{route('ajax.get_curriculum')}}";
                url=url+"/?id="+val;
                // alert(url);
                $.ajax({
                    url:url,
                    method:"get",
                    success:function (response) {
                        $('#curriculum_section').html(response);
                    }
                });
            });

            $('#preferred_medium_id').on('change',function () {
                var val=this.value;
                var url="{{route('ajax.get_preferred_curriculum')}}";
                url=url+"/?id="+val;
                // alert(url);
                $.ajax({
                    url:url,
                    method:"get",
                    success:function (response) {
                        $('#preferred_curriculum_section').html(response);
                    }
                });
            });

            $('#preferred_medium_id').on('change',function () {
                var val=this.value;
                var url="{{route('ajax.get_class')}}";
                url=url+"/?id="+val;
                // alert(url);
                $.ajax({
                    url:url,
                    method:"get",
                    success:function (response) {
                        $('#class_id_section').html(response);
                    }
                });
            });

            $('#class_id_section').on('change',function () {
                var val=this.value;
                var url="{{route('ajax.get_subject')}}";
                url=url+"/?id="+val;
                // alert(url);
                $.ajax({
                    url:url,
                    method:"get",
                    success:function (response) {
                        $('#subject_id_section').html(response);
                    }
                });
            });

            $('#preferred_service_area_id').on('change',function () {
                var val=this.value;
                var url="{{route('service_area.get_location')}}";
                url=url+"/?id="+val;
                // alert(url);
                $.ajax({
                    url:url,
                    method:"get",
                    success:function (response) {
                        $('#preferred_location_id').html(response);
                    }
                });
            });



            setTimeout(function() {
                $('#alert_message').fadeOut('fast');
            }, 5000);

            $('#service_area').select2();
            $('#university_id').select2();
            $('#school_id').select2();
            $('#class_id_section').select2();
            $('#subject_id_section').select2();
            $('#day').select2();
            $('#time').select2({
                maximumSelectionLength: 2

            });
            $('#preferred_location_id').select2({
                maximumSelectionLength: 3
            });

        });

    </script>
@endsection