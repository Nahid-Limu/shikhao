<style>
    .modal-body-custom .form-group{
        padding: 13px;
        padding-bottom: 0px;
    }
</style>


{{Form::open(['method'=>'PATCH','action'=>['LocationController@update',$location->id]])}}
<div class="modal-body-custom">
    <div class="form-group">
        {!! Form::label('name','Name:') !!}<span class='require'>*</span>
        {!! Form::text('name',$location->name,['class'=>'form-control', 'required'=>'', 'placeholder'=>'Enter Location Name']) !!}
    </div>

    <div class="form-group">
        <label for="service_area_id">Service Area:</label><span class='require'>*</span><br>
        <select style="width: 100%" name="service_area_id" required class="form-control select2-selection--single select-search" id="service_area_id">
            @foreach($service_area as $sa)
                <option @if($location->service_area_id==$sa->id) selected @endif value="{{$sa->id}}">{{$sa->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('longitude','Longitude:') !!}
        {!! Form::text('longitude',$location->longitude,['class'=>'form-control', 'placeholder'=>'Enter Longitude']) !!}

    </div>

    <div class="form-group">
        {!! Form::label('latitude','Latitude:') !!}
        {!! Form::text('latitude',$location->latitude,['class'=>'form-control', 'placeholder'=>'Enter Remarks']) !!}

    </div>

    <div class="form-group">
        <label for="status">Status:</label><span class='require'>*</span>
        <select name="status" class="form-control select2-selection--single" id="status">
            <option value="1" @if($location->status===1) selected @endif>Active</option>
            <option value="0" @if($location->status===0) selected @endif>Inactive</option>
        </select>
    </div>

    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
        <button type="Submit" class="btn btn-darkish">UPDATE</button>
    </div>
</div>



{{Form::close()}}

<script type="text/javascript">

    $(document).ready(function() {
        $('.select-search').select2();
    });
</script>


