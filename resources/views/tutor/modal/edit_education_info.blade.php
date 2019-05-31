<div class="modal" id="editEducationInfo" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content row animated bounceIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <i class="fa fa-edit"></i><b> Personal Information</b></h4>
            </div>
            {!! Form::open(['method'=>'patch','action'=>['TutorController@storeEducationInfo',$tutor->id]]) !!}
            <div class="modal-body custom-modal">
                <div class="form-group">
                    <label for="school_id" class="col-md-4 control-label">School/College <span class='require'>*</span></label>

                    <div class="col-md-8">
                        <select id="school_id" name="school_id" style="width: 100%" required class="form-control combobox">
                            @foreach($school as $s)
                                <option @if($tutor->school_id==$s->id) selected @endif value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <br/>
                <div class="form-group">
                    <label for="medium_id" class="col-md-4 control-label">Medium <span class='require'>*</span></label>

                    <div class="col-md-8">
                        <select name="medium_id" required class="form-control medium_id">
                            <option value="">Select Medium</option>
                            @foreach($medium as $m)
                                <option @if($tutor->medium_id==$m->id) selected @endif value="{{$m->id}}">{{$m->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <br/>
                <div class="form-group"><label for="english_bangla_curriculum_id" class="col-md-4 control-label">Curriculum </label>

                    <div class="col-md-8 curriculum_section">
                        <div class="input-icon">
                            <select id="english_bangla_curriculum_id" name="english_bangla_curriculum_id" class="form-control">
                                <option value="{{$tutor->english_bangla_curriculum_id}}">{{$tutor->curriculum_name}}</option>
                            </select>

                        </div>
                    </div>
                </div>
                <br/>
                <div class="form-group"><label for="ssc_result" class="col-md-4 control-label">SSC Result</label>

                    <div class="col-md-8">
                        <input id="ssc_result" name="ssc_result" value="{{$tutor->ssc_result}}" type="text" placeholder="Enter SSC GPA/Division" class="form-control"/>
                    </div>
                </div>

                <br/>
                <div class="form-group"><label for="hsc_result" class="col-md-4 control-label">HSC Result</label>

                    <div class="col-md-8">
                        <input id="ssc_result" name="hsc_result" value="{{$tutor->hsc_result}}" type="text" placeholder="Enter HSC GPA/Division" class="form-control"/>
                    </div>
                </div>

                <br/>

                <div class="form-group"><label for="university_id" class="col-md-4 control-label">University </label>

                    <div class="col-md-8">
                        <select id="university_id" name="university_id" style="width: 100%" class="form-control">
                            <option value="">Select University</option>
                            @foreach($university as $u)
                                <option @if($tutor->university_id==$u->id) selected @endif value="{{$u->id}}">{{$u->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <br/>

                <div class="form-group"><label for="department_id" class="col-md-4 control-label">Department </label>

                    <div class="col-md-8">
                        <select id="department_id" name="department_id" class="form-control">
                            <option value="">Select Department</option>
                            @foreach($department as $d)
                                <option @if($tutor->department_id==$d->id) selected @endif value="{{$d->id}}">{{$d->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br/>
                <div class="form-group"><label for="semester_year_id" class="col-md-4 control-label">Year/Semester</label>

                    <div class="col-md-8">
                        <select id="semester_year_id" name="semester_year_id" class="form-control">
                            <option value="">Select Year Semester</option>
                            @foreach($ys as $u)
                                <option @if($tutor->semester_year_id==$u->id) selected @endif value="{{$u->id}}">{{$u->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group"><label for="university_student_id" class="col-md-4 control-label">University ID</label>

                    <div class="col-md-8">
                        <input id="university_student_id" value="{{$tutor->university_student_id}}" name="university_student_id" type="text" placeholder="University ID Number" class="form-control"/>
                    </div>
                </div>
                <br/>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-info"><i class="fa fa-refresh"></i> Update</button>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>