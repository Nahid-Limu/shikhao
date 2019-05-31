<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OccupationController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $occupation=DB::table('occupation')->get();
        return view('settings.occupation.index',compact('occupation'));

    }

    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required',
        ]);
        $now=Carbon::now()->toDateTimeString();
        DB::table('occupation')->insert([
            'name'=>$request->name,
            'created_by'=>Auth::user()->id,
            'status'=>1,
            'created_at'=>$now,
            'updated_at'=>$now,

        ]);
        Session::flash('success',"Occupation Inserted Successfully");
        return redirect()->back();
    }

    public function edit($id){
        $occupation=DB::table('occupation')->where('id','=',$id)->first();
        return view('settings.occupation.edit',compact('occupation'));
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'name'=>'required',
            'status'=>'required',
        ]);
        DB::table('occupation')->where('id','=',$id)->update([
            'name'=>$request->name,
            'remarks'=>$request->remarks,
            'status'=>$request->status,
            'updated_at'=>Carbon::now()->toDateTimeString(),

        ]);
        Session::flash('success','Occupation Information Updated');
        return redirect()->back();
    }

    public function show($id)
    {
        $occupation = DB::table('occupation')->where('id', '=', $id)->first();
        return view('settings.occupation.show', compact('occupation'));
    }
}
