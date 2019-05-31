<style>
    .modal-body-custom .form-group{
        padding: 13px;
        padding-bottom: 0px;
    }
</style>


{{Form::open(['method'=>'PATCH','action'=>['EducationBoardController@update',$education_board->id]])}}
<div class="modal-body-custom">
    <div class="form-group">
        {!! Form::label('name','Education Board Name:') !!}<span class='require'>*</span>
        {!! Form::text('name',$education_board->name,['class'=>'form-control', 'required'=>'', 'placeholder'=>'Enter Education Board Name']) !!}
    </div>

    <div class="form-group">
        <label for="status">Status:</label><span class='require'>*</span>
        <select name="status" class="form-control select2-selection--single" id="status">
            <option value="1" @if($education_board->status===1) selected @endif>Active</option>
            <option value="0" @if($education_board->status===0) selected @endif>Inactive</option>
        </select>
    </div>

    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
        <button type="Submit" class="btn btn-darkish">UPDATE</button>
    </div>
</div>


{{Form::close()}}
