<div class="modal" id="addResult" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog animated pulse" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-header-primary-label"><strong>Add Subject And Result</strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>

            </div>
            <div id="create-new" class="modal-body">
                {!! Form::open(['method'=>'POST', 'action'=>'SubjectResultController@store_hsc','id'=>'store_hsc']) !!}
                <div class="form-group">
                    {!! Form::hidden('tutor_id',$tutor->id) !!}
                    {!! Form::label('subject_id','Subject Name:') !!}<span class='require'>*</span>
                    <select style="width: 100%" name="subject_id" required class="combobox form-control select2-selection--single select-search">
                            <option selected value="">Select Subject</option>
                        @foreach($subject as $s)
                            <option value="{{$s->id}}">{{$s->name}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label for="grade_point_id">Result:</label><span class='require'>*</span><br>
                    <select style="width: 100%" name="grade_point_id" required class="combobox form-control select2-selection--single select-search">
                        <option selected value="">Select Result</option>
                        @foreach($grade_points as $gp)
                            <option value="{{$gp->id}}">{{$gp->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div style="border-top:0px;" class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-blue btn-save">Save</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>
