<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class JobController extends Controller
{
    public function index()
    {
        $student=DB::table('student')->where('account_status','=',1)->get(['id','name']);
        $medium=DB::table('medium')->where('medium_status','=',1)->get(['id','name']);
        $class=DB::table('class_table')->where('status','=',1)->get(['id','name']);
        $subject=DB::table('subject')->where('status','=',1)->get(['id','name']);
        $service_area=DB::table('service_area')->where('status','=',1)->get(['id','name']);

        $school=DB::table('institute')->where('status','=',1)->get(['id','name']);
        $university=DB::table('university')->where('status','=',1)->get(['id','name']);

        return view('job.job_post', compact('student','medium','class','subject','service_area','school','university'));
       
    }

    public function postJob(Request $request)
    {
        $unique=hexdec(uniqid());

        if (Auth::user()->is_permission==1 || Auth::user()->is_permission==2 || Auth::user()->is_permission==3) {
            
            $job_post_id = DB::table('job_post')->insertGetId(
                [
                    'shikhao_id' => $unique,
                    'student_id' => $request->student_id,
                    'medium_id' => $request->medium_id,
                    'curriculum_id' => $request->curriculum_id,
                    'class_id' => $request->class_id,
                    'salary' => $request->salary,
                    'can_travel' => $request->can_travel,
                    'location_id' => $request->location_id,
                    'location_details' => $request->location_details,
                    'preferred_school_id' => $request->school_id,
                    'preferred_university_id' => $request->university_id,
                    'joining_date' => $request->joining_date,
                    'preferred_gender' => $request->gender,
                    'special_requirement' => $request->special_requirement,
                    'days_per_week' => $request->days_per_week,
                    // 'minimum_rating' => 1,
                    // 'multiple_student_status' => $request->school_id,
                    'job_status' => 1,
                    'created_by'=>Auth::user()->id,
                    
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString(),           

                ]
            );


        }else {
            
            $job_post_id = DB::table('job_post')->insertGetId(
                [
                    'shikhao_id' => $unique,
                    'student_id' => $request->student_id,
                    'medium_id' => $request->medium_id,
                    'curriculum_id' => $request->curriculum_id,
                    'class_id' => $request->class_id,
                    'salary' => $request->salary,
                    'can_travel' => $request->can_travel,
                    'location_id' => $request->location_id,
                    'location_details' => $request->location_details,
                    'preferred_school_id' => $request->school_id,
                    'preferred_university_id' => $request->university_id,
                    'joining_date' => $request->joining_date,
                    'preferred_gender' => $request->gender,
                    'special_requirement' => $request->special_requirement,
                    'days_per_week' => count($request->day),
                    // 'minimum_rating' => 1,
                    // 'multiple_student_status' => $request->school_id,
                    'job_status' => 0,
                    'created_by'=>Auth::user()->id,
                    
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString(),           

                ]
            );
            
        }

        //subject
        foreach ($request->subject_id as $key => $s) {
            $suject[] = [
                    'job_post_id' => $job_post_id,
                    'subject_id' => $s,
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString(),
            ];
        }
        DB::table('job_preferred_subject')->insert($suject);
        
        //day
        if ($request->day != null) {
            foreach ($request->day as $key => $d) {
                $day[] = [
                        'job_post_id' => $job_post_id,
                        'day' => $d,
                        'created_at'=>Carbon::now()->toDateTimeString(),
                        'updated_at'=>Carbon::now()->toDateTimeString(),
                ];
            }
            DB::table('job_preferred_day')->insert($day);
        }
        

        //time
        if ($request->time != null) {
            foreach ($request->time as $key => $t) {
                $time[] = [
                        'job_post_id' => $job_post_id,
                        'time_id' => $t,
                        'created_at'=>Carbon::now()->toDateTimeString(),
                        'updated_at'=>Carbon::now()->toDateTimeString(),
                ];
            }
            DB::table('job_preferred_time')->insert($time);
        }

        return redirect()->route('job.list');
        
    }


    //job list
    public function job_pending_list( )
    {
        $jobs_post = DB::table('job_post')
        ->leftJoin('class_table','job_post.class_id','=','class_table.id')
        ->leftJoin('bangla_english_curriculum','job_post.curriculum_id','=','bangla_english_curriculum.id')
        ->leftJoin('location','job_post.location_id','=','location.id')
        ->select('class_table.name as class_name','bangla_english_curriculum.curriculum_name as curriculum_name','location.name as location_name','job_post.id','job_post.joining_date','job_post.created_at','salary','days_per_week')
        ->where('job_status', 0)
        ->orderBy('id', 'DESC')
        ->paginate(50);

        $subject = DB::table('subject')
            ->leftJoin('job_preferred_subject','subject.id','=','job_preferred_subject.subject_id')
            ->select('job_preferred_subject.job_post_id','subject.name')
            ->get();

        foreach ($subject as $key => $s) {
            
           $sub[] =[
                'job_post_id' => $s->job_post_id,
                'subject_name' => $s->name
            ];
        }

        
    //dd($jobs_post);
    return view('job.job_pending_list', compact('jobs_post','sub'));
    }

    //approve pending jobs
    public function approve_post($id)
    {
        $id = base64_decode($id);
        
        $approve_job =  DB::table('job_post')
            ->where('id', $id)
            ->update(
                [
                    'job_status' => 1
                ]
            );

            if ($approve_job) {
                return redirect()->back()->with('success', 'Job Approved Successfully');
            } else {
                return redirect()->back()->with('error', 'Update Failed');
            }
    }

    //reject pending jobs
    public function reject_post($id)
    {
        $id = base64_decode($id);
        
        $approve_job =  DB::table('job_post')
            ->where('id', $id)
            ->update(
                [
                    'job_status' => 3
                ]
            );

            if ($approve_job) {
                return redirect()->back()->with('success', 'Job Reject Successfully');
            } else {
                return redirect()->back()->with('error', 'Reject Failed');
            }
    }

    //job list
    public function job_list()
    {
        $jobs_post = DB::table('job_post')
        ->leftJoin('class_table','job_post.class_id','=','class_table.id')
        ->leftJoin('bangla_english_curriculum','job_post.curriculum_id','=','bangla_english_curriculum.id')
        ->leftJoin('location','job_post.location_id','=','location.id')
        ->select('class_table.name as class_name','bangla_english_curriculum.curriculum_name as curriculum_name','location.name as location_name','job_post.id','job_post.joining_date','job_post.created_at','salary','days_per_week')
        ->where('job_status', 1)
        ->orderBy('id', 'DESC')
        ->paginate(20);

        $subject = DB::table('subject')
            ->leftJoin('job_preferred_subject','subject.id','=','job_preferred_subject.subject_id')
            ->select('job_preferred_subject.job_post_id','subject.name')
            ->get();

        foreach ($subject as $key => $s) {
            
           $sub[] =[
                'job_post_id' => $s->job_post_id,
                'subject_name' => $s->name
            ];
        }

        $class=DB::table('class_table')->where('status','=',1)->get(['id','name']);
        $service_area=DB::table('service_area')->where('status','=',1)->get(['id','name']);

        return view('job.job_list', compact('jobs_post','sub','class','service_area'));
    }


    //search job
    public function job_search(Request $request)
    {
        $jobs_post = DB::table('job_post')
        ->leftJoin('class_table','job_post.class_id','=','class_table.id')
        ->leftJoin('bangla_english_curriculum','job_post.curriculum_id','=','bangla_english_curriculum.id')
        ->leftJoin('location','job_post.location_id','=','location.id')
        ->select('class_table.name as class_name','bangla_english_curriculum.curriculum_name as curriculum_name','location.name as location_name','job_post.id','job_post.joining_date','job_post.created_at','salary','days_per_week')
        ->where('job_status', 1);

        if($request->salary_start!=null){
            $jobs_post=$jobs_post->WhereBetween('job_post.salary',[$request->salary_start,$request->salary_end]);
        }
        if($request->salary_end!=null){
            $jobs_post=$jobs_post->WhereBetween('job_post.salary',[$request->salary_start,$request->salary_end]);
        }
        if($request->days_per_week!=null){
            $jobs_post=$jobs_post->where('job_post.days_per_week', $request->days_per_week);
        }
        if($request->class_id!=null){
            $jobs_post=$jobs_post->where('job_post.class_id', $request->class_id);
        }
        if($request->location_id!=null){
            $jobs_post=$jobs_post->where('job_post.location_id', $request->location_id);
        }
        
        $jobs_post=$jobs_post->paginate('25');
       
    
        $subject = DB::table('subject')
            ->leftJoin('job_preferred_subject','subject.id','=','job_preferred_subject.subject_id')
            ->select('job_preferred_subject.job_post_id','subject.name')
            ->get();

        foreach ($subject as $key => $s) {
            
           $sub[] =[
                'job_post_id' => $s->job_post_id,
                'subject_name' => $s->name
            ];
        }

        $class=DB::table('class_table')->where('status','=',1)->get(['id','name']);
        $service_area=DB::table('service_area')->where('status','=',1)->get(['id','name']);
        
        //dd($jobs_post);
        return view('job.job_list', compact('jobs_post','sub','class','service_area'));
    }


    //view job
    public function view_job($id)
    {
        $id = base64_decode($id);
        $job_post = DB::table('job_post')
        ->leftJoin('class_table','job_post.class_id','=','class_table.id')
        ->leftJoin('bangla_english_curriculum','job_post.curriculum_id','=','bangla_english_curriculum.id')
        ->leftJoin('location','job_post.location_id','=','location.id')
        ->leftJoin('medium','job_post.medium_id','=','medium.id')
        ->leftJoin('users','job_post.created_by','=','users.id')
        ->leftJoin('student','job_post.student_id','=','student.id')
        ->leftJoin('institute','job_post.preferred_school_id','=','institute.id')
        ->leftJoin('university','job_post.preferred_university_id','=','university.id')
        ->select('university.id as university_id','university.name as university_name','institute.id as school_id','institute.name as school_name','student.gender as student_gender','users.name as users_name','medium.id as medium_id','medium.name as medium_name','class_table.id as class_id','class_table.name as class_name','bangla_english_curriculum.curriculum_name as curriculum_name','location.name as location_name','job_post.id','job_post.salary','job_post.can_travel','job_post.location_details','job_post.joining_date','job_post.preferred_gender','job_post.special_requirement','job_post.days_per_week','job_post.created_at')
        ->where('job_post.id', $id)
        ->first();

        //subject
        $subject = DB::table('subject')
            ->leftJoin('job_preferred_subject','subject.id','=','job_preferred_subject.subject_id')
            ->where('job_preferred_subject.job_post_id','=',$id)
            ->select('job_preferred_subject.job_post_id','subject.name')
            ->get();

        foreach ($subject as $key => $s) {
            
           $sub[] =[
                'job_post_id' => $s->job_post_id,
                'subject_name' => $s->name
            ];
        }

        $class=DB::table('class_table')->where('status','=',1)->get(['id','name']);
        $service_area=DB::table('service_area')->where('status','=',1)->get(['id','name']);
        $subject=DB::table('subject')->where('status','=',1)->get(['id','name']);
        $medium=DB::table('medium')->where('medium_status','=',1)->get(['id','name']);
        $university=DB::table('university')->where('status','=',1)->get(['id','name']);
        
        $applicants=DB::table('job_apply')
            ->leftJoin('tutor','job_apply.tutor_id','=','tutor.id')
            ->leftJoin('medium','tutor.medium_id','=','medium.id')
            ->leftJoin('bangla_english_curriculum','tutor.english_bangla_curriculum_id','=','bangla_english_curriculum.id')
            ->leftJoin('location','tutor.location_id','=','location.id')
            ->leftJoin('tutoring_class','job_apply.tutor_id','=','tutoring_class.tutor_id')
            ->where('job_apply.job_post_id','=',$id)
            ->distinct('tutor.id')
            ->select('job_apply.*','tutor.id as tutor.id','tutor.name as tutor_name','tutor.image',
                'bangla_english_curriculum.curriculum_name','medium.name as medium_name',
                'tutor.gender','tutor.number_days_week','location.name as location_name')
            ->paginate(10);

        return view('job.view_job',  compact('job_post','applicants','medium','service_area',
            'sub','class','service_area','subject','university'));
    }

    public function assign_tutor(Request $request){
        $job_apply_id=base64_decode($request->job_apply_id);
        $job_post_id=base64_decode($request->job_post_id);
        $tutor_id=DB::table('job_apply')->where('id','=',$job_apply_id)->first()->tutor_id;
        $job_post=DB::table('job_post')->where('id','=',$job_post_id)->first();

        DB::table('tutor_student_job')->insert([
            'job_post_id'=>$job_post_id,
            'student_id'=>$job_post->student_id,
            'tutor_id'=>$tutor_id,
            'salary'=>$job_post->salary,
            'started_on'=>$job_post->joining_date,
            'selection_method'=>1,
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString(),
            //1 means assigned by admin
        ]);
        DB::table('job_post')->where('id','=',$job_post_id)->update([
            'job_status'=>2,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        DB::table('job_apply')->where('id','=',$job_apply_id)->update([
            'status'=>1,
        ]);

        Session::flash('success','Job Assigned Successful');
        return "success";
    }

    public function edit_view($id)
    {

        $id = base64_decode($id);
        $job_post = DB::table('job_post')
        ->leftJoin('class_table','job_post.class_id','=','class_table.id')
        ->leftJoin('bangla_english_curriculum','job_post.curriculum_id','=','bangla_english_curriculum.id')
        ->leftJoin('location','job_post.location_id','=','location.id')
        ->leftJoin('medium','job_post.medium_id','=','medium.id')
        ->leftJoin('users','job_post.created_by','=','users.id')
        ->leftJoin('student','job_post.student_id','=','student.id')
        ->leftJoin('institute','job_post.preferred_school_id','=','institute.id')
        ->leftJoin('university','job_post.preferred_university_id','=','university.id')
        ->select('university.id as university_id','university.name as university_name','institute.id as school_id','institute.name as school_name',
        'student.gender as student_gender','users.name as users_name','medium.id as medium_id','medium.name as medium_name',
        'class_table.id as class_id','class_table.name as class_name','bangla_english_curriculum.id as curriculum_id',
        'bangla_english_curriculum.curriculum_name as curriculum_name','location.name as location_name','job_post.id','job_post.salary',
        'job_post.can_travel','job_post.location_details','job_post.joining_date','job_post.preferred_gender','job_post.special_requirement',
        'job_post.days_per_week','job_post.created_at')
        ->where('job_post.id', $id)
        ->first();

        //subject
        $subject = DB::table('subject')
            ->leftJoin('job_preferred_subject','subject.id','=','job_preferred_subject.subject_id')
            ->select('job_preferred_subject.job_post_id','subject.name')
            ->get();

        foreach ($subject as $key => $s) {
            
           $sub[] =[
                'job_post_id' => $s->job_post_id,
                'subject_name' => $s->name
            ];
        }

        $job_preferred_subject = DB::table('job_preferred_subject')
            ->leftJoin('subject','job_preferred_subject.subject_id','=','subject.id')
            ->where('job_preferred_subject.job_post_id','=',$id)
            ->get(['subject.name as subject_name','subject.id as subject_id']);

        $days=DB::table('job_preferred_day')->where('job_post_id','=',$id)->get(['id','day']);
        $time=DB::table('job_preferred_time')->where('job_post_id','=',$id)->get(['id','job_post_id','time_id']);
        $all_days=[
            '0'=>['id'=>1, 'day_name'=>'Sunday'],
            '1'=>['id'=>2, 'day_name'=>'Monday'],
            '2'=>['id'=>3, 'day_name'=>'Tuesday'],
            '3'=>['id'=>4, 'day_name'=>'Wednesday'],
            '4'=>['id'=>5, 'day_name'=>'Thursday'],
            '5'=>['id'=>6, 'day_name'=>'Friday'],
            '6'=>['id'=>7, 'day_name'=>'Saturday'],
        ];
        $all_times=[
            '0'=>['id'=>1, 'time_name'=>'Any Time'],
            '1'=>['id'=>2, 'time_name'=>'Morning'],
            '2'=>['id'=>3, 'time_name'=>'Noon'],
            '3'=>['id'=>4, 'time_name'=>'Evening'],
        ];

        $class=DB::table('class_table')->where('status','=',1)->get(['id','name']);
        $service_area=DB::table('service_area')->where('status','=',1)->get(['id','name']);
        $subject=DB::table('subject')->where('status','=',1)->get(['id','name']);
        $medium=DB::table('medium')->where('medium_status','=',1)->get(['id','name']);
        $school=DB::table('institute')->where('status','=',1)->get(['id','name']);
        $university=DB::table('university')->where('status','=',1)->get(['id','name']);
        
        //dd($job_preferred_subject);
        return view('job.edit_view',  compact('class','service_area','job_post','job_preferred_subject','sub',
        'days','all_days','time','all_times','medium','subject','school','university'));
        
    }
    public function update_job(Request $request, $id)
    {
        $job_post_id = base64_decode($id);
    
        $update_job_post = DB::table('job_post')
            ->where('id', $job_post_id)
            ->update(
            [
                'medium_id' => $request->medium_id,
                'curriculum_id' => $request->curriculum_id,
                'class_id' => $request->class_id,
                'salary' => $request->salary,
                'can_travel' => $request->can_travel,
                'location_details' => $request->location_details,
                'preferred_school_id' => $request->school_id,
                'preferred_university_id' => $request->university_id,
                'joining_date' => $request->joining_date,
                'preferred_gender' => $request->gender,
                'special_requirement' => $request->special_requirement,
                'days_per_week' => $request->days_per_week,
                
            ]
        );

        //subject
        if ($request->subject_id) {
            DB::table('job_preferred_subject')->where('job_post_id','=',$job_post_id)->delete();
            foreach ($request->subject_id as $key => $s) {
                
            $sub[] =[
                    'job_post_id' => $job_post_id,
                    'subject_id' => $s,
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString(),
                ];
            }
            DB::table('job_preferred_subject')->insert($sub);
        }

        //day
        if ($request->day) {
            DB::table('job_preferred_day')->where('job_post_id','=',$job_post_id)->delete();
            foreach ($request->day as $key => $d) {
                
            $day[] =[
                    'job_post_id' => $job_post_id,
                    'day' => $d,
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString(),
                ];
            }
            DB::table('job_preferred_day')->insert($day);
        }

        //time
        if ($request->time) {
            DB::table('job_preferred_time')->where('job_post_id','=',$job_post_id)->delete();
            foreach ($request->time as $key => $t) {
                
            $time[] =[
                    'job_post_id' => $job_post_id,
                    'time_id' => $t,
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString(),
                ];
            }
            DB::table('job_preferred_time')->insert($time);
        }
        
        return redirect()->back()->with('success', 'Job Update Successfully');
        
    }

    public function advance_search_tutor(Request $request){
        $id=base64_decode($request->job_post_id);
        $applicants=DB::table('job_apply')
            ->leftJoin('tutor','job_apply.tutor_id','=','tutor.id')
            ->leftJoin('medium','tutor.medium_id','=','medium.id')
            ->leftJoin('bangla_english_curriculum','tutor.english_bangla_curriculum_id','=','bangla_english_curriculum.id')
            ->leftJoin('location','tutor.location_id','=','location.id')
            ->leftJoin('tutoring_class','job_apply.tutor_id','=','tutoring_class.tutor_id')
            ->where('job_apply.job_post_id','=',$id)
            ->distinct('tutor.id')
            ->select(['job_apply.*','tutor.name as tutor_name','tutor.image',
                'bangla_english_curriculum.curriculum_name','medium.name as medium_name',
                'tutor.gender','tutor.number_days_week','location.name as location_name']);
        if($request->university_id !=null){
            $applicants->where('tutor.university_id','=',$request->university_id);
        }
        if ($request->medium_id!=null){
            $applicants->where('tutor.medium_id','=',$request->medium_id);
        }
        if ($request->service_area_id!=null){
            $applicants->where('tutor.service_area_id','=',$request->service_area_id);
        }
        if ($request->location_id!=null){
            $applicants->where('tutor.location_id','=',$request->location_id);
        }
        if ($request->gender!=null){
            $applicants->where('tutor.gender','=',$request->gender);
        }
        if ($request->class_id!=null){
            $applicants->where('tutoring_class.class_id','=',$request->class_id);
        }
        $applicants=$applicants->paginate('10');
        if (count($applicants)==0){
            return "<h2 style='text-align: center; font-weight: bold; color: darkred;padding-bottom: 20px;'>Sorry! No tutor found.</h2>";
        }
        return view('ajax.view_job_tutor_filter',compact('applicants','request'));
    }

    public function job_confirmed_list()
    {
        
        $job_confirmed_list = DB::table('tutor_student_job')

        ->leftJoin('job_post','tutor_student_job.job_post_id','=','job_post.id')
        ->leftJoin('student','tutor_student_job.student_id','=','student.id')
        ->leftJoin('tutor','tutor_student_job.tutor_id','=','tutor.id')

        ->select('tutor_student_job.id','student.name as student_name', 'tutor.name as tutor_name','tutor_student_job.salary','tutor_student_job.started_on',
        DB::raw("(SELECT name FROM class_table  WHERE class_table.id = job_post.class_id) as class")
                )
        
        ->get();
        //dd($job_confirmed_list);
        return view('job.job_confirmed_list', compact('job_confirmed_list'));
    }

    public function view_confirmed_job($id)
    {
        $id=base64_decode($id);
        $tutor_student_job = DB::table('tutor_student_job')

        ->select('tutor_student_job.id','tutor_student_job.student_id','tutor_student_job.tutor_id',
        'tutor_student_job.job_post_id','tutor_student_job.tutor_rating',
        'tutor_student_job.student_rating','tutor_student_job.selection_method','tutor_student_job.salary')
        ->where('tutor_student_job.id', $id)
        ->first();

        $student = DB::table('student')
            ->where('student.id', $tutor_student_job->student_id)
            ->leftJoin('institute','student.school_id','=','institute.id')
            ->leftJoin('class_table','student.class_id','=','class_table.id')
            ->leftJoin('medium','student.medium_id','=','medium.id')
            ->leftJoin('location','student.location_id','=','location.id')
            ->select('student.id','student.name','student.contact_number','student.gender',
            'institute.name as school','class_table.name as class','medium.name as medium',
            'location.name as location')
            ->first();

        $tutor = DB::table('tutor')
            ->where('tutor.id', $tutor_student_job->tutor_id)
            ->leftJoin('occupation','tutor.occupational_status_id','=','occupation.id')
            ->leftJoin('university','tutor.university_id','=','university.id')
            ->leftJoin('department','tutor.department_id','=','department.id')
            ->leftJoin('location','tutor.location_id','=','location.id')
            ->select('tutor.id','tutor.contact_number','tutor.name','tutor.gender',
            'occupation.name as occupation','university.name as university',
            'department.name as department','location.name as location')
            ->first();
        
        $job = DB::table('job_post')
            ->where('job_post.id', $tutor_student_job->job_post_id)
            ->leftJoin('class_table','job_post.class_id','=','class_table.id')
            ->leftJoin('medium','job_post.medium_id','=','medium.id')
            ->leftJoin('bangla_english_curriculum','job_post.curriculum_id','=','bangla_english_curriculum.id')
            ->leftJoin('institute','job_post.preferred_school_id','=','institute.id')
            ->leftJoin('university','job_post.preferred_university_id','=','university.id')
            ->select('job_post.id','class_table.name as class','medium.name as medium',
            'bangla_english_curriculum.curriculum_name as curriculum','job_post.days_per_week',
            'job_post.salary','job_post.special_requirement','job_post.joining_date')
            ->first();

        //dd($tutor_student_job);
        return view('job.view_confirmed_job',compact('student','tutor','job','tutor_student_job'));
    }

    public function update_Preference_Details(Request $request)
    {
        //return $request->all();

        $update_tutor_student_job = DB::table('tutor_student_job')
                            ->where('id',base64_decode($request->tutor_student_job_id))
                            ->update(
                                [
                                    'tutor_rating' => $request->tutor_rating,
                                    'student_rating' => $request->student_rating,
                                    'selection_method' => $request->selection_method,
                                    'started_on' => $request->joining_date,
                                ]
                            );
        $update_job_post = DB::table('job_post')
                        ->where('id',base64_decode($request->job_id))
                        ->update(
                            [
                                'salary' => $request->salary,
                            ]
                        );
        if ($update_tutor_student_job || $update_job_post) {
            
            return redirect()->back()->with('success','Update Successfully');
            
        } else {
            return redirect()->back()->with('error','No change');
        }
        
    }
}
