<style>
    .modal-body-custom .form-group{
        padding: 13px;
        padding-bottom: 0px;
    }
</style>


{!! Form::open(['method'=>'PATCH', 'action'=>['ServiceAreaController@update',$service_area->id]]) !!}
<div class="modal-body-custom">
    <div class="form-group">
        {!! Form::label('name','Area Name:') !!}<span class='require'>*</span>
        {!! Form::text('name',$service_area->name,['class'=>'form-control','required'=>'', 'placeholder'=>'Enter Service Area Name']) !!}

    </div>

    <div class="form-group">
        {!! Form::label('remarks','Remarks:') !!}
        {!! Form::text('remarks',$service_area->remarks,['class'=>'form-control', 'placeholder'=>'Enter Remarks']) !!}

    </div>

    <div class="form-group">
        <label for="status">Status:</label><span class='require'>*</span>
        <select name="status" class="form-control select2-selection--single" id="status">
            <option value="1" @if($service_area->status===1) selected @endif>Active</option>
            <option value="0" @if($service_area->status===0) selected @endif>Inactive</option>
        </select>
    </div>

    <div style="border-top:0px;" class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-blue">Update</button>
    </div>
</div>
{!! Form::close() !!}
