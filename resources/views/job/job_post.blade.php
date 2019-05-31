@extends('layouts.master')
@section('title', 'Create Job')
@section('content')
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Create Job</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/')}}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href="#">Job</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Create Job</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <div class="page-content">
        <style>
        /*custom font*/
        @import url(https://fonts.googleapis.com/css?family=Montserrat);

        /*basic reset*/
        * {
            margin: 0;
            padding: 0;
        }
        
        html {
            height: 100%;
            background: #f0f2f5; /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #f0f2f5, #2a0845); /* Chrome 10-25, Safari 5.1-6 */
        }

        body {
            font-family: montserrat, arial, verdana;
            background: transparent;
        }

        /*form styles*/
        #msform {
            text-align: center;
            position: relative;
            margin-top: 30px;
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
            padding: 20px 30px;
            box-sizing: border-box;
            width: 80%;
            margin: 0 10%;

            /*stacking fieldsets above each other*/
            position: relative;
        }

        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        /*inputs*/
        #msform textarea {
            {{-- padding: 15px; --}}
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 13px;
        }

       #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #ee0979;
            outline-width: 0;
            transition: All 0.5s ease-in;
            -webkit-transition: All 0.5s ease-in;
            -moz-transition: All 0.5s ease-in;
            -o-transition: All 0.5s ease-in;
        }

        /*buttons*/
        #msform .action-button {
            width: 100px;
            background: #ee0979;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button:hover, #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #ee0979;
        }

        #msform .action-button-previous {
            width: 100px;
            background: #C5C5F1;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button-previous:hover, #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #C5C5F1;
        }

        /*headings*/
        .fs-title {
            font-size: 18px;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
            letter-spacing: 2px;
            font-weight: bold;
        }

        .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
        }

        #progressbar li {
            list-style-type: none;
            color: #e9662c;
            text-transform: uppercase;
            font-size: 9px;
            width: 33.33%;
            float: left;
            position: relative;
            letter-spacing: 1px;
        }

        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 24px;
            height: 24px;
            line-height: 26px;
            display: block;
            font-size: 12px;
            color: #333;
            background: white;
            border-radius: 25px;
            margin: 0 auto 10px auto;
        }

        /*progressbar connectors*/
        #progressbar li:after {
            content: '';
            width: 90%;
            height: 2px;
            background: white;
            position: absolute;
            left: -44%;
            top: 9px;
            z-index: 1; /*put it behind the numbers*/
        }

        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }

        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        #progressbar li.active:before, #progressbar li.active:after {
            background: #ee0979;
            color: white;
        }


        /* Not relevant to this form */
        .dme_link {
            margin-top: 30px;
            text-align: center;
        }
        .dme_link a {
            background: #FFF;
            font-weight: bold;
            color: #ee0979;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 5px 25px;
            font-size: 12px;
        }

        .dme_link a:hover, .dme_link a:focus {
            background: #C5C5F1;
            text-decoration: none;
        }

        h5{
            font-weight: 500;
        }

        .form-group{
           padding: 30px;
        }
          
    </style>
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
        
        
    <!-- MultiStep Form -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form id="msform" action="{{ route('job.post') }}" method="POST">
                    @csrf

                    <!-- progressbar -->
                    <ul id="progressbar" class="col-md-offset-3">
                        <li class="active">Personal Details</li>
                        <li>PREFERRED DETAILS</li>
                        {{-- <li>Account Setup</li> --}}
                    </ul>
                    <!-- fieldsets -->
                    <fieldset class="other">
                        <h2 class="fs-title">Personal Details</h2>
                        <h3 class="fs-subtitle">Tell us something more about you</h3>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="student_id" class="pull-left"><h5>Select Student<span class='require'>*</span></h5></label>
                                        <div>
                                            <select id="student_id" name="student_id"  class="form-control ">
                                                <option value="">Select Student</option>
                                                @foreach ($student as $s)
                                                <option value="{{$s->id}}">{{$s->name}}</option>
                                                @endforeach
                                            </select>
                                            <b class="form-text text-danger pull-left" id="studentError"></b>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="class_id" class="pull-left"><h5>Select Class<span class='require'>*</span></h5></label>
                                        <div>
                                            <select id="class_id" name="class_id"  class="form-control ">
                                                <option value="">Select Class</option>
                                                @foreach ($class as $c)
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                            <b class="form-text text-danger pull-left" id="classError"></b>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="medium_id" class="pull-left"><h5>Select Medium<span class='require'>*</span></h5></label>
                                        <div>
                                            <select id="medium_id" name="medium_id"  class="form-control ">
                                                <option value="">Select Medium</option>
                                                @foreach ($medium as $m)
                                                <option value="{{$m->id}}">{{$m->name}}</option>
                                                @endforeach
                                            </select>
                                            <b class="form-text text-danger pull-left" id="mediumError"></b>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="curriculum_id" class="pull-left"><h5>Select Curriculum</h5></label>
                                        <div>
                                            <select id="curriculum_id" name="curriculum_id"  class="form-control">
                                                <option value="">Select Medium First</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                     
                                    <div class="col-md-6">
                                        <label for="subject_id" class="pull-left"><h5>Select Subject<span class='require'>*</span></h5></label>
                                        <div >
                                            <select id="subject_id" name="subject_id[]" multiple="multiple"  class="form-control ">
                                                {{-- <option value="">All</option> --}}
                                                @foreach($subject as $s)
                                                <option value="{{$s->id}}">{{$s->name}}</option>
                                                @endforeach
                                            </select>
                                            <b class="form-text text-danger pull-left" id="subjectError"></b>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="days_per_week" class="pull-left"><h5>Days Per Week</h5></label>
                                        <div >
                                            <input type="number" class="form-control" id="days_per_week" name="days_per_week">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="" class="pull-left"><h5>Salary<span class='require'>*</span></h5></label>
                                        <div>
                                            <input type="number" id="salary" name="salary"   class="form-control ">
                                            <b class="form-text text-danger pull-left" id="salaryError"></b>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <label for="" class="" style="display: block;"><h5 style="text-align: left;">Can Travel</h5></label>
                                        </div>
                                        <div class="form-control">
                                            <label class="radio-inline pull-left"><input type="radio" id="can_travel" name="can_travel" value="1" checked>Yes</label>
                                            <label class="radio-inline pull-left"><input type="radio" id="can_travel" name="can_travel" value="0">No</label> 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="service_area_id" class="pull-left"><h5>Select Service Area<span class='require'>*</span></h5></label>
                                        <div>
                                            <select id="service_area_id" name="service_area_id"  class="form-control ">
                                                <option value="">Select Service Area</option>
                                                @foreach ($service_area as $area)
                                                <option value="{{$area->id}}">{{$area->name}}</option>
                                                @endforeach
                                            </select>
                                            <b class="form-text text-danger pull-left" id="areaError"></b>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="location_id" class="pull-left"><h5>Select Location<span class='require'>*</span></h5></label>
                                        <div>
                                            <select id="location_id" name="location_id"  class="form-control ">
                                                <option value="">Select Service Area First</option>
                                                
                                            </select>
                                            <b class="form-text text-danger pull-left" id="locationError"></b>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="" class="pull-left"><h5>Location In Details</h5></label>
                                        <div>
                                            <textarea name="location_details" id="location_details" cols="9" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                             
                             


                        <input type="button" name="next" class="next action-button" value="Next"/>
                    </fieldset>
                    {{-- <fieldset>
                        <h2 class="fs-title">Social Profiles</h2>
                        <h5 class="fs-subtitle">Your presence on the social network</h5>
                        <input type="text" name="twitter" placeholder="Twitter"/>
                        <input type="text" name="facebook" placeholder="Facebook"/>
                        <input type="text" name="gplus" placeholder="Google Plus"/>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                        <input type="button" name="next" class="next action-button" value="Next"/>
                    </fieldset> --}}
                    <fieldset id="f2">
                        <h2 class="fs-title">Preferred Details</h2>
                        <h5 class="fs-subtitle">Fill in your credentials</h5>
                        
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="school_id" class="pull-left"><h5>Preferred Institute</h5></label>
                                <div>
                                    <select id="school_id" name="school_id"  class="form-control">
                                        <option value="">Select School</option>
                                        @foreach ($school as $s)
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="university_id" class="pull-left"><h5>Preferred University</h5></label>
                                <div>
                                    <select id="university_id" name="university_id"  class="form-control">
                                        <option value="">Select University</option>
                                        @foreach ($university as $u)
                                        <option value="{{$u->id}}">{{$u->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                <div class="col-md-6">
                                    <label for="university_id" class="pull-left"><h5>Joining Date</h5></label>
                                    
                                    <div>
                                        <input type="date" class="form-control" id="joining_date" name="joining_date"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label for="" class="" style="display: block;"><h5 style="text-align: left;">Preferred Gender</h5></label>
                                    </div>
                                    <div class="form-control">
                                        <label class="radio-inline pull-left"><input type="radio" id="gender" name="gender" value="1" checked>Male</label>
                                        <label class="radio-inline pull-left"><input type="radio" id="gender" name="gender" value="2">Female</label>
                                        <label class="radio-inline pull-left"><input type="radio" id="gender" name="gender" value="0">Other</label>
                                    </div>
                                </div>
                                
                            </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                    <label for="school_id" class="pull-left"><h5>Preferred Day</h5></label>
                                    <div>
                                        <select id="day" name="day[]" style="width: 100%" multiple class="form-control">
                                            {{--<option value="0">All</option>--}}
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
                            <div class="col-md-6">
                                    <label for="school_id" class="pull-left"><h5>Preferred Time</h5></label>
                                    <div>
                                        <select id="time" name="time[]" style="width: 100%" multiple class="form-control">
                                            {{--<option value="0">All</option>--}}
                                            <option value="1">Any Time</option>
                                                <option value="2">Morning</option>
                                                <option value="3">Noon</option>
                                                <option value="4">Evening</option>
                                            </select>
                                    </div>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="" class="pull-left"><h5>Special Requirement</h5></label>
                                <div>
                                    <textarea name="special_requirement" id="special_requirement" cols="9" rows="3"></textarea>
                                </div>
                            </div>
                            
                        </div>

                            <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                            <input type="submit" name="submit" class="submit action-button" value="Post Job"/>
                           
                    </fieldset>
                </form>
                <!-- link to designify.me code snippets -->
                
                <!-- /.link to designify.me code snippets -->
            </div>
        </div>
        <!-- /.MultiStep Form -->
            
    </div>


@endsection

@section('extra_js')
    <script>
        
        
    
        

        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        

        $(".next").click(function(e){
            
            e.preventDefault();
            
            $("#studentError").html('');
            $("#mediumError").html('');
            $("#classError").html('');
            $("#subjectError").html('');      
            $("#areaError").html('');
            $("#locationError").html('');
            $("#salaryError").html('');

            if( $("#student_id").val() == '' ){
                $("#student_id").css('border-color', '#a94442');
                $("#studentError").html('* Student required');
                return false;
            }
            else if( $("#medium_id").val() == '' ){
                $("#medium_id").css('border-color', '#a94442');
                $("#mediumError").html('* Medium required');
                return false;
            }
            else if( $("#class_id").val() == '' ){
                $("#class_id").css('border-color', '#a94442');
                $("#classError").html('* Medium required');
                return false;
            }
            else if( $("#subject_id").val() == null ){
                $("#subject_id").siblings(".select2-container").css({"border": "1px solid #a94442", "border-radius": "4px"});
                $("#subjectError").html('* Subject required');
                return false;
            }
            else if( $("#salary").val() == '' ){
                $("#salary").css('border-color', '#a94442');
                $("#salaryError").html('* Salary required');
                return false;
            }
            else if( $("#service_area_id").val() == '' ){
                $("#service_area_id").css('border-color', '#a94442');
                $("#areaError").html('* Service Area required');
                return false;
            }
            else if( $("#location_id").val() == '' ){
                $("#location_id").css('border-color', '#a94442');
                $("#locationError").html('* Service Area required');
                return false;
            }
            
            else{
                if(animating) return false;
                    animating = true;
                    
                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();
                    
                    //activate next step on progressbar using the index of next_fs
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                    
                    //show the next fieldset
                    next_fs.show(); 
                    //hide the current fieldset with style
                    current_fs.animate({opacity: 0}, {
                        step: function(now, mx) {
                            //as the opacity of current_fs reduces to 0 - stored in "now"
                            //1. scale current_fs down to 80%
                            scale = 1 - (1 - now) * 0.2;
                            //2. bring next_fs from the right(50%)
                            //left = (now * 50)+"%";
                            //3. increase opacity of next_fs to 1 as it moves in
                            opacity = 1 - now;
                            current_fs.css({'transform': 'scale('+scale+')','position': 'absolute'});
                            next_fs.css({'left': left, 'opacity': opacity});
                        }, 
                        duration: 800, 
                        complete: function(){
                            current_fs.hide();
                            animating = false;
                        }, 
                        //this comes from the custom easing plugin
                        easing: 'easeInOutBack'
                    });
            }
            
           
            
        });

        $(".previous").click(function(){
            if(animating) return false;
            animating = true;
            
            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();
            
            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
            
            //show the previous fieldset
            previous_fs.show(); 
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    //left = ((1-now) * 50)+"%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({'left': left});
                    previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
                }, 
                duration: 800, 
                complete: function(){
                    current_fs.hide();
                    animating = false;
                }, 
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        {{--  $(".submit").click(function(){
            return false;
        })  --}}

        //get curriculum
        $('#medium_id').on('change',function () {
            var val=this.value;
            var url="{{route('ajax.get_curriculum')}}";
            url=url+"/?id="+val;
            // alert(url);
            $.ajax({
                url:url,
                method:"get",
                success:function (response) {
                    $('#curriculum_id').html(response);
                }
            });
        });

        //get location
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

        $('#subject_id').select2({
            placeholder: "Select Subject"  
        });
        
        $('#day').select2({
            placeholder: "Select Day"  
        });
        $('#time').select2({
            placeholder: "Select Time"  
        });
        {{-- $('#datepicker').datepicker({
            uiLibrary: 'bootstrap'
          }); --}}
    </script>
@endsection