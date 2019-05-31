<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SemesterYearController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $semester_year=DB::table('semester_year')->get();
        return view('settings.semester_year.index',compact('semester_year'));

    }

    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required',
        ]);
        $now=Carbon::now()->toDateTimeString();
        DB::table('semester_year')->insert([
            'name'=>$request->name,
            'created_by'=>Auth::user()->id,
            'status'=>1,
            'created_at'=>$now,
            'updated_at'=>$now,

        ]);
        Session::flash('success',"Semester Year Inserted Successfully");
        return redirect()->back();

    }

    public function edit($id){
        $semester_year=DB::table('semester_year')->where('id','=',$id)->first();
        return view('settings.semester_year.edit',compact('semester_year'));
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'name'=>'required',
            'status'=>'required',
        ]);
        DB::table('semester_year')->where('id','=',$id)->update([
            'name'=>$request->name,
            'status'=>$request->status,
            'updated_at'=>Carbon::now()->toDateTimeString(),

        ]);
        Session::flash('success','Semester Year Information Updated');
        return redirect()->back();
//        return $request->all();
    }

    public function show($id){
        $semester_year=DB::table('semester_year')->where('id','=',$id)->first();
        return view('settings.semester_year.show',compact('semester_year'));
    }
}
