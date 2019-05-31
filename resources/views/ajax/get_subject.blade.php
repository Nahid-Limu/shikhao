<option value="0">All Subject</option>
@foreach($subject as $c)
    <option value="{{$c->id}}">{{$c->name}}</option>
@endforeach