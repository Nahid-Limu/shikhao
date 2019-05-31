<style>
    .modal-body-custom .form-group{
        padding: 13px;
        padding-bottom: 0px;
    }
</style>


{{Form::open(['method'=>'PATCH','action'=>['InstituteController@update',$institute->id]])}}
<div class="modal-body-custom">
    <div class="form-group">
        {!! Form::label('name','School Name:') !!}<span class='require'>*</span>
        {!! Form::text('name',$institute->name,['class'=>'form-control', 'required'=>'', 'placeholder'=>'Enter Institute Name']) !!}
    </div>

    <div class="form-group">
        <label for="service_area_id">Medium:</label><span class='require'>*</span><br>
        <select style="width: 100%" name="medium_id" required class="form-control select2-selection--single select-search">
            <option value="">Select Medium</option>
            @foreach($medium as $m)
                <option @if($institute->medium_id==$m->id) selected @endif value="{{$m->id}}">{{$m->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('remarks','Remarks:') !!}
        {!! Form::textarea('remarks',$institute->remarks,['class'=>'form-control','rows'=>'3', 'placeholder'=>'Enter Remarks']) !!}
    </div>

    <div class="form-group">
        <label for="status">Status:</label><span class='require'>*</span>
        <select name="status" class="form-control select2-selection--single" id="status">
            <option value="1" @if($institute->status===1) selected @endif>Active</option>
            <option value="0" @if($institute->status===0) selected @endif>Inactive</option>
        </select>
    </div>

    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
        <button type="Submit" class="btn btn-darkish">UPDATE</button>
    </div>
</div>


{{Form::close()}}
