<div class="modal fade" id="createSchool" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-header-primary-label"><strong>Add School</strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>

            </div>
            <div id="create-new" class="modal-body">
                {!! Form::open(['method'=>'POST', 'action'=>'InstituteController@store']) !!}
                <div class="form-group">
                    {!! Form::label('name','School Name:') !!}<span class='require'>*</span>
                    {!! Form::text('name',null,['class'=>'form-control','required'=>'', 'placeholder'=>'Enter School Name']) !!}

                </div>

                <div class="form-group">
                    <label for="medium_id">Medium:</label><span class='require'>*</span><br>
                    <select style="width: 100%" name="medium_id" required class="form-control select2-selection--single select-search">
                        <option value="">Select Medium</option>
                        @foreach($mediums as $m)
                            <option value="{{$m->id}}">{{$m->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    {!! Form::label('remarks','Remarks:') !!}
                    {!! Form::textarea('remarks',null,['class'=>'form-control','rows'=>'3', 'placeholder'=>'Enter Remarks']) !!}

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