{{--<select id="class_id" required name="class_id" class="form-control">--}}
    <option value="">Select Institute</option>
    @foreach($institute as $i)
        <option value="{{$i->id}}">{{$i->name}}</option>
    @endforeach
{{--</select>--}}

