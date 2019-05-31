    <style>
            .form-group{
                padding: 30px;
            }
    </style>
{{--  Edit Personal Information  --}}
<div class="modal fade-scale" id="editJobInfo" role="dialog">
    <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content animated fadeInUp">
    <form action="{{route('job.update', base64_encode($job_post->id))}}" method="get">
            @csrf
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
            <i class="fa fa-edit"></i> Personal Information</h4>
        </div>
        
        <div class="modal-body">
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="class_id" class="pull-left"><h5>Select Class</h5></label>
                        <div>
                            <select id="class_id" name="class_id"  class="form-control ">
                                <option value="{{$job_post->class_id}}">{{$job_post->class_name}}</option>
                                @foreach ($class as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="subject_id" class="pull-left"><h5>Select Subject</h5></label>
                        <div >
                            <select id="subject_id" name="subject_id[]" multiple="multiple"  class="form-control " style="width: 100%">
                                
                                 @foreach($subject as $s)
                                 <?php
                                 $k=0;
                                 ?>
                                    @foreach ($job_preferred_subject as $ps)
                                        @if ($s->id == $ps->subject_id)
                                            <option selected value="{{$s->id}}">{{$s->name}}</option>
                                            <?php
                                            $k=1;
                                            ?>
                                        @endif
                                    @endforeach
                                    
                                    @if($k==0)
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endif
                                
                                @endforeach 
                            </select>
                            <b class="form-text text-danger pull-left" id="subjectError"></b>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="medium_id" class="pull-left"><h5>Select Medium</h5></label>
                        <div>
                            <select id="medium_id" name="medium_id"  class="form-control ">
                                <option value="{{$job_post->medium_id}}">{{$job_post->medium_name}}</option>
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
                                <option value="{{$job_post->curriculum_id}}">{{$job_post->curriculum_name}}</option>
                                
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="" class="pull-left"><h5>Salary</h5></label>
                        <div>
                            <input type="number" id="salary" name="salary" value="{{$job_post->salary}}" class="form-control ">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label for="" class="" style="display: block;"><h5 style="text-align: left;">Can Travel</h5></label>
                        </div>
                        <div class="form-control">
                            <label class="radio-inline pull-left"><input type="radio" id="can_travel" name="can_travel" value="1" @if ($job_post->can_travel == 1) checked @endif>Yes</label>
                            <label class="radio-inline pull-left"><input type="radio" id="can_travel" name="can_travel" value="0" @if ($job_post->can_travel == 0) checked @endif>No</label> 
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                        <div class="col-md-6">
                            <label for="school_id" class="pull-left"><h5>Preferred Institute</h5></label>
                            <div>
                                <select id="school_id" name="school_id"  class="form-control">
                                    <option value="{{$job_post->school_id}}">{{$job_post->school_name}}</option>
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
                                    <option value="{{$job_post->university_id}}">{{$job_post->university_name}}</option>
                                    @foreach ($university as $u)
                                    <option value="{{$u->id}}">{{$u->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="col-md-6">
                                <label for="joining_date" class="pull-left"><h5>Joining Date</h5></label>
                                
                                <div>
                                    <input type="date" class="form-control" id="joining_date" name="joining_date" value = "{{ $job_post->joining_date}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="" class="" style="display: block;"><h5 style="text-align: left;">Preferred Gender</h5></label>
                                </div>
                                <div class="form-control">
                                    <label class="radio-inline pull-left"><input type="radio" id="gender" name="gender" value="1" @if ($job_post->preferred_gender == 1) checked @endif>Male</label>
                                    <label class="radio-inline pull-left"><input type="radio" id="gender" name="gender" value="2" @if ($job_post->preferred_gender == 2) checked @endif>Female</label>
                                    <label class="radio-inline pull-left"><input type="radio" id="gender" name="gender" value="0" @if ($job_post->preferred_gender == 0) checked @endif>Other</label>
                                </div>
                            </div>
                            
                        </div>
                    <div class="form-group">
                        <div class="col-md-6">
                                <label for="school_id" class="pull-left"><h5>Preferred Day</h5></label>
                                <div>
                                    <select id="day" name="day[]" style="width: 100%" multiple class="form-control">
                                        
                                        @foreach($all_days as $ad)
                                            <?php
                                                $k=0;
                                            ?>
                                            @foreach($days as $d)

                                                @if($ad['id']==$d->day)
                                                    <option  selected value="{{$ad['id']}}">{{$ad['day_name']}}</option>
                                                    <?php
                                                        $k=1;
                                                    ?>
                                                @endif

                                            @endforeach
                                            @if($k==0)
                                                <option value="{{$ad['id']}}">{{$ad['day_name']}}</option>
                                            @endif
                                        @endforeach
                                        
                                    </select>
                                </div>
                        </div>
                        <div class="col-md-6">
                                <label for="school_id" class="pull-left"><h5>Preferred Time</h5></label>
                                <div>
                                    <select id="time" name="time[]" style="width: 100%" multiple class="form-control">
                                        @foreach($all_times as $ad)
                                            <?php
                                            $k=0;
                                            ?>
                                            @foreach($time as $t)
            
                                                @if($ad['id']==$t->time_id)
                                                    <option  selected value="{{$ad['id']}}">{{$ad['time_name']}}</option>
                                                    <?php
                                                    $k=1;
                                                    ?>
                                                @endif
            
                                            @endforeach
                                            @if($k==0)
                                                <option value="{{$ad['id']}}">{{$ad['time_name']}}</option>
                                            @endif
                                        @endforeach    
                                    </select>
                                </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="days_per_week" class="pull-left"><h5>Days Per Week</h5></label>
                            <div >
                                <input type="number" class="form-control" id="days_per_week" name="days_per_week" value="{{$job_post->days_per_week}}">
                            </div>
                        </div>                  
                                            
                    </div>
                    <div class="form-group" style="margin-bottom: 50px;">
                        <div class="col-md-6">
                            <label for="" class="pull-left"><h5>Location In Details</h5></label>
                            <div>
                                <textarea class="form-control" name="location_details" id="location_details" cols="9" rows="3">{{$job_post->location_details}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="pull-left"><h5>Special Requirement</h5></label>
                            <div>
                                <textarea class="form-control" name="special_requirement" id="special_requirement" cols="9" rows="3">{{$job_post->special_requirement}}</textarea>
                            </div>
                        </div>                  
                                            
                    </div>
                    
        </div>
        
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info" ><i class="fa fa-refresh"></i> Update</button>
        </div>
    </form>
    </div>
    
    </div>
</div>