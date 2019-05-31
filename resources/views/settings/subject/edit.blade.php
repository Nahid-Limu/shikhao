<style>
    .modal-body-custom .form-group{
        padding: 13px;
        padding-bottom: 0px;
    }
</style>


{{Form::open(['method'=>'PATCH','action'=>['SubjectController@update',$subject->id]])}}
<div class="modal-body-custom">
    <div class="form-group">
        {!! Form::label('name','Subject Name:') !!}<span class='require'>*</span>
        {!! Form::text('name',$subject->name,['class'=>'form-control aa', 'required'=>'', 'placeholder'=>'Enter Subject Name']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('subject_code','Subject Code:') !!}
        {!! Form::text('subject_code',$subject->subject_code,['class'=>'form-control', 'placeholder'=>'Enter Subject Code']) !!}
    </div>

    {{--<div class="form-group">--}}
        {{--<label for="class_id">Class:</label><span class='require'>*</span><br>--}}
        {{--<select style="width: 100%" name="class_id" required class="form-control select2-selection--single select-search">--}}
            {{--<option value="">Select Class</option>--}}
            {{--@foreach($class as $c)--}}
                {{--<option @if($subject->class_id==$c->id) selected @endif value="{{$c->id}}">{{$c->name." (".$c->medium_name.")"}}</option>--}}
            {{--@endforeach--}}
        {{--</select>--}}
    {{--</div>--}}

    <div class="form-group">
        {!! Form::label('remarks','Remarks:') !!}
        {!! Form::textarea('remarks',$subject->remarks,['class'=>'form-control','rows'=>'3', 'placeholder'=>'Enter Remarks']) !!}
    </div>

    <div class="form-group">
        <label for="status">Status:</label><span class='require'>*</span>
        <select name="status" class="form-control select2-selection--single" id="status">
            <option value="1" @if($subject->status===1) selected @endif>Active</option>
            <option value="0" @if($subject->status===0) selected @endif>Inactive</option>
        </select>
    </div>

    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
        <button type="Submit" class="btn btn-darkish">UPDATE</button>
    </div>
</div>


{{Form::close()}}


<script>
    $(document).read(function () {
        $('.select-search').select2();

    })
</script>
