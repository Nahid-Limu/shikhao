<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UniversityController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $university=DB::table('university')->get();
        return view('settings.university.index',compact('university'));

    }

    public function show($id){
        $university=DB::table('university')->where('id','=',$id)->first();
        return view('settings.university.show',compact('university'));

    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ]);

        $now=Carbon::now()->toDateTimeString();

        DB::table('university')->insert([
            'name'=>$request->name,
            'remarks'=>$request->remarks,
            'status'=>1,
            'created_by'=>Auth::user()->id,
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        Session::flash('success','University Record Inserted');
        return redirect()->back();
    }

    public function edit($id){
        $university=DB::table('university')->where('id','=',$id)->first();
        return view('settings.university.edit',compact('university'));
    }

    public function update($id, Request $request){
        $this->validate($request,[
            'name'=>'required',
            'status'=>'required',
        ]);

        DB::table('university')->where('id','=',$id)->update([
            'name'=>$request->name,
            'remarks'=>$request->remarks,
            'status'=>$request->status,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        Session::flash('success','University Information Updated');
        return redirect()->back();

    }
}
