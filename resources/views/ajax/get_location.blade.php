<option value="">Select Location</option>
@foreach($location as $l)
    <option value="{{$l->id}}">{{$l->name}}</option>
@endforeach
