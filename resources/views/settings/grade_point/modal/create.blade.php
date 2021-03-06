<div class="modal fade" id="createGradePoint" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-header-primary-label"><strong>Add Grade</strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>

            </div>
            <div id="create-new" class="modal-body">
                {!! Form::open(['method'=>'POST', 'action'=>'GradePointController@store']) !!}
                <div class="form-group">
                    {!! Form::label('name','Grade:') !!}<span class='require'>*</span>
                    {!! Form::text('name',null,['class'=>'form-control','required'=>'', 'placeholder'=>'Enter Grade']) !!}

                </div>

                {{--<div class="form-group">--}}
                    {{--{!! Form::label('point','Grade Point:') !!}<span class='require'>*</span>--}}
                    {{--{!! Form::text('point',null,['class'=>'form-control','required'=>'', 'placeholder'=>'Enter Grade Point']) !!}--}}

                {{--</div>--}}

                <div style="border-top:0px;" class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-blue">Save</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>