{{--<select id="class_id" required name="class_id" class="form-control">--}}
    <option value="">Select Class</option>
    @foreach($class as $c)
        <option value="{{$c->id}}">{{$c->name}}</option>
    @endforeach
{{--</select>--}}

