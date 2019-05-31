<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class GradePointController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $grade_point=DB::table('grade_point')->get();
        return view('settings.grade_point.index',compact('grade_point'));

    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ]);
        $now=Carbon::now()->toDateTimeString();
        DB::table('grade_point')->insert([
            'name'=>$request->name,
            'status'=>1,
            'created_by'=>Auth::user()->id,
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        Session::flash('success','Grade Added');
        return redirect()->back();
    }

    public function edit($id){
        $grade=DB::table('grade_point')->where('id','=',$id)->first();
        return view('settings.grade_point.edit',compact('grade'));
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'name'=>'required',
            'status'=>'required',
        ]);
        DB::table('grade_point')->where('id','=',$id)->update([
            'name'=>$request->name,
            'status'=>$request->status,
            'updated_at'=>Carbon::now()->toDateTimeString(),

        ]);
        Session::flash('success','Grade Information Updated');
        return redirect()->back();
    }

    public function show($id){
        $grade=DB::table('grade_point')->where('id','=',$id)->first();
        return view('settings.grade_point.show',compact('grade'));
    }
}
