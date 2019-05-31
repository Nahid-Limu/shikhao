<?php

namespace App\Http\Controllers;

use App\Notifications\ShikhaoNotifications;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Notification;
use Mail;

class StudentController extends Controller
{
    //create student view
    public function index()
    {
        // $service_area=DB::table('service_area')->where('status','=',1)->get(['id','name']);
        // $medium=DB::table('medium')->where('medium_status','=',1)->get(['id','name']);
        $school=DB::table('institute')->where('status','=',1)->get(['id','name']);
        //$class=DB::table('class_table')->where('status','=',1)->get(['id','name']);
        //dd($service_area);
        return view('student.create', compact('school'));
    }


    //create student
    public function addStudent(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'contact_number'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
            'gender'=>'required',
            'school_id'=>'required',
            
        ]);


        $shikhao_id = hexdec(uniqid());
        $verified_on = Carbon::now()->toDateString();
        $referral_code = null;
        $verification_code = null;

        if (Auth::user()->is_permission==1 || Auth::user()->is_permission==2) {

            $student_id = DB::table('student')->insertGetId(
                [
                    'shikhao_id' => $shikhao_id,

                    'name' => $request->name,
                    'guardian_name' => $request->guardian_name,
                    'contact_number' => $request->contact_number,
                    'password' => bcrypt($request->password),
                    'additional_contact_number' => $request->additional_contact_number,
                    'gender' => $request->gender,
                    'school_id' => $request->school_id,
                    'account_status' => 1,
                    'created_by'=>Auth::user()->id,

                    'referral_code' => $referral_code,
                    'verification_code' => $verification_code,
                    'is_verified' => 1,
                    'verified_on' => $verified_on,

                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString(),

                ]
            );
                
                DB::table('users')->insert([
                    'name'=>$request->name,
                    'student_id'=>$student_id,
                    'email'=>$request->email,
                    'password'=>bcrypt($request->password),
                    'is_permission'=>6,
                    'status'=>1,
                    'phone'=>$request->contact_number,
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString(),
                ]);

                return redirect()->back()->with('success', 'Student Added !!!');
            
            

        } else {

            $user = DB::table('users')->where('email', $request->email)->first();
            
            if (!$user) {
                $student_id = DB::table('student')->insertGetId(
                    [
                        'shikhao_id' => $shikhao_id,
                        'name' => $request->name,
                        'guardian_name' => $request->guardian_name,
                        'contact_number' => $request->contact_number,
                        'password' => bcrypt($request->password),
                        'additional_contact_number' => $request->additional_contact_number,
                        'gender' => $request->gender,
                        'school_id' => $request->school_id,
                        'account_status' => 0,
                        'created_by'=>Auth::user()->id,
                        'referral_code' => $referral_code,
                        'verification_code' => $verification_code,
                        'is_verified' => 1,
                        'verified_on' => $verified_on,
                        
                        'created_at'=>Carbon::now()->toDateTimeString(),
                        'updated_at'=>Carbon::now()->toDateTimeString(),              
    
                    ]
                );
                
                DB::table('users')->insert([
                    'name'=>$request->name,
                    'student_id'=>$student_id,
                    'email'=>$request->email,
                    'password'=>bcrypt($request->password),
                    'is_permission'=>6,
                    'status'=>0,
                    'phone'=>$request->contact_number,
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString(),
                ]);

                $users = User::whereIn('is_permission', array(1, 2))->get();
                Notification::send($users,new ShikhaoNotifications($request->name));


//
//                try {
//                    $server_email = getenv('MAIL_USERNAME');
//
//                    Mail::send([], [], function($message) use ($server_email){
//                        $message
//                            ->to("$server_email", "Authority")
//                            ->from("$server_email","Shikhao System")
//                            ->subject("New Student Registered")
//                            ->setBody("A new student has registered. Please check his details for further action.");
////                        if($attachment != null)
////                            $message->attach($attachment, ['mime' => $attachment->getClientMimeType(), 'as' => $attachment->getClientOriginalName()]);
//                    });
//
//                    // }
//
////                    $cmsg = "Email has been sent successfully to - ".$request->emailAddress;
////                    Session::flash('notification', $cmsg);
//                    return redirect()->back()->with('success','Student Added !!!');
//                }
//                catch (Exception $e) {
//                    return $e;
//                }

                return redirect()->back()->with('success', 'Student Added !!!');
            }
            else {
                return redirect()->back()->with('error', 'This email already exists');
            }
        }  

    }

    //student list
    public function student_list()
    {
        $students = DB::table('student')
        ->leftJoin('institute','student.school_id','=','institute.id')
        ->select(['student.id','student.name','student.shikhao_id','student.contact_number','student.gender','institute.name as institute_name'])
        ->orderBy('student.name')
        ->paginate(25);
        $school=DB::table('institute')->where('status','=',1)->get(['id','name']);
        // $service_area=DB::table('service_area')->where('status','=',1)->get(['id','name']);
        // $medium=DB::table('medium')->where('medium_status','=',1)->get(['id','name']);
        //$class=DB::table('class_table')->where('status','=',1)->get(['id','name']);

        return view('student.student_list', compact('students','school'));
    }

    //student approve from pending list
    public function approve_student($id)
    {
        $id = base64_decode($id);

        $approve_student =  DB::table('student')
            ->where('id',$id)
            ->update(
                [
                    'account_status' =>1
                    
                ]
            );
        if ($approve_student) {
            return redirect()->back()->with('success', 'Student Approved Successfully'); 
        } else {
            return redirect()->back()->with('error', 'Approved Failed');
        }
        
    }

    //student reject
    public function reject_student($id)
    {
        $id = base64_decode($id);

        $reject_student =  DB::table('student')
            ->where('id',$id)
            ->update(
                [
                    'account_status' =>3
                    
                ]
            );
        if ($reject_student) {
            return redirect()->back()->with('success', 'Student Reject Successfully'); 
        } else {
            return redirect()->back()->with('error', 'Reject Failed');
        }
        
    }

    //student profile
    public function profile($id)
    {
        $id = base64_decode($id);

        $student = DB::table('student')
        ->leftJoin('users','student.id','=','users.student_id')
        ->where('student.id', $id)
        ->select(['student.id','student.shikhao_id','student.name','users.email','student.account_status','student.created_by','student.gender','student.guardian_name','student.contact_number','student.additional_contact_number'])
        ->first();
        
        $createdBy = DB::table('users')
        ->where('users.id', $student->created_by)
        ->first(['name']);

        return view('student.student_profile', compact('student', 'createdBy'));
    }
    

    //update student personal info
    public function updatePersonalInfo(Request $request)
    {
        
       $updateInfo =  DB::table('student')
            ->where('id', $request->id)
            ->update(
                [
                    'name' => $request->name,
                    'guardian_name' => $request->guardian_name,
                    'contact_number' => $request->contact_number,
                    'additional_contact_number' => $request->additional_contact_number,
                    'gender' => $request->gender,
                    'can_travel' => $request->can_travel,
                ]
            );

            if ($updateInfo) {
                return "Info Update Successfully";
            } else {
                return 0;
            }
            
    }

    

    //update student status
    public function updateStudentStatus(Request $request)
    {
        
       $updateInfo =  DB::table('student')
            ->where('id', $request->id)
            ->update(
                [
                    'account_status' => $request->account_status
                ]
            );

            if ($updateInfo) {

                if ($request->account_status == 1) {
                    return "Student Approved Successfully";
                    
                }
                elseif ($request->account_status == 0) {
                    return "Student Panding Successfully";
                   
                }
                elseif ($request->account_status == 2) {
                    return "Student Blocked Successfully";
                   
                }
                
            } else {
                //return "Update Failed";
                return 3;
            }
            
    }


    //student pending list
    public function student_pending_list()
    {
        $students = DB::table('student')
        ->leftJoin('institute','student.school_id','=','institute.id')
        ->select(['student.id','student.name','student.shikhao_id','student.contact_number','student.gender','institute.name as institute_name'])
        ->where('account_status', 0)
        ->get();
        //dd($students);
        return view('student.student_pending_list', compact('students'));
    }

    public function name_search($name){
        $students = DB::table('student')
            ->leftJoin('institute','student.school_id','=','institute.id')
            ->select(['student.id','student.name','student.shikhao_id','student.contact_number','student.gender','institute.name as institute_name'])
            ->where('student.name','LIKE',"%$name%")
            ->orWhere('student.contact_number','LIKE',"%$name%")
            ->orWhere('student.contact_number','LIKE',"%$name%")
            ->orWhere('student.shikhao_id','LIKE',"%$name%")
            ->orderBy('student.name')
            ->paginate(25);
        return view('student.name_search',compact('students'));
    }

    public function all(){
        $students = DB::table('student')
            ->leftJoin('institute','student.school_id','=','institute.id')
            ->select(['student.id','student.name','student.shikhao_id','student.contact_number','student.gender','institute.name as institute_name'])
            ->orderBy('student.name')
            ->paginate(25);
        return view('student.name_search',compact('students'));
    }

    public function advance_search(Request $request){
        $query = DB::table('student')
            ->leftJoin('institute','student.school_id','=','institute.id');
        if($request->institute_id!=null){
            $query=$query->where('school_id','=',$request->institute_id);
        }
        if($request->gender !=null){
            $query=$query->where('gender','=',$request->gender);
        }
        if($request->account_status !=null){
            $query=$query->where('account_status','=',$request->account_status);

        }
        $students=$query->select(['student.id','student.name','student.shikhao_id','student.contact_number','student.gender','institute.name as institute_name'])
            ->orderBy('student.name')
            ->paginate(25);
        $school=DB::table('institute')->where('status','=',1)->get(['id','name']);

        return view('student.advance_search',compact('students','request','school'));

    }


}
