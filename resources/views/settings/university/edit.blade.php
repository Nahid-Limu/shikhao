<style>
    .modal-body-custom .form-group{
        padding: 13px;
        padding-bottom: 0px;
    }
</style>


{{Form::open(['method'=>'PATCH','action'=>['UniversityController@update',$university->id]])}}
<div class="modal-body-custom">
    <div class="form-group">
        {!! Form::label('name','University Name:') !!}<span class='require'>*</span>
        {!! Form::text('name',$university->name,['class'=>'form-control', 'required'=>'', 'placeholder'=>'Enter University Name']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('remarks','Remarks:') !!}
        {!! Form::textarea('remarks',$university->remarks,['class'=>'form-control','rows'=>'3', 'placeholder'=>'Enter Remarks']) !!}

    </div>

    <div class="form-group">
        <label for="status">Status:</label><span class='require'>*</span>
        <select name="status" class="form-control select2-selection--single" id="status">
            <option value="1" @if($university->status===1) selected @endif>Active</option>
            <option value="0" @if($university->status===0) selected @endif>Inactive</option>
        </select>
    </div>

    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
        <button type="Submit" class="btn btn-darkish">UPDATE</button>
    </div>
</div>


{{Form::close()}}
