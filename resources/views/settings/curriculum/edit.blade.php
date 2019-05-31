<style>
    .modal-body-custom .form-group{
        padding: 13px;
        padding-bottom: 0px;
    }
</style>


{{Form::open(['method'=>'PATCH','action'=>['CurriculumController@update',$curriculum->id]])}}
<div class="modal-body-custom">
    <div class="form-group">
        {!! Form::label('curriculum_name','Curriculum Name:') !!}<span class='require'>*</span>
        {!! Form::text('curriculum_name',$curriculum->curriculum_name,['class'=>'form-control', 'required'=>'', 'placeholder'=>'Enter Curriculum Name']) !!}
    </div>

    <div class="form-group">
        <label for="medium_id">Medium:</label><span class='require'>*</span>
        <select name="medium_id" required class="form-control select2-selection--single" id="medium_id">
            @foreach($medium as $m)
                <option @if($curriculum->medium_id==$m->id) selected @endif value="{{$m->id}}">{{$m->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('remarks','Remarks:') !!}
        {!! Form::text('remarks',$curriculum->remarks,['class'=>'form-control', 'placeholder'=>'Enter Remarks']) !!}

    </div>

    <div class="form-group">
        <label for="status">Status:</label><span class='require'>*</span>
        <select name="status" class="form-control select2-selection--single" id="status">
            <option value="1" @if($curriculum->curriculum_status===1) selected @endif>Active</option>
            <option value="0" @if($curriculum->curriculum_status===0) selected @endif>Inactive</option>
        </select>
    </div>

    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
        <button type="Submit" class="btn btn-darkish">UPDATE</button>
    </div>
</div>


{{Form::close()}}
