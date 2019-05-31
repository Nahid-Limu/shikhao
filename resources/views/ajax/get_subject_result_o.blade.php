<div class="col-md-6 bottom-padding-12 OID-{{$thsc->id}}">
    <div class="form-group">
        <label for="" class="text-center col-md-4 col-sm-4 col-xs-5 control-label">{{$thsc->subject_name}} : </label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <p class="text-center">{{ $thsc->grade_point_name }} &nbsp</p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
            <p class="text-center"><a class="o_delete" href="{{route('o_subject_result.delete',base64_encode($thsc->id))}}"><i class="fa fa-trash-o" aria-hidden="true" style="color:red"></i></a> &nbsp</p>

        </div>

    </div>
</div>