<section id="applicant_list">
@foreach($applicants as $a)
    <?php
    $sub='';
    $subjects=\Illuminate\Support\Facades\DB::table('tutoring_subject')
        ->leftJoin('subject','tutoring_subject.subject_id','=','subject.id')
        ->where('tutor_id','=',$a->tutor_id)
        ->get(['subject.name as subject_name']);
    foreach ($subjects as $s){
        $sub.=$s->subject_name.", ";
    }
    $sub=rtrim($sub,', ');
    $tim='';
    $time=\Illuminate\Support\Facades\DB::table('tutoring_time')
        ->where('tutoring_time.tutor_id','=',$a->tutor_id)
        ->get();
    foreach ($time as $t){
        if($t->time_id==1){
            $tim.="Anytime, ";
        }
        elseif ($t->time_id==2){
            $tim.="Morning, ";
        }
        elseif ($t->time_id==3){
            $tim.="Noon, ";
        }
        elseif ($t->time_id==4){
            $tim.="Evening, ";
        }
    }
    $tim=rtrim($tim,', ');
    $tu_lo='';
    $locations=\Illuminate\Support\Facades\DB::table('tutoring_location')
        ->leftJoin('location','tutoring_location.location_id','=','location.id')
        ->where('tutoring_location.tutor_id','=',$a->tutor_id)
        ->get(['location.name as location_name']);
    foreach ($locations as $l){
        $tu_lo.=$l->location_name.", ";
    }
    $tu_lo=rtrim($tu_lo,', ');

    ?>
    <div class="col-md-12 tutor-list-col-body">
        <div class="col-md-4 mb_2">
            <div class="tutor-list-col-img">
                <img class="img-responsive" src="@if($a->image!=null)
                {{asset("Tutor_Images/".$a->image)}}
                @else
                {{asset("Tutor_Images/profile_image.jpeg")}}
                @endif" >
                <h5><b> {{$a->tutor_name}}</b></h5>

            </div>



        </div>
        <div class="col-md-8 ">
            <div class="row">
                <div class="col-md-6">
                    <ul class="job-details-heading-ul">
                        <li><h5> Medium: <b>{{$a->medium_name}}</b></h5></li>
                        <li><h5> Curriculum: <b> {{$a->curriculum_name}}</b></h5></li>
                        {{--                                            <li><h5><b>Class : </b>Class-10</h5></li>--}}
                        <li> <h5> Gender :
                                @if($a->gender ==1)
                                    <b>Male</b>
                                @elseif($a->gender ==2)
                                    <b>Female</b>
                                @else
                                    <b>Other</b>
                                @endif
                            </h5></li>

                        <li> <h5>Days per week : <b>{{$a->number_days_week }} day/days</b> </h5></li>
                        <li><h5> Subjects : <b>{{$sub}}</b></h5></li>
                        <li><h5> Tutoring Location : <b>{{$tu_lo}}</b></h5></li>

                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="job-details-heading-ul">


                        <li><h5>Tutoring Time : <b>{{$tim}}</b></h5></li>
                        <li><h5>Location :<b>{{$a->location_name}}</b></h5></li>
                        <li><h5>Applied on : @if($a->created_at!=null)
                                    <b>{{\Carbon\Carbon::parse($a->created_at)->format('d M Y')}}</b>
                                @endif
                            </h5></li>
                        <li> <h5>
                                <a href="{{route('tutor.show',base64_encode($a->tutor_id))}}" target="_blank" class="btn btn-blue">  View Details</a>
                                <a class="btn btn-blue"> <i class="fa fa-check"></i> Approved</a>
                            </h5>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endforeach


</section>
<div class="col-md-12">
    <div class="col-md-5" style="margin: 0 auto;">

    </div>
    {{ $applicants->appends(['job_post_id'=>$request->job_post_id,'medium_id' => "$request->medium_id",'university_id'=>"$request->university_id",'location_id'=>"$request->location_id", 'class_id'=>"$request->class_id", 'service_area_id'=>"$request->service_area_id",'gender'=>"$request->gender"])->render()}}


</div>

<script>

    $('.page-link').click(function (event) {
        event.preventDefault();
        if($(this).parent('.active').length){
            return false;
        }
        var url=$(this).attr('href');
        $.ajax({
            url:url,
            method: "get",
            success:function(response){
                $("#applicant_list").html(response);
                $('html,body').animate({
                        scrollTop: $("#applicant_list").offset().top},
                    'slow');
            }
        });

    });
</script>