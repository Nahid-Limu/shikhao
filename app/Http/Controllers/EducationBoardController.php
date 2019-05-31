<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EducationBoardController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $education_board=DB::table('education_board')->get();
        return view('settings.education_board.index',compact('education_board'));

    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ]);
        $now=Carbon::now()->toDateTimeString();
        DB::table('education_board')->insert([
            'name'=>$request->name,
            'status'=>1,
            'created_by'=>Auth::user()->id,
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        Session::flash('success','Education Board Stored');
        return redirect()->back();
    }

    public function edit($id){
        $education_board=DB::table('education_board')->where('id','=',$id)->first();
        return view('settings.education_board.edit',compact('education_board'));
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'name'=>'required',
            'status'=>'required',
        ]);
        DB::table('education_board')->where('id','=',$id)->update([
            'name'=>$request->name,
            'status'=>$request->status,
            'updated_at'=>Carbon::now()->toDateTimeString(),

        ]);
        Session::flash('success','Education Board Information Updated');
        return redirect()->back();
    }

    public function show($id){
        $education_board=DB::table('education_board')->where('id','=',$id)->first();
        return view('settings.education_board.show',compact('education_board'));
    }
}
