<div class="modal fade" id="createLocation" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                {!! Form::open(['method'=>'POST', 'action'=>'LocationController@store']) !!}
                <div class="form-group">
                    {!! Form::label('name','Location:') !!}<span class='require'>*</span>
                    {!! Form::text('name',null,['class'=>'form-control','required'=>'', 'placeholder'=>'Enter Location Name']) !!}

                </div>

                <div class="form-group">
                    <label for="service_area_id">Service Area:</label><span class='require'>*</span><br>
                    <select style="width: 100%" name="service_area_id" required class="form-control select2-selection--single select-search">
                        @foreach($service_area as $sa)
                            <option value="{{$sa->id}}">{{$sa->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    {!! Form::label('longitude','Longitude:') !!}
                    {!! Form::text('longitude',null,['class'=>'form-control', 'placeholder'=>'Enter Longitude']) !!}

                </div>

                <div class="form-group">
                    {!! Form::label('latitude','Latitude:') !!}
                    {!! Form::text('latitude',null,['class'=>'form-control', 'placeholder'=>'Enter Remarks']) !!}

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
