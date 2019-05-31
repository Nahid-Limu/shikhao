<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MediumController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $mediums=DB::table('medium')->get();
        return view('settings.medium.index',compact('mediums'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ]);
        $now=Carbon::now()->toDateTimeString();
        DB::table('medium')->insert([
            'name'=>$request->name,
            'created_by'=>Auth::user()->id,
            'medium_status'=>1,
            'created_at'=>$now,
            'updated_at'=>$now,

        ]);
        Session::flash('success', 'Medium Successfully Created');
        return redirect(route('medium.index'));
    }

    public function edit($id){
        $medium=DB::table('medium')->where('id','=',$id)->first();
        return view('settings.medium.edit',compact('medium'));

    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'name'=>'required',
            'status'=>'required',
        ]);
        DB::table('medium')->where('id','=',$id)->update([
            'name'=>$request->name,
            'medium_status'=>$request->status,
            'updated_at'=>Carbon::now()->toDateTimeString(),

        ]);
        Session::flash('success','Medium Updated');
        return redirect(route('medium.index'));
//        return $request->all();
    }

    public function show($id){
        $medium=DB::table('medium')->where('id','=',$id)->first();
        return view('settings.medium.show',compact('medium'));
    }

}
