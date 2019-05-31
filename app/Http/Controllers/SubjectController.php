<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SubjectController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $class=DB::table('class_table')
            ->leftJoin('medium','class_table.medium_id','=','medium.id')
            ->where('class_table.status','=',1)
            ->get(['class_table.id','class_table.name','medium.name as medium_name']);

        $subject=DB::table('subject')
            ->select(['subject.*'])
            ->get();
        return view('settings.subject.index',compact('subject','class'));

    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ]);
        $now=Carbon::now()->toDateTimeString();
        DB::table('subject')->insert([
            'name'=>$request->name,
            'subject_code'=>$request->subject_code,
            'remarks'=>$request->remarks,
            'status'=>1,
            'created_by'=>Auth::user()->id,
            'created_at'=>$now,
            'updated_at'=>$now,

        ]);

        Session::flash('success','Subject Added Successfully');
        return redirect()->back();

    }

    public function edit($id){
        $class=DB::table('class_table')
            ->leftJoin('medium','class_table.medium_id','=','medium.id')
            ->where('class_table.status','=',1)
            ->get(['class_table.id','class_table.name','medium.name as medium_name']);
        $subject=DB::table('subject')->where('id','=',$id)->first();
        return view('settings.subject.edit',compact('subject','class'));

    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'name'=>'required',
            'status'=>'required',
        ]);

        DB::table('subject')->where('id','=',$id)->update([
            'name'=>$request->name,
            'subject_code'=>$request->subject_code,
            'status'=>$request->status,
            'remarks'=>$request->remarks,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        Session::flash('success','Subject Data Updated');
        return redirect()->back();
    }

    public function show($id){
        $subject=DB::table('subject')
            ->select(['subject.*'])
            ->where('subject.id','=',$id)
            ->first();
        return view('settings.subject.show',compact('subject'));
    }

    public function get_subject(Request $request){
        $id=$request->id;
        $subject=DB::table('subject')->where('status','=',1)->where('class_id','=',$id)->get(['id','name']);
        return view('ajax.get_subject',compact('subject'));
    }
}
