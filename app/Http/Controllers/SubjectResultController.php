<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SubjectResultController extends Controller
{
    public function __construct()
    {

    }

    public function store_hsc(Request $request){
        $this->validate($request,[
            'subject_id'=>'required',
            'tutor_id'=>'required',
            'grade_point_id'=>'required',
        ]);
        $check=DB::table('tutor_hsc_subject_result')
            ->where('tutor_id','=',$request->tutor_id)
            ->where('subject_id','=',$request->subject_id)
            ->count();
        if($check>0){
            return "duplicate";
        }
        $id=DB::table('tutor_hsc_subject_result')->insertGetId([
            'tutor_id'=>$request->tutor_id,
            'subject_id'=>$request->subject_id,
            'grade_point_id'=>$request->grade_point_id,
            'created_by'=>Auth::user()->id,
            'created_at'=>Carbon::now()->toDateString(),
            'updated_at'=>Carbon::now()->toDateString(),
        ]);
        $thsc=DB::table('tutor_hsc_subject_result')
            ->leftJoin('subject','tutor_hsc_subject_result.subject_id','=','subject.id')
            ->leftJoin('grade_point','tutor_hsc_subject_result.grade_point_id','=','grade_point.id')
            ->where('tutor_hsc_subject_result.id','=',$id)
            ->select(['subject.name as subject_name','grade_point.name as grade_point_name','tutor_hsc_subject_result.id'])
            ->first();
        return view('ajax.get_subject_result',compact('thsc'));
    }

    public function store_a_level(Request $request){
        $this->validate($request,[
            'subject_id'=>'required',
            'tutor_id'=>'required',
            'grade_point_id'=>'required',
        ]);
        $check=DB::table('tutora_subject_result')
            ->where('tutor_id','=',$request->tutor_id)
            ->where('subject_id','=',$request->subject_id)
            ->count();
        if($check>0){
            return "duplicate";
        }
        $id=DB::table('tutora_subject_result')->insertGetId([
            'tutor_id'=>$request->tutor_id,
            'subject_id'=>$request->subject_id,
            'grade_point_id'=>$request->grade_point_id,
            'created_by'=>Auth::user()->id,
            'created_at'=>Carbon::now()->toDateString(),
            'updated_at'=>Carbon::now()->toDateString(),
        ]);
        $thsc=DB::table('tutora_subject_result')
            ->leftJoin('subject','tutora_subject_result.subject_id','=','subject.id')
            ->leftJoin('grade_point','tutora_subject_result.grade_point_id','=','grade_point.id')
            ->where('tutora_subject_result.id','=',$id)
            ->select(['subject.name as subject_name','grade_point.name as grade_point_name','tutora_subject_result.id'])
            ->first();
        return view('ajax.get_subject_result_a',compact('thsc'));

    }

    public function store_o_level(Request $request){
        $this->validate($request,[
            'subject_id'=>'required',
            'tutor_id'=>'required',
            'grade_point_id'=>'required',
        ]);
        $check=DB::table('tutoro_subject_result')
            ->where('tutor_id','=',$request->tutor_id)
            ->where('subject_id','=',$request->subject_id)
            ->count();
        if($check>0){
            return "duplicate";
        }
        $id=DB::table('tutoro_subject_result')->insertGetId([
            'tutor_id'=>$request->tutor_id,
            'subject_id'=>$request->subject_id,
            'grade_point_id'=>$request->grade_point_id,
            'created_by'=>Auth::user()->id,
            'created_at'=>Carbon::now()->toDateString(),
            'updated_at'=>Carbon::now()->toDateString(),
        ]);
        $thsc=DB::table('tutoro_subject_result')
            ->leftJoin('subject','tutoro_subject_result.subject_id','=','subject.id')
            ->leftJoin('grade_point','tutoro_subject_result.grade_point_id','=','grade_point.id')
            ->where('tutoro_subject_result.id','=',$id)
            ->select(['subject.name as subject_name','grade_point.name as grade_point_name','tutoro_subject_result.id'])
            ->first();
        return view('ajax.get_subject_result_o',compact('thsc'));

    }

    public function delete_hsc($id){
        $id=base64_decode($id);
        DB::table('tutor_hsc_subject_result')->where('id','=',$id)->delete();
        return $id;

    }

    public function delete_a($id){
        $id=base64_decode($id);
        DB::table('tutora_subject_result')->where('id','=',$id)->delete();
        return $id;

    }

    public function delete_o($id){
        $id=base64_decode($id);
        DB::table('tutoro_subject_result')->where('id','=',$id)->delete();
        return $id;

    }
}
