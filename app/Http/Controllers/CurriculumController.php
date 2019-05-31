<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CurriculumController extends Controller
{
    public function __construct()
    {

    }
    public function index(){
        $mediums=DB::table('medium')->where('medium_status','=',1)->get(['id','name']);
        $curriculum=DB::table('bangla_english_curriculum')
            ->leftJoin('medium','bangla_english_curriculum.medium_id','=','medium.id')
            ->select('bangla_english_curriculum.*','medium.name as medium_name')
            ->get();
        return view('settings.curriculum.index',compact('curriculum','mediums'));
    }

    public function store(Request $request){
        $now=Carbon::now('Asia/Dhaka')->toDateTimeString();
        DB::table('bangla_english_curriculum')->insert([
            'curriculum_name'=>$request->curriculum_name,
            'medium_id'=>$request->medium_id,
            'remarks'=>$request->remarks,
            'curriculum_status'=>1,
            'created_by'=>Auth::user()->id,
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        Session::flash('success','Curriculum Added');
        return redirect()->back();
//        return $request->all();
    }

    public function edit($id){
        $medium=DB::table('medium')->where('medium_status','=',1)->get(['id','name']);
        $curriculum=DB::table('bangla_english_curriculum')->where('id','=',$id)->first();
        return view('settings.curriculum.edit',compact('curriculum','medium'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'curriculum_name'=>'required',
            'medium_id'=>'required',
            'status'=>'required',
        ]);

        DB::table('bangla_english_curriculum')->where('id','=',$id)->update([
            'curriculum_name'=>$request->curriculum_name,
            'medium_id'=>$request->medium_id,
            'remarks'=>$request->remarks,
            'curriculum_status'=>$request->status,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        Session::flash('success','Curriculum updated successfully');
        return redirect()->back();

    }

    public function show($id){
        $curriculum=DB::table('bangla_english_curriculum')
            ->leftJoin('medium','bangla_english_curriculum.medium_id','=','medium.id')
            ->where('bangla_english_curriculum.id','=',$id)
            ->select('bangla_english_curriculum.*','medium.name as medium_name')
            ->first();
        return view('settings.curriculum.show',compact('curriculum'));

    }

    public function get_curriculum(Request $request){
        $id=$request->id;
        $curriculum=DB::table('bangla_english_curriculum')->where('curriculum_status','=',1)->where('medium_id','=',$id)->get(['id','curriculum_name']);
        return view('ajax.get_curriculum',compact('curriculum'));
    }

    public function get_preferred_curriculum(Request $request){
        $id=$request->id;
        $curriculum=DB::table('bangla_english_curriculum')->where('curriculum_status','=',1)->where('medium_id','=',$id)->get(['id','curriculum_name']);
        return view('ajax.get_preferred_curriculum',compact('curriculum'));
    }
}
