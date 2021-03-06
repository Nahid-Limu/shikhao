<style>
    .modal-body-custom .form-group{
        padding: 13px;
        padding-bottom: 0px;
    }
</style>


{{Form::open(['method'=>'PATCH','action'=>['DepartmentController@update',$department->id]])}}
<div class="modal-body-custom">
    <div class="form-group">
        {!! Form::label('name','Department Name:') !!}<span class='require'>*</span>
        {!! Form::text('name',$department->name,['class'=>'form-control', 'required'=>'', 'placeholder'=>'Enter Department Name']) !!}
    </div>

    <div class="form-group">
        <label for="status">Status:</label><span class='require'>*</span>
        <select name="status" class="form-control select2-selection--single" id="status">
            <option value="1" @if($department->status===1) selected @endif>Active</option>
            <option value="0" @if($department->status===0) selected @endif>Inactive</option>
        </select>
    </div>

    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
        <button type="Submit" class="btn btn-darkish">UPDATE</button>
    </div>
</div>


{{Form::close()}}
