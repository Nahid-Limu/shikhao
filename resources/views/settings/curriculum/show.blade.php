<style>
    .modal-body-custom .form-group{
        padding: 13px;
        padding-bottom: 0px;
    }
</style>

<div class="modal-body-custom">
    <div class="form-group">
        {!! Form::label('curriculum_name','Curriculum Name:') !!}
        {!! Form::text('curriculum_name',$curriculum->curriculum_name,['class'=>'form-control', 'readonly'=>'']) !!}
    </div>

    <div class="form-group">
        <label for="medium_id">Medium:</label>
        <select name="medium_id" readonly="" class="form-control select2-selection--single" id="medium_id">
                <option selected value="{{$curriculum->medium_id}}">{{$curriculum->medium_name}}</option>
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('remarks','Remarks:') !!}
        {!! Form::text('remarks',$curriculum->remarks,['class'=>'form-control','readonly'=>'']) !!}

    </div>

    <div class="form-group">
        <label for="status">Status:</label>
        <select name="status" readonly="" class="form-control select2-selection--single" id="status">
            @if($curriculum->curriculum_status===1)
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

