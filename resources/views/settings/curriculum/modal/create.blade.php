<div class="modal fade" id="createMedium" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-header-primary-label"><strong>Add New Curriculum</strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>

            </div>
            <div id="create-new" class="modal-body">
                {!! Form::open(['method'=>'POST', 'action'=>'CurriculumController@store']) !!}
                <div class="form-group">
                    {!! Form::label('curriculum_name','Curriculum Name:') !!}<span class='require'>*</span>
                    {!! Form::text('curriculum_name',null,['class'=>'form-control','required'=>'', 'placeholder'=>'Enter Curriculum Name']) !!}

                </div>

                <div class="form-group">
                    <label for="medium_id">Medium:</label><span class='require'>*</span>
                    <select name="medium_id" required class="form-control select2-selection--single" id="medium_id">
                        @foreach($mediums as $m)
                            <option value="{{$m->id}}">{{$m->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    {!! Form::label('remarks','Remarks:') !!}
                    {!! Form::text('remarks',null,['class'=>'form-control', 'placeholder'=>'Enter Remarks']) !!}

                </div>

                <div style="border-top:0px;" class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-blue">Save</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>