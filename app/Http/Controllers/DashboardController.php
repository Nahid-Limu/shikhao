<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Hash;
use Illuminate\Support\Facades\Session;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard_view(){
//        $departmentCount=DB::table('departments')->count();
        $countTutor=DB::table('tutor')->count();
        $countPendingTutor=DB::table('tutor')->where('account_status','=',0)->count();
        $countStudent=DB::table('student')->count();
        $countPendingStudent=DB::table('student')->where('account_status','=',0)->count();
        $countActiveJobs=DB::table('job_post')->where('job_status','=',1)->count();
        $countConfirmJobs=DB::table('tutor_student_job')->count();
        $countPendingJobs=DB::table('job_post')->where('job_status','=',0)->count();
        $countRejectedJobs=DB::table('job_post')->where('job_status','=',3)->count();

        //chart
        $date = Carbon::today()->subDays(30);

        $approved_job=DB::table('job_post')->where('job_status', 1)->where('created_at', '>=', $date)->count();
        $pending_job=DB::table('job_post')->where('job_status', 0)->where('created_at', '>=', $date)->count();
        $confirm_job=DB::table('job_post')->where('job_status', 2)->where('created_at', '>=', $date)->count();
        $rejected_job=DB::table('job_post')->where('job_status', 3)->where('created_at', '>=', $date)->count();

        $approved_tutor=DB::table('tutor')->where('account_status', 1)->where('created_at', '>=', $date)->count();
        $pending_tutor=DB::table('tutor')->where('account_status', 0)->where('created_at', '>=', $date)->count();
        $blocked_tutor=DB::table('tutor')->where('account_status', 2)->where('created_at', '>=', $date)->count();
        $rejected_tutor=DB::table('tutor')->where('account_status', 3)->where('created_at', '>=', $date)->count();

        $approved_student=DB::table('student')->where('account_status', 1)->where('created_at', '>=', $date)->count();
        $pending_student=DB::table('student')->where('account_status', 0)->where('created_at', '>=', $date)->count();
        $blocked_student=DB::table('student')->where('account_status', 2)->where('created_at', '>=', $date)->count();
        $rejected_student=DB::table('student')->where('account_status', 3)->where('created_at', '>=', $date)->count();
        
        //dd($pending_tutor);

        return view('dashboard',compact('countTutor','countPendingStudent','countRejectedJobs','countPendingJobs','countPendingTutor','countStudent','countActiveJobs','countConfirmJobs',
            'approved_job','pending_job','confirm_job','rejected_job',
            'approved_tutor','pending_tutor','blocked_tutor','rejected_tutor',
            'approved_student','pending_student','blocked_student','rejected_student'));
    }

    public function change_password(Request $request)
    {
        $this->validate($request,[
            'current_password'=>'required',
            'new_password'=>'required',
            'confirm_password'=>'required',
        ]);
        $old = bcrypt($request->current_password);
        // echo $old.'<br>';
        // echo Auth::user()->password;
        if (Hash::check($request->current_password, Auth::user()->password)) {
            if ($request->new_password == $request->confirm_password) {
            
                $user = DB::table('users')->where('id', Auth::user()->id)
                ->update([
                    'password'=>bcrypt($request->confirm_password),
                ]);

                if ( $user) {
                    return redirect()->back()->with('success','Password change successfully !!');
                } else {
                    return redirect()->back()->with('error','Failed !!');
                }
                
            
            } else {
                return redirect()->back()->with('error','Password Not Match');
            }
            
            
        }else {
   
            return redirect()->back()->with('error','Current password is not match');;
        }
        
    }
}
