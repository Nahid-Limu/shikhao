<style>
    .modal-body-custom .form-group{
        padding: 13px;
        padding-bottom: 0px;
    }
</style>


<div class="modal-body-custom">
    <div class="form-group">
        {!! Form::label('name','Area Name:') !!}
        {!! Form::text('name',$service_area->name,['class'=>'form-control','readonly'=>'', 'required'=>'']) !!}

    </div>

    <div class="form-group">
        {!! Form::label('remarks','Remarks:') !!}
        {!! Form::text('remarks',$service_area->remarks,['class'=>'form-control', 'readonly'=>'']) !!}

    </div>

    <div class="form-group">
        <label for="status">Status:</label><span class='require'>*</span>
        <select name="status" readonly="" class="form-control select2-selection--single" id="status">
            @if($service_area->status===1)
                <option value="1"  selected>Active</option>
            @else
                <option value="0" selected>Inactive</option>
            @endif
        </select>
    </div>

    <div style="border-top:0px;" class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>
