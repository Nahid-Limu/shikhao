<style>
    .modal-body-custom .form-group{
        padding: 13px;
        padding-bottom: 0px;
    }
</style>


{{Form::open(['method'=>'PATCH','action'=>['SemesterYearController@update',$semester_year->id]])}}
<div class="modal-body-custom">
    <div class="form-group">
        {!! Form::label('name','Name:') !!}<span class='require'>*</span>
        {!! Form::text('name',$semester_year->name,['class'=>'form-control', 'required'=>'', 'placeholder'=>'Enter Semester Year Name']) !!}
    </div>

    <div class="form-group">
        <label for="status">Status:</label><span class='require'>*</span>
        <select name="status" class="form-control select2-selection--single" id="status">
            <option value="1" @if($semester_year->status===1) selected @endif>Active</option>
            <option value="0" @if($semester_year->status===0) selected @endif>Inactive</option>
        </select>
    </div>

    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
        <button type="Submit" class="btn btn-darkish">UPDATE</button>
    </div>
</div>


{{Form::close()}}
