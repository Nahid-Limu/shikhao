<div class="modal" id="editLocation" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content row animated bounceIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <i class="fa fa-edit"></i><b> Address Info</b></h4>
            </div>
            {!! Form::open(['method'=>'patch','action'=>['TutorController@storeLocation',$tutor->id]]) !!}
            <div class="modal-body custom-modal">
                <div class="form-group"><label for="service_area" class="col-md-4 control-label">Service Area <span class='require'>*</span></label>
                    <div class="col-md-8">
                        <select id="service_area" name="service_area_id" required class="form-control">
                            <option value="">Select Area</option>
                            @foreach($service_area as $area)
                                <option @if($tutor->service_area_id==$area->id) selected @endif value="{{$area->id}}">{{$area->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <br/>
                <div class="form-group"><label for="location_id" class="col-md-4 control-label">Location <span class='require'>*</span></label>

                    <div class="col-md-8">
                        <select id="location_id" required name="location_id" class="form-control">
                            <option value="{{$tutor->location_id}}">{{$tutor->location_name}}</option>
                        </select>

                    </div>
                </div>

                <br/>
                <div class="form-group"><label for="permanent_address" class="col-md-4 control-label">Permanent Address</label>

                    <div class="col-md-8"><textarea id="permanent_address" name="permanent_address" type="text" placeholder="Permanent Address" class="form-control">{{$tutor->permanent_address}}</textarea></div>
                </div>
                <br/>
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