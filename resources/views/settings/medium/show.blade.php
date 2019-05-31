<style>
    .modal-body-custom .form-group{
        padding: 13px;
        padding-bottom: 0px;
    }
</style>

<div class="modal-body-custom">
    <div class="form-group">
        {!! Form::label('name','Medium Name:') !!}
        {!! Form::text('name',$medium->name,['class'=>'form-control','readonly'=>'true', 'required'=>'']) !!}
    </div>

    <div class="form-group">
        <label for="status">Status:</label>
        <select name="status" readonly="true" class="form-control select2-selection--single" id="status">
            <option value="1" @if($medium->medium_status===1) selected @endif>Active</option>
            <option value="0" @if($medium->medium_status===0) selected @endif>Inactive</option>
        </select>
    </div>

    <div style="border-top: 0px;" class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
    </div>
</div>

