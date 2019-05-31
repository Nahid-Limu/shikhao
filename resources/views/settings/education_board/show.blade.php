<style>
    .modal-body-custom .form-group{
        padding: 13px;
        padding-bottom: 0px;
    }
</style>

<div class="modal-body-custom">
    <div class="form-group">
        {!! Form::label('name','Education Board Name:') !!}
        {!! Form::text('name',$education_board->name,['class'=>'form-control', 'readonly'=>'']) !!}
    </div>

    <div class="form-group">
        <label for="status">Status:</label>
        <select name="status" readonly="" class="form-control select2-selection--single" id="status">
            @if($education_board->status===1)
                <option value="1" selected>Active</option>
            @else
                <option value="0" selected>Inactive</option>
            @endif
        </select>
    </div>

    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
    </div>
</div>

