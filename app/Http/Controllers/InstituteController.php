<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class InstituteController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $mediums=DB::table('medium')
            ->where('medium_status','=',1)
            ->get(['id','name']);
        $institute=DB::table('institute')
            ->leftJoin('medium','institute.medium_id','=','medium.id')
            ->select('institute.*','medium.name as medium_name')
            ->get();
//        $medium=DB::table('medium')->
        return view('settings.institute.index',compact('institute','mediums'));

    }

    public function show($id){
        $institute=DB::table('institute')
            ->leftJoin('medium','institute.medium_id','=','medium.id')
            ->where('institute.id','=',$id)
            ->select('institute.*','medium.name as medium_name')
            ->first();
        return view('settings.institute.show',compact('institute'));

    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'medium_id'=>'required',
        ]);

        $now=Carbon::now()->toDateTimeString();

        DB::table('institute')->insert([
            'name'=>$request->name,
            'medium_id'=>$request->medium_id,
            'remarks'=>$request->remarks,
            'status'=>1,
            'created_by'=>Auth::user()->id,
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        Session::flash('success','School Record Inserted');
        return redirect()->back();
//        return $request->all();
    }

    public function edit($id){
        $medium=DB::table('medium')
            ->where('medium_status','=',1)
            ->get(['id','name']);
        $institute=DB::table('institute')->where('id','=',$id)->first();
        return view('settings.institute.edit',compact('institute','medium'));
    }

    public function update($id, Request $request){
        $this->validate($request,[
            'name'=>'required',
            'medium_id'=>'required',
            'status'=>'required',
        ]);

        DB::table('institute')->where('id','=',$id)->update([
            'name'=>$request->name,
            'medium_id'=>$request->medium_id,
            'remarks'=>$request->remarks,
            'status'=>$request->status,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        Session::flash('success','School Information Updated');
        return redirect()->back();

    }

    public function get_institute(Request $request){
        $id=$request->id;
        $institute=DB::table('institute')->where('status','=',1)->where('medium_id','=',$id)->orWhereNull('medium_id')->get(['id','name']);
        return view('ajax.get_institute',compact('institute'));
    }
}
