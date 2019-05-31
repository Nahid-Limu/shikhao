<style>
    .modal-body-custom .form-group{
        padding: 13px;
        padding-bottom: 0px;
    }
</style>


{{Form::open(['method'=>'PATCH','action'=>['ClassTableController@update',$class_table->id]])}}
<div class="modal-body-custom">
    <div class="form-group">
        {!! Form::label('name','Class Name:') !!}<span class='require'>*</span>
        {!! Form::text('name',$class_table->name,['class'=>'form-control', 'required'=>'', 'placeholder'=>'Enter Class Name']) !!}
    </div>

    <div class="form-group">
        <label for="service_area_id">Medium:</label><br>
        <select style="width: 100%" name="medium_id" class="form-control select2-selection--single select-search">
            <option value="">Select Medium</option>
            @foreach($medium as $m)
                <option @if($class_table->medium_id==$m->id) selected @endif value="{{$m->id}}">{{$m->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('remarks','Remarks:') !!}
        {!! Form::textarea('remarks',$class_table->remarks,['class'=>'form-control','rows'=>'3', 'placeholder'=>'Enter Remarks']) !!}
    </div>

    <div class="form-group">
        <label for="status">Status:</label><span class='require'>*</span>
        <select name="status" class="form-control select2-selection--single" id="status">
            <option value="1" @if($class_table->status===1) selected @endif>Active</option>
            <option value="0" @if($class_table->status===0) selected @endif>Inactive</option>
        </select>
    </div>

    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
        <button type="Submit" class="btn btn-darkish">UPDATE</button>
    </div>
</div>


{{Form::close()}}
