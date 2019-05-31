<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LocationController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $service_area=DB::table('service_area')->get(['id','name']);
        $locations=DB::table('location')
            ->leftJoin('service_area','location.service_area_id','=','service_area.id')
            ->select(['location.*','service_area.name as service_area_name'])
            ->get();
        return view('settings.location.index',compact('locations','service_area'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'service_area_id'=>'required',
        ]);
        $now=Carbon::now()->toDateTimeString();

        DB::table('location')->insert([
            'name'=>$request->name,
            'service_area_id'=>$request->service_area_id,
            'longitude'=>$request->longitude,
            'latitude'=>$request->latitude,
            'status'=>1,
            'created_by'=>Auth::user()->id,
            'created_at'=>$now,
            'updated_at'=>$now
        ]);

        Session::flash('success','Location Added');
        return redirect()->back();
    }

    public function edit($id){
        $service_area=DB::table('service_area')->get(['id','name']);
        $location=DB::table('location')->where('id','=',$id)->first();
        return view('settings.location.edit',compact('location','service_area'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'service_area_id'=>'required',
            'status'=>'required',
        ]);
        $now=Carbon::now()->toDateTimeString();

        DB::table('location')->where('id','=',$id)->update([
            'name'=>$request->name,
            'service_area_id'=>$request->service_area_id,
            'status'=>$request->status,
            'longitude'=>$request->longitude,
            'latitude'=>$request->latitude,
            'updated_at'=>$now,
        ]);
        Session::flash('success','Location Updated');
        return redirect()->back();
    }

    public function show($id){
        $location=DB::table('location')
            ->leftJoin('service_area','location.service_area_id','=','service_area.id')
            ->where('location.id','=',$id)
            ->first(['location.*','service_area.name as service_area_name']);

        return view('settings.location.show',compact('location'));
    }

    public function get_location(Request $request){
        $id=$request->id;
        $location=DB::table('location')->where('location.status','=',1)->where('service_area_id','=',$id)->get(['id','name']);
        return view('ajax.get_location',compact('location'));
    }
}
