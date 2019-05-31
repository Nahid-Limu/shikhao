<div class="modal fade" id="createOccupation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-header-primary-label"><strong>Add Occupation</strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>

            </div>
            <div id="create-new" class="modal-body">
                {!! Form::open(['method'=>'POST', 'action'=>'OccupationController@store']) !!}
                <div class="form-group">
                    {!! Form::label('name','Occupation:') !!}<span class='require'>*</span>
                    {!! Form::text('name',null,['class'=>'form-control','required'=>'', 'placeholder'=>'Enter Occupation Name']) !!}

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