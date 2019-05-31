<div class="modal" id="editPersonalInfo" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content row animated bounceIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <i class="fa fa-edit"></i><b> Personal Information</b></h4>
            </div>
            {!! Form::open(['method'=>'patch','action'=>['TutorController@storePersonalInfo',$tutor->id]]) !!}
            <div class="modal-body custom-modal">
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Name <span class='require'>*</span></label>
                    <div class="col-md-8">
                        <input id="name" name="name" type="text" value="{{$tutor->name}}" required class="form-control"/>
                    </div>

                </div>

                <br/>
                <div class="form-group">
                    <label for="facebook_username" class="col-md-4 control-label">Facebook Username </label>
                    <div class="col-md-8">
                        <input id="facebook_username" name="facebook_username" type="text" value="{{$tutor->facebook_username}}" class="form-control"/></div>
                </div>

                <br/>
                <div class="form-group">
                    <label for="contact_number" class="col-md-4 control-label">Phone <span class='require'>*</span></label>
                    <div class="col-md-8">
                        <input id="contact_number" name="contact_number" type="tel" value="{{$tutor->contact_number}}" required placeholder="Phone Number" class="form-control"/></div>
                </div>
                <br/>
                <div class="form-group"><label for="gender" class="col-md-4 control-label">Gender <span class='require'>*</span></label>

                    <div class="col-md-8">
                        <select id="gender" name="gender" required class="form-control">
                            {{--                                @if ($student->gender == 1)--}}
                            <option value="1" @if($tutor->gender==1) selected @endif >Male</option>
                            <option value="2" @if($tutor->gender==2) selected @endif>Female</option>
                            <option value="0" @if($tutor->gender==0) selected @endif>Others</option>

                        </select>
                    </div>
                </div>

                <br/>
                <div class="form-group">
                    <label for="occupation_id" class="col-md-4 control-label">Occupation <span class='require'>*</span></label>

                    <div class="col-md-8"><select id="occupational_status_id" required name="occupational_status_id" class="form-control">
                            <option value="">Select Occupation</option>
                            @foreach($occupation as $o)
                                <option @if($tutor->occupational_status_id==$o->id) selected @endif value="{{$o->id}}">{{$o->name}}</option>
                            @endforeach
                        </select></div>
                </div>

                <br/>

                <div class="form-group"><label for="dob" class="col-md-4 control-label">Date Of Birth</label>

                    <div class="col-md-8"><input id="dob" name="dob" value="{{$tutor->dob}}" type="date" class="form-control"/></div>
                </div>


                <br/>

                <div class="form-group"><label for="fathers_name" class="col-md-4 control-label">Father's Name</label>

                    <div class="col-md-8"><input id="fathers_name" name="fathers_name" value="{{$tutor->fathers_name}}" type="text" placeholder="Father's Name" class="form-control"/></div>
                </div>
                <br/>
                <div class="form-group"><label for="mothers_name" class="col-md-4 control-label">Mother's Name</label>

                    <div class="col-md-8"><input id="mothers_name" name="mothers_name" type="text" value="{{$tutor->mothers_name}}" placeholder="Mother's Name" class="form-control"/></div>
                </div>
                <br>
                <div class="form-group"><label for="parents_number" class="col-md-4 control-label">Parents's Number</label>

                    <div class="col-md-8"><input id="parents_number" name="parents_number" value="{{$tutor->parents_number}}" type="text" placeholder="Parents's Number" class="form-control"/></div>
                </div>
                <br/>
                <div class="form-group"><label for="nationalId" class="col-md-4 control-label">National ID</label>

                    <div class="col-md-8"><input id="nationalId" name="nationalId" value="{{$tutor->nationalId}}" type="text" placeholder="National ID Number" class="form-control"/></div>
                </div>
                <br/>
{{--                <div class="form-group"><label for="minimum_salary" class="col-md-4 control-label">Salary (TAKA)  <i class="fa fa-info-circle" data-toggle="tooltip" title="Minimum Salary." aria-hidden="true"></i></label>--}}

{{--                    <div class="col-md-8"><input id="minimum_salary" name="minimum_salary" value="{{$tutor->minimum_salary}}" type="number" placeholder="Minimum Salary" class="form-control"/></div>--}}
{{--                </div>--}}
{{--                <br/>--}}
{{--                <div class="form-group"><label for="number_days_week" class="col-md-4 control-label">Tutoring Days <i class="fa fa-info-circle" data-toggle="tooltip" title="Number of days want to tutor in a week. " aria-hidden="true"></i>--}}
{{--                    </label>--}}

{{--                    <div class="col-md-8"><input id="number_days_week" name="number_days_week" value="{{$tutor->number_days_week}} Days" type="text" placeholder="Tutoring Days In a Week" class="form-control"/></div>--}}
{{--                </div>--}}
{{--                <br/>--}}


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-info"><i class="fa fa-refresh"></i> Update</button>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>