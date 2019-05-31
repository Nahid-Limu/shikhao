<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TutorController extends Controller
{
    public function __construct()
    {

    }

    public function show($id){
        $id=base64_decode($id);
        $days=DB::table('tutoring_day')->where('tutor_id','=',$id)->get(['id','day_id']);
        $time=DB::table('tutoring_time')->where('tutor_id','=',$id)->get(['id','time_id']);
        $occupation=DB::table('occupation')->where('status','=',1)->get(['id','name']);
        $service_area=DB::table('service_area')->where('status','=',1)->get(['id','name']);

        $tutoring_preference=DB::table('tutoring_preference')
            ->leftJoin('medium','tutoring_preference.preferred_medium_id','=','medium.id')
            ->leftJoin('bangla_english_curriculum','tutoring_preference.preferred_curriculum_id','=','bangla_english_curriculum.id')
            ->where('tutoring_preference.tutor_id','=',$id)
            ->select(['medium.name as medium_name',
                'tutoring_preference.preferred_medium_id', 'tutoring_preference.preferred_curriculum_id',
                'bangla_english_curriculum.curriculum_name as curriculum_name'])
            ->first();

        $tutoring_class=DB::table('tutoring_class')
            ->leftJoin('class_table','tutoring_class.class_id','=','class_table.id')
            ->where('tutor_id','=',$id)
            ->get(['class_table.name as class_name','class_table.id as class_id']);

//        return $tutoring_class;

        $tutoring_subject=DB::table('tutoring_subject')
            ->leftJoin('subject','tutoring_subject.subject_id','=','subject.id')
            ->where('tutoring_subject.tutor_id','=',$id)
            ->get(['subject.name as subject_name','subject.id as subject_id']);

        $tutoring_location=DB::table('tutoring_location')
            ->leftJoin('location','tutoring_location.location_id','=','location.id')
            ->where('tutoring_location.tutor_id','=',$id)
            ->get(['location.name as location_name','location.service_area_id','location.id as location_id']);
//        return $tutoring_location;
        $subject=DB::table('subject')->where('status','=',1)->get(['id','name']);
        $grade_points=DB::table('grade_point')->where('status','=',1)->get(['id','name']);

        $tutor=DB::table('tutor')
            ->leftJoin('service_area','tutor.service_area_id','=','service_area.id')
            ->leftJoin('location','tutor.location_id','=','location.id')
            ->leftJoin('occupation','tutor.occupational_status_id','=','occupation.id')
            ->leftJoin('institute','tutor.school_id','=','institute.id')
            ->leftJoin('medium','tutor.medium_id','=','medium.id')
            ->leftJoin('bangla_english_curriculum','tutor.english_bangla_curriculum_id','=','bangla_english_curriculum.id')
            ->leftJoin('department','tutor.department_id','=','department.id')
            ->leftJoin('university','tutor.university_id','=','university.id')
            ->leftJoin('semester_year','tutor.semester_year_id','=','semester_year.id')
            ->where('tutor.id','=',$id)
            ->select(['tutor.*','service_area.name as service_area_name','institute.name as institute_name',
                'occupation.name as occupation_name','medium.name as medium_name',
                'bangla_english_curriculum.id as curriculum_id', 'bangla_english_curriculum.curriculum_name',
                'department.name as department_name', 'university.name as university_name',
                'location.name as location_name','semester_year.name as semester_year_name'])
            ->first();
        $tutor_hsc_subject_result=DB::table('tutor_hsc_subject_result')
            ->leftJoin('subject','tutor_hsc_subject_result.subject_id','=','subject.id')
            ->leftJoin('grade_point','tutor_hsc_subject_result.grade_point_id','=','grade_point.id')
            ->where('tutor_hsc_subject_result.tutor_id','=',$id)
            ->select(['subject.name as subject_name','grade_point.name as grade_point_name','tutor_hsc_subject_result.id'])
            ->get();
        $tutora_subject_result=DB::table('tutora_subject_result')
            ->leftJoin('subject','tutora_subject_result.subject_id','=','subject.id')
            ->leftJoin('grade_point','tutora_subject_result.grade_point_id','=','grade_point.id')
            ->where('tutora_subject_result.tutor_id','=',$id)
            ->select(['subject.name as subject_name','grade_point.name as grade_point_name','tutora_subject_result.id'])
            ->get();

        $tutoro_subject_result=DB::table('tutoro_subject_result')
            ->leftJoin('subject','tutoro_subject_result.subject_id','=','subject.id')
            ->leftJoin('grade_point','tutoro_subject_result.grade_point_id','=','grade_point.id')
            ->where('tutoro_subject_result.tutor_id','=',$id)
            ->select(['subject.name as subject_name','grade_point.name as grade_point_name','tutoro_subject_result.id'])
            ->get();
        $medium=DB::table('medium')->where('medium_status','=',1)->get(['id','name']);
        $class=DB::table('class_table')->where('status','=',1)->get(['id','name']);
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
        $school=DB::table('institute')->where('status','=',1)->get(['id','name']);
        $university=DB::table('university')->where('status','=',1)->get(['id','name']);
        $department=DB::table('department')->where('status','=',1)->get(['id','name']);
        $ys=DB::table('semester_year')->where('status','=',1)->get(['id','name']);
        $tutor_attachment=DB::table('tutor_attachment')->where('tutor_id',$id)->get(['id','title','attachment']);

        return view('tutor.show',compact('tutor','department','school',
            'university','all_days','all_times','service_area','medium','subject','class',
            'service_area','occupation','tutoro_subject_result','tutora_subject_result',
            'tutor_hsc_subject_result','subject','grade_points','tutoring_location','ys',
            'tutoring_subject','days','time','tutoring_preference','tutoring_class','tutor_attachment'));
    }


    public function create(){
        $occupation=DB::table('occupation')->where('status','=',1)->get(['id','name']);
        $service_area=DB::table('service_area')->where('status','=',1)->get(['id','name']);
        $medium=DB::table('medium')->where('medium_status','=',1)->get(['id','name']);
        $school=DB::table('institute')->where('status','=',1)->get(['id','name']);
        $university=DB::table('university')->where('status','=',1)->get(['id','name']);
        $department=DB::table('department')->where('status','=',1)->get(['id','name']);
        $ys=DB::table('semester_year')->where('status','=',1)->get(['id','name']);
        $class=DB::table('class_table')->where('status','=',1)->get(['id','name']);
        $subject=DB::table('subject')->where('status','=',1)->get(['id','name']);
        return view('tutor.create',compact('occupation','service_area','medium','school','subject','department','university','ys','class'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'contact_number'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
            'gender'=>'required',
            'occupation_id'=>'required',
            'service_area_id'=>'required',
            'location_id'=>'required',
            'medium_id'=>'required',
            'school_id'=>'required',
            'preferred_medium_id'=>'required',
            'class_id'=>'required',
            'subject_id'=>'required',
            'preferred_service_area_id'=>'required',
            'preferred_location_id'=>'required',
            'day'=>'required',
            'time'=>'required',
            'account_status'=>'required',
        ]);
        if(Auth::user()->is_permission==1 || Auth::user()->is_permission==2){
            $is_verified=1;
        }
        else{
            $is_verified=0;

        }

        $unique=hexdec(uniqid());
        if($file=$request->file('image')){
            if($request->file('image')->getClientSize()>2000000)
            {
                Session::flash('error','Could Not Upload. File Size Limit Exceeded.');
                return redirect()->back();

            }
            $name=$unique."_".$file->getClientOriginalName();
            $file->move('Tutor_Images',$name);


        }
        else{
            $name=null;
        }


        $tutor_id=DB::table('tutor')->insertGetId([
            'shikhao_id'=>$unique,
            'name'=>$request->name,
            'image'=>$name,
            'facebook_username'=>$request->facebook_username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'gender'=>$request->gender,
            'contact_number'=>$request->contact_number,
            'permanent_address'=>$request->permanent_address,
            'service_area_id'=>$request->service_area_id,
            'location_id'=>$request->location_id,
            'dob'=>Carbon::parse($request->dob)->toDateString(),
            'nationalId'=>$request->nationalId,
            'fathers_name'=>$request->fathers_name,
            'mothers_name'=>$request->mothers_name,
            'parents_number'=>$request->parents_number,
            'occupational_status_id'=>$request->occupation_id,
            'university_id'=>$request->university_id,
            'semester_year_id'=>$request->semester_year_id,
            'university_student_id'=>$request->university_student_id,
            'department_id'=>$request->department_id,
            'date_of_registration'=>Carbon::now()->toDateString(),
            'medium_id'=>$request->medium_id,
            'minimum_salary'=>$request->minimum_salary,
            'english_bangla_curriculum_id'=>$request->english_bangla_curriculum_id,
            'ssc_result'=>$request->ssc_result,
            'hsc_result'=>$request->hsc_result,
            'school_id'=>$request->school_id,
            'number_days_week'=>$request->number_days_week,
            'is_verified'=>$is_verified,
            'verified_on'=>Carbon::now()->toDateString(),
            'account_status'=>$request->account_status,
            'created_by'=>Auth::user()->id,
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString(),

        ]);
        if($request->account_status==1){
            DB::table('users')->insert([
                'name'=>$request->name,
                'tutor_id'=>$tutor_id,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'is_permission'=>5,
                'status'=>1,
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        DB::table('tutoring_preference')->insert([
            'tutor_id'=>$tutor_id,
            'preferred_medium_id'=>$request->preferred_medium_id,
            'preferred_curriculum_id'=>$request->preferred_curriculum_id,
        ]);

        for ($i=0;$i<count($request->preferred_location_id);$i++){
            $tutoring_location[]=[
                'tutor_id'=>$tutor_id,
                'service_area_id'=>$request->preferred_service_area_id,
                'location_id'=>$request->preferred_location_id[$i]
            ];

        }


        DB::table('tutoring_location')->insert($tutoring_location);


        for($i=0;$i<count($request->class_id);$i++){
            $class[]=[
                'tutor_id'=>$tutor_id,
                'class_id'=>$request->class_id[$i],
            ];
        }

        DB::table('tutoring_class')->insert($class);

        for ($i=0;$i<count($request->subject_id);$i++){
            $subject[]=[
                'tutor_id'=>$tutor_id,
                'subject_id'=>$request->subject_id[$i],
            ];
        }

        DB::table('tutoring_subject')->insert($subject);

        for($i=0;$i<count($request->day);$i++){
            $day[]=[
                'tutor_id'=>$tutor_id,
                'day_id'=>$request->day[$i],
            ];
        }

        DB::table('tutoring_day')->insert($day);

        for ($i=0;$i<count($request->time);$i++){
            $time[]=[
                'tutor_id'=>$tutor_id,
                'time_id'=>$request->time[$i],
            ];
        }
        DB::table('tutoring_time')->insert($time);
        Session::flash('success','Tutor Registration Successful');
        return redirect(route('tutor.index'));
    }

    public function index(){
        $service_area=DB::table('service_area')->where('status','=',1)->get(['id','name']);
        $medium=DB::table('medium')->where('medium_status','=',1)->get(['id','name']);
        $class=DB::table('class_table')->where('status','=',1)->get(['id','name']);
        $subject=DB::table('subject')->where('status','=',1)->get(['id','name']);
        $tutor=DB::table('tutor')
            ->leftJoin('occupation','tutor.occupational_status_id','=','occupation.id')
            ->leftJoin('location','tutor.location_id','=','location.id')
            ->leftJoin('bangla_english_curriculum','tutor.english_bangla_curriculum_id','=','bangla_english_curriculum.id')
            ->select(['tutor.*','occupation.name as occupation_name','location.name as location_name','bangla_english_curriculum.curriculum_name'])
            ->orderBy('tutor.name')
            ->paginate(25);
        return view('tutor.index',compact('tutor','service_area','medium','class','subject'));
    }
    
    public function tutor_pending()
    {
        $tutor=DB::table('tutor')
            ->leftJoin('occupation','tutor.occupational_status_id','=','occupation.id')
            ->leftJoin('location','tutor.location_id','=','location.id')
            ->leftJoin('bangla_english_curriculum','tutor.english_bangla_curriculum_id','=','bangla_english_curriculum.id')
            ->select(['tutor.*','occupation.name as occupation_name','location.name as location_name','bangla_english_curriculum.curriculum_name'])
            ->orderBy('tutor.name')
            ->where('account_status', 0)
            ->paginate(25);
        return view('tutor.tutor _pending_list',compact('tutor'));
    }

    //tutor approve from pending list
    public function approve_tutor($id)
    {
        $id = base64_decode($id);
        $approve_tutor =  DB::table('tutor')
            ->where('id',$id)
            ->update(
                [
                    'account_status' =>1
                    
                ]
            );
        if ($approve_tutor) {
            return redirect()->back()->with('success', 'Tutor Approved Successfully'); 
        } else {
            return redirect()->back()->with('error', 'Approved Failed');
        }
        
    }

    //tutor reject from pending list
    public function reject_tutor($id)
    {
        $id = base64_decode($id);
        $approve_tutor =  DB::table('tutor')
            ->where('id',$id)
            ->update(
                [
                    'account_status' =>3
                    
                ]
            );
        if ($approve_tutor) {
            return redirect()->back()->with('success', 'Tutor Reject Successfully'); 
        } else {
            return redirect()->back()->with('error', 'Reject Failed');
        }
        
    }

    public function advance_search(Request $request){
        $service_area=DB::table('service_area')->where('status','=',1)->get(['id','name']);
        $medium=DB::table('medium')->where('medium_status','=',1)->get(['id','name']);
        $class=DB::table('class_table')->where('status','=',1)->get(['id','name']);
        $subject=DB::table('subject')->where('status','=',1)->get(['id','name']);

        $query=DB::table('tutor')
            ->leftJoin('occupation','tutor.occupational_status_id','=','occupation.id')
            ->leftJoin('location','tutor.location_id','=','location.id')
            ->leftJoin('bangla_english_curriculum','tutor.english_bangla_curriculum_id','=','bangla_english_curriculum.id')
            ->leftJoin('tutoring_preference','tutor.id','=','tutoring_preference.tutor_id')
            ->leftJoin('tutoring_location','tutor.id','=','tutoring_location.tutor_id')
            ->leftJoin('tutoring_class','tutor.id','=','tutoring_class.tutor_id')
            ->leftJoin('tutoring_subject','tutor.id','=','tutoring_subject.tutor_id')
            ->select(['tutor.*','occupation.name as occupation_name','location.name as location_name','bangla_english_curriculum.curriculum_name']);
        if($request->medium_id!=null){
            $query=$query->where('tutoring_preference.preferred_medium_id','=',$request->medium_id);
        }
        if($request->service_area_id!=null){
            $query=$query->where('tutor.service_area_id','=',$request->service_area_id);
        }
        if($request->location_id!=null){
            $query=$query->where('tutoring_location.location_id','=',$request->location_id);
        }
        if($request->gender!=null){
            $query=$query->where('tutor.gender','=',$request->gender);
        }
        if($request->class_id!=null){
            $query=$query->where('tutoring_class.class_id','=',$request->class_id);

        }
        if($request->subject_id!=null){
            $query=$query->where('tutoring_subject.subject_id','=',$request->subject_id);
        }
        if($request->account_status!=null){
            $query=$query->where('tutor.account_status','=',$request->account_status);

        }
        $tutors=$query->orderBy('tutor.name')->distinct('tutor.id')->paginate('25');
//        return $request->all();

        return view('tutor.advance_search', compact('tutors','medium','class','service_area','request','subject'));

    }

    public function name_search($name){
        $tutor=DB::table('tutor')
            ->leftJoin('occupation','tutor.occupational_status_id','=','occupation.id')
            ->leftJoin('location','tutor.location_id','=','location.id')
            ->leftJoin('bangla_english_curriculum','tutor.english_bangla_curriculum_id','=','bangla_english_curriculum.id')
            ->where('tutor.name','LIKE',"%$name%")
            ->orWhere('tutor.shikhao_id','LIKE',"%$name%")
            ->orWhere('tutor.contact_number','LIKE',"%$name%")
            ->select(['tutor.*','occupation.name as occupation_name','location.name as location_name','bangla_english_curriculum.curriculum_name'])
            ->orderBy('tutor.name')
            ->paginate(25);
        return view('tutor.name_search',compact('tutor'));
    }

    public function all(){
        $tutor=DB::table('tutor')
            ->leftJoin('occupation','tutor.occupational_status_id','=','occupation.id')
            ->leftJoin('location','tutor.location_id','=','location.id')
            ->leftJoin('bangla_english_curriculum','tutor.english_bangla_curriculum_id','=','bangla_english_curriculum.id')
            ->select(['tutor.*','occupation.name as occupation_name','location.name as location_name','bangla_english_curriculum.curriculum_name'])
            ->orderBy('tutor.name')
            ->paginate(25);
        return view('tutor.name_search',compact('tutor'));
    }

    public function storePersonalInfo(Request $request,$id){

        $this->validate($request,[
            'name'=>'required',
            'gender'=>'required',
            'contact_number'=>'required',
            'occupational_status_id'=>'required',
        ]);
        if($request->dob==null){
            $dob=null;
        }

        else{
            $dob=Carbon::parse($request->dob)->toDateString();
        }
        DB::table('tutor')->where('id','=',$id)->update([
            'name'=>$request->name,
            'facebook_username'=>$request->facebook_username,
            'contact_number'=>$request->contact_number,
            'gender'=>$request->gender,
            'occupational_status_id'=>$request->occupational_status_id,
            'dob'=>$dob,
            'fathers_name'=>$request->fathers_name,
            'mothers_name'=>$request->mothers_name,
            'parents_number'=>$request->parents_number,
            'nationalId'=>$request->nationalId,

        ]);

        Session::flash('success','Personal Information Updated');
        return redirect()->back();
    }

    public function storeLocation(Request $request,$id){
        $this->validate($request,[
            'service_area_id'=>'required',
            'location_id'=>'required',
        ]);

        DB::table('tutor')->where('id','=',$id)->update([
            'service_area_id'=>$request->service_area_id,
            'location_id'=>$request->location_id,
            'permanent_address'=>$request->permanent_address,

        ]);

        Session::flash('success','Address Updated');
        return redirect()->back();
    }

    public function storePreferredChoices(Request $request, $id){

        DB::table('tutoring_class')->where('tutor_id','=',$id)->delete();
        for($i=0;$i<count($request->class_id);$i++){
            $class[]=[
                'tutor_id'=>$id,
                'class_id'=>$request->class_id[$i],
            ];
        }

        DB::table('tutoring_class')->insert($class);

        DB::table('tutoring_subject')->where('tutor_id','=',$id)->delete();

        for ($i=0;$i<count($request->subject_id);$i++){
            $subject[]=[
                'tutor_id'=>$id,
                'subject_id'=>$request->subject_id[$i],
            ];
        }

        DB::table('tutoring_subject')->insert($subject);

        if(DB::table('tutoring_preference')->where('tutor_id','=',$id)->count()){
            DB::table('tutoring_preference')->where('tutor_id','=',$id)->update([
                'preferred_medium_id'=>$request->preferred_medium_id,
                'preferred_curriculum_id'=>$request->preferred_curriculum_id,
            ]);

        }
        else{
            DB::table('tutoring_preference')->insert([
                'tutor_id'=>$id,
                'preferred_medium_id'=>$request->preferred_medium_id,
                'preferred_curriculum_id'=>$request->preferred_curriculum_id,
            ]);

        }



        DB::table('tutoring_location')->where('tutor_id','=',$id)->delete();

        for ($i=0;$i<count($request->preferred_location_id);$i++){
            $tutoring_location[]=[
                'tutor_id'=>$id,
                'service_area_id'=>$request->preferred_service_area_id,
                'location_id'=>$request->preferred_location_id[$i]
            ];

        }


        DB::table('tutoring_location')->insert($tutoring_location);

        Session::flash('success','Tutoring Preferences Updated');
        return redirect()->back();


    }

    public function storeAvailability(Request $request, $id){
        if(isset($request->day)){
            DB::table('tutoring_day')->where('tutor_id','=',$id)->delete();
            for($i=0;$i<count($request->day);$i++){
                $day[]=[
                    'tutor_id'=>$id,
                    'day_id'=>$request->day[$i],
                ];
            }

            DB::table('tutoring_day')->insert($day);
        }
        DB::table('tutor')->where('id','=',$id)->update([
            'minimum_salary'=>$request->minimum_salary,
            'number_days_week'=>$request->number_days_week,

        ]);

        DB::table('tutoring_time')->where('tutor_id','=',$id)->delete();


        for ($i=0;$i<count($request->time);$i++){
            $time[]=[
                'tutor_id'=>$id,
                'time_id'=>$request->time[$i],
            ];
        }
        DB::table('tutoring_time')->insert($time);
        Session::flash('success','Tutor availability updated');
        return redirect()->back();

    }

    public function storeEducationInfo(Request $request, $id){
        $this->validate($request,[
            'school_id'=>'required',
            'medium_id'=>'required',
        ]);

        DB::table('tutor')->where('id','=',$id)->update([
            'school_id'=>$request->school_id,
            'medium_id'=>$request->medium_id,
            'english_bangla_curriculum_id'=>$request->english_bangla_curriculum_id,
            'ssc_result'=>$request->ssc_result,
            'hsc_result'=>$request->hsc_result,
            'university_id'=>$request->university_id,
            'department_id'=>$request->department_id,
            'semester_year_id'=>$request->semester_year_id,
            'university_student_id'=>$request->university_student_id,
        ]);

        Session::flash('success','Tutor Education Information Updated Successfully');
        return redirect()->back();



    }

    public function storeAccountInformation(Request $request,$id){
        DB::table('tutor')->where('id','=',$id)->update([
            'account_status'=>$request->account_status,
        ]);
        DB::table('users')->where('tutor_id','=',$id)->update([
            'status'=>$request->account_status,
        ]);
        Session::flash('success','Account Status Updated');
        return redirect()->back();
//        return $request->all();
    }

    public function storePassword(Request $request,$id){
        $this->validate($request,[
            'password'=>'required',
        ]);
        DB::table('tutor')->where('id','=',$id)->update([
            'password'=>bcrypt($request->password),
        ]);
        DB::table('users')->where('tutor_id','=',$id)->update([
            'password'=>bcrypt($request->password),
        ]);
        Session::flash('success','Tutor Password Updated');
        return redirect()->back();
    }

    public function storePhoto(Request $request, $id){
        $this->validate($request,[
            'image'=>'required|mimes:jpeg,bmp,png,jpg',
        ]);
        $query=DB::table('tutor')->where('id','=',$id)->first();
        $unique=$query->shikhao_id;
        $image=$query->image;
        if($image!=null){
            $path = public_path() . "/Tutor_Images/" . $image;
            if (file_exists($path)) {
                unlink($path);
            }

        }
        if($file=$request->file('image')){
            if($request->file('image')->getClientSize()>2000000)
            {
                Session::flash('error','Could Not Upload. File Size Limit Exceeded.');
                return redirect()->back();

            }
            $name=$unique."_".$file->getClientOriginalName();
            $file->move('Tutor_Images',$name);
            DB::table('tutor')->where('id','=',$id)->update([
                'image'=>$name,
            ]);


        }

        Session::flash('success','Image Updated');
        return redirect()->back();
    }

    public function add_credentials(Request $request)
    {
        
        if($file=$request->file('attachment')){
            if($request->file('attachment')->getClientSize()>2000000)
            {
                Session::flash('error','Could Not Upload. File Size Limit Exceeded.');
                return redirect()->back();

            }
            
            $unique=hexdec(uniqid());
            $name=$unique."_".$file->getClientOriginalName();
            $file->move('Tutor_Credentials',$name);

            $tutor_attachment = DB::table('tutor_attachment')->insert([
                'tutor_id'=>$request->tutor_id,
                'title'=>$request->title,
                'attachment'=>$name,
                
                'created_by'=>Auth::user()->id,
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ]);

            if ($tutor_attachment) {
                Session::flash('success','Credentials added successfully.');
                return redirect()->back();
            } else {
                Session::flash('error','Credentials added failed.');
                return redirect()->back();
            }
            
        }else {
            Session::flash('error','No file Found !!!');
            return redirect()->back();
        }
        
    }

    public function delete_credentials($id)
    {
        $tutor_attachment=DB::table('tutor_attachment')->WHERE('id',$id)->first();
    //dd($tutor_attachment);
        if($tutor_attachment){
           
            $attachment = public_path().'/Tutor_Credentials/'.$tutor_attachment->attachment;
            unlink($attachment);

            $tutor_attachment=DB::table('tutor_attachment')->WHERE('id',$id)->delete();
            
            if ($tutor_attachment) {
                Session::flash('success', 'Credentials Successfully Deleted!');
                return redirect()->back();
            } else {
                Session::flash('error', 'Credentials Deleted failed !!!');
                return redirect()->back();
            }
           
        }
    }
}
