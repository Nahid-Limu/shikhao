<style>
    .modal-body-custom .form-group{
        padding: 13px;
        padding-bottom: 0px;
    }
</style>

<div class="modal-body-custom">
    <div class="form-group">
        {!! Form::label('name','Class:') !!}
        {!! Form::text('name',$class_table->name,['class'=>'form-control', 'readonly'=>'']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name','Medium:') !!}
        {!! Form::text('name',$class_table->medium_name,['class'=>'form-control', 'readonly'=>'']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('remarks','Remarks:') !!}
        {!! Form::textarea('remarks',$class_table->remarks,['class'=>'form-control','rows'=>'3','readonly'=>'']) !!}

    </div>

    <div class="form-group">
        <label for="status">Status:</label>
        <select name="status" readonly="" class="form-control select2-selection--single" id="status">
            @if($class_table->status===1)
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

