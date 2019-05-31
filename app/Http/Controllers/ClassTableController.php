<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ClassTableController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $classes=DB::table('class_table')
            ->leftJoin('medium','class_table.medium_id','=','medium.id')
            ->get(['class_table.*','medium.name as medium_name']);

        $medium=DB::table('medium')->where('medium_status','=',1)
            ->get(['id','name']);
        return view('settings.classes.index',compact('medium','classes'));

    }

    public function store(Request $request){
        $this->validate($request,[
           'name'=>'required',
        ]);

        $now=Carbon::now()->toDateTimeString();

        DB::table('class_table')->insert([
            'name'=>$request->name,
            'medium_id'=>$request->medium_id,
            'remarks'=>$request->remarks,
            'status'=>1,
            'created_by'=>Auth::user()->id,
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);

        Session::flash('success','Class Inserted');
        return redirect()->back();
    }

    public function edit($id){
        $medium=DB::table('medium')
            ->where('medium_status','=',1)
            ->get(['id','name']);
        $class_table=DB::table('class_table')->where('id','=',$id)->first();
        return view('settings.classes.edit',compact('medium','class_table'));
    }

    public function update($id, Request $request){
        $this->validate($request,[
            'name'=>'required',
            'status'=>'required',
        ]);

        DB::table('class_table')->where('id','=',$id)->update([
            'name'=>$request->name,
            'medium_id'=>$request->medium_id,
            'remarks'=>$request->remarks,
            'status'=>$request->status,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        Session::flash('success','Class Table Information Updated');
        return redirect()->back();
    }

    public function show($id){
        $class_table=DB::table('class_table')
            ->leftJoin('medium','class_table.medium_id','=','medium.id')
            ->where('class_table.id','=',$id)
            ->select('class_table.*','medium.name as medium_name')
            ->first();
        return view('settings.classes.show',compact('class_table'));

    }

    public function get_class(Request $request){
        $id=$request->id;
        $class=DB::table('class_table')->where('status','=',1)->where('medium_id','=',$id)->orWhereNull('medium_id')->get(['id','name']);
        return view('ajax.get_class',compact('class'));
    }
}
