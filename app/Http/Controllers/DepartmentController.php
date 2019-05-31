<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $departments=DB::table('department')->get();
        return view('settings.department.index',compact('departments'));

    }

    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required',
        ]);
        $now=Carbon::now()->toDateTimeString();
        DB::table('department')->insert([
            'name'=>$request->name,
            'created_by'=>Auth::user()->id,
            'status'=>1,
            'created_at'=>$now,
            'updated_at'=>$now,

        ]);
        Session::flash('success',"Department Inserted Successfully");
        return redirect()->back();
//        return $request->all();
    }

    public function edit($id){
        $department=DB::table('department')->where('id','=',$id)->first();
        return view('settings.department.edit',compact('department'));
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'name'=>'required',
            'status'=>'required',
        ]);
        DB::table('department')->where('id','=',$id)->update([
            'name'=>$request->name,
            'status'=>$request->status,
            'updated_at'=>Carbon::now()->toDateTimeString(),

        ]);
        Session::flash('success','Department Information Updated');
        return redirect()->back();
//        return $request->all();
    }

    public function show($id){
        $department=DB::table('department')->where('id','=',$id)->first();
        return view('settings.department.show',compact('department'));
    }
}
