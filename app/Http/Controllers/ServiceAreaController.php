<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ServiceAreaController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $service_area=DB::table('service_area')->get();
        return view('settings.service_area.index',compact('service_area'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ]);
        $now=Carbon::now()->toDateTimeString();
        DB::table('service_area')->insert([
            'name'=>$request->name,
            'remarks'=>$request->remarks,
            'status'=>1,
            'created_by'=>Auth::user()->id,
            'created_at'=>$now,
            'updated_at'=>$now,

            
        ]);

        Session::flash('success','Service Area Added Successfully');
        return redirect()->back();
    }

    public function edit($id){
        $service_area=DB::table('service_area')->where('id','=',$id)->first();
        return view('settings.service_area.edit',compact('service_area'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'status'=>'required',
        ]);
        $now=Carbon::now()->toDateTimeString();
        DB::table('service_area')->where('id','=',$id)->update([
            'name'=>$request->name,
            'status'=>$request->status,
            'remarks'=>$request->remarks,
            'updated_at'=>$now,
        ]);

        Session::flash('success','Service Area Updated');
        return redirect()->back();
//        return $request->all();

    }

    public function show($id){
        $service_area=DB::table('service_area')->where('id','=',$id)->first();
        return view('settings.service_area.show',compact('service_area'));
    }
}
