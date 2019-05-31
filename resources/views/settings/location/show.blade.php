<style>
    .modal-body-custom .form-group{
        padding: 13px;
        padding-bottom: 0px;
    }
</style>

<div class="modal-body-custom">
    <div class="form-group">
        {!! Form::label('name','Name:') !!}<span class='require'>*</span>
        {!! Form::text('name',$location->name,['class'=>'form-control', 'readonly'=>'', 'required'=>'', 'placeholder'=>'Location Name']) !!}
    </div>

    <div class="form-group">
        <label for="service_area_id">Service Area:</label><span class='require'>*</span><br>
        <select readonly="" name="service_area_id" required class="form-control select2-selection--single select-search" id="service_area_id">
            <option selected value="{{$location->service_area_id}}">{{$location->service_area_name}}</option>
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('longitude','Longitude:') !!}
        {!! Form::text('longitude',$location->longitude,['class'=>'form-control', 'readonly'=>'']) !!}

    </div>

    <div class="form-group">
        {!! Form::label('latitude','Latitude:') !!}
        {!! Form::text('latitude',$location->latitude,['class'=>'form-control', 'readonly'=>'']) !!}

    </div>

    <div class="form-group">
        <label for="status">Status:</label><span class='require'>*</span>
        <select readonly="" name="status" class="form-control select2-selection--single" id="status">
            @if($location->status===1)
                <option value="1" selected >Active</option>
            @else
                <option value="0" selected >Inactive</option>
            @endif
        </select>
    </div>

    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
    </div>
</div>


