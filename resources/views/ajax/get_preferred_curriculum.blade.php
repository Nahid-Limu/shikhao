<select id="curriculum" name="preferred_curriculum_id" class="form-control">
    <option value="">Select Curriculum</option>
    @foreach($curriculum as $c)
        <option value="{{$c->id}}">{{$c->curriculum_name}}</option>
    @endforeach
</select>