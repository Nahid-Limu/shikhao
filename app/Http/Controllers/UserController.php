<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function create_user_view()
    {
       return view('user.create_user');
    }

    public function store_user(Request $request)
    {
        $this->validate($request,[
            'user_name'=>'required',
            'email'=>'required|unique:users',
            'user_password'=>'required',
            'confirm_password'=>'required',
            'user_type'=>'required',
            
        ]);

        if (Auth::user()->is_permission==1 || Auth::user()->is_permission==2 ) {
           
            if ($request->user_password == $request->confirm_password) {
                
                DB::table('users')->insert([
                    'name'=>$request->user_name,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'password'=>bcrypt($request->confirm_password),
                    'is_permission'=>$request->user_type,
                    'status'=>1,
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString(),
                ]);

                return redirect()->back()->with('success','User Added Successfully');
                
           }else {

            return redirect()->back()->with('error','Password Not Match !!');
           }
        }else {
            return redirect()->back()->with('error','Yor Are Not SuperAdmin / admin !!!');
        }
    }

    public function user_list()
    {
        $users = DB::table('users')
            ->whereIn('is_permission',[2, 3])
            ->get(['id','name','email','phone','is_permission','status','created_at']);
            //dd($users);
        return view('user.user_list',compact('users'));
    }

    public function active_inactive_user($id,$status)
    {
        $id = base64_decode($id);
        $status = base64_decode($status);

        $update_user =  DB::table('users')
            ->where('id',$id)
            ->update(
                [
                    'status' =>$status
                    
                ]
            );

        if ($update_user) {

            if ($status = 1) {
                return redirect()->back()->with('success', 'User Active Successfully');
            }elseif ($status = 0) {
                return redirect()->back()->with('success', 'User InActive Successfully');
            }
            
            
        }else {
            return redirect()->back()->with('error', 'failed !!!');
        }
    }
    
    public function user_profile()
    {
        $user = DB::table('users')
            ->where('id', Auth::user()->id)
            ->first();
            
        return view('user.user_profile', compact('user'));
    }
}
