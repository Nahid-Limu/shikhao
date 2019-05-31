<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::group(['middleware'=>'auth'],function (){
//Dashboard view route start
    Route::get('/','DashboardController@dashboard_view');
    Route::get('/home','DashboardController@dashboard_view');
    Route::get('/dashboard','DashboardController@dashboard_view');
    Route::post('/change/pass','DashboardController@change_password')->name('changePass');
    Route::get('/logout', 'Auth\LoginController@logout');
//Dashboard view route end


//Medium route start
    Route::get('/medium',['middleware'=>'check-permission:admin|super|executive','uses'=>'MediumController@index'])->name('medium.index');
    Route::get('/medium/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'MediumController@show'])->name('medium.show');
    Route::post('/medium',['middleware'=>'check-permission:admin|super','uses'=>'MediumController@store'])->name('medium.store');
    Route::get('/medium/{id}/edit',['middleware'=>'check-permission:admin|super|executive','uses'=>'MediumController@edit'])->name('medium.edit');
    Route::match(['put','patch'],'/medium/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'MediumController@update'])->name('medium.update');
//Medium route end



//Curriculum route start
    Route::get('/curriculum',['middleware'=>'check-permission:admin|super|executive','uses'=>'CurriculumController@index'])->name('curriculum.index');
    Route::get('/curriculum/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'CurriculumController@show'])->name('curriculum.show');
    Route::post('/curriculum',['middleware'=>'check-permission:admin|super','uses'=>'CurriculumController@store'])->name('curriculum.store');
    Route::get('/curriculum/{id}/edit',['middleware'=>'check-permission:admin|super|executive','uses'=>'CurriculumController@edit'])->name('curriculum.edit');
    Route::match(['put','patch'],'/curriculum/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'CurriculumController@update'])->name('curriculum.update');
//Curriculum route end


//ServiceArea route start
    Route::get('/service_area',['middleware'=>'check-permission:admin|super|executive','uses'=>'ServiceAreaController@index'])->name('service_area.index');
    Route::get('/service_area/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'ServiceAreaController@show'])->name('service_area.show');
    Route::post('/service_area',['middleware'=>'check-permission:admin|super','uses'=>'ServiceAreaController@store'])->name('service_area.store');
    Route::get('/service_area/{id}/edit',['middleware'=>'check-permission:admin|super|executive','uses'=>'ServiceAreaController@edit'])->name('service_area.edit');
    Route::match(['put','patch'],'/service_area/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'ServiceAreaController@update'])->name('service_area.update');
//ServiceArea route end

//Location route start
    Route::get('/location',['middleware'=>'check-permission:admin|super|executive','uses'=>'LocationController@index'])->name('location.index');
    Route::get('/location/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'LocationController@show'])->name('location.show');
    Route::post('/location',['middleware'=>'check-permission:admin|super','uses'=>'LocationController@store'])->name('location.store');
    Route::get('/location/{id}/edit',['middleware'=>'check-permission:admin|super|executive','uses'=>'LocationController@edit'])->name('location.edit');
    Route::match(['put','patch'],'/location/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'LocationController@update'])->name('location.update');
//Location route end


//Institute route start
    Route::get('/school',['middleware'=>'check-permission:admin|super|executive','uses'=>'InstituteController@index'])->name('institute.index');
    Route::get('/school/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'InstituteController@show'])->name('institute.show');
    Route::post('/school',['middleware'=>'check-permission:admin|super','uses'=>'InstituteController@store'])->name('institute.store');
    Route::get('/school/{id}/edit',['middleware'=>'check-permission:admin|super|executive','uses'=>'InstituteController@edit'])->name('institute.edit');
    Route::match(['put','patch'],'/school/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'InstituteController@update'])->name('institute.update');
//Institute route end

//University route start
    Route::get('/university',['middleware'=>'check-permission:admin|super|executive','uses'=>'UniversityController@index'])->name('university.index');
    Route::get('/university/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'UniversityController@show'])->name('university.show');
    Route::post('/university',['middleware'=>'check-permission:admin|super','uses'=>'UniversityController@store'])->name('university.store');
    Route::get('/university/{id}/edit',['middleware'=>'check-permission:admin|super|executive','uses'=>'UniversityController@edit'])->name('university.edit');
    Route::match(['put','patch'],'/university/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'UniversityController@update'])->name('university.update');
//University route end


//Department route start
    Route::get('/department',['middleware'=>'check-permission:admin|super|executive','uses'=>'DepartmentController@index'])->name('department.index');
    Route::get('/department/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'DepartmentController@show'])->name('department.show');
    Route::post('/department',['middleware'=>'check-permission:admin|super','uses'=>'DepartmentController@store'])->name('department.store');
    Route::get('/department/{id}/edit',['middleware'=>'check-permission:admin|super|executive','uses'=>'DepartmentController@edit'])->name('department.edit');
    Route::match(['put','patch'],'/department/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'DepartmentController@update'])->name('department.update');
//Department route end

//Class Table route start
    Route::get('/class_table',['middleware'=>'check-permission:admin|super|executive','uses'=>'ClassTableController@index'])->name('class_table.index');
    Route::get('/class_table/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'ClassTableController@show'])->name('class_table.show');
    Route::post('/class_table',['middleware'=>'check-permission:admin|super','uses'=>'ClassTableController@store'])->name('class_table.store');
    Route::get('/class_table/{id}/edit',['middleware'=>'check-permission:admin|super|executive','uses'=>'ClassTableController@edit'])->name('class_table.edit');
    Route::match(['put','patch'],'/class_table/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'ClassTableController@update'])->name('class_table.update');
//Class Table route end

//Subject Table route start
    Route::get('/subject',['middleware'=>'check-permission:admin|super|executive','uses'=>'SubjectController@index'])->name('subject.index');
    Route::get('/subject/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'SubjectController@show'])->name('subject.show');
    Route::post('/subject',['middleware'=>'check-permission:admin|super','uses'=>'SubjectController@store'])->name('subject.store');
    Route::get('/subject/{id}/edit',['middleware'=>'check-permission:admin|super|executive','uses'=>'SubjectController@edit'])->name('subject.edit');
    Route::match(['put','patch'],'/subject/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'SubjectController@update'])->name('subject.update');
//Subject Table route end

//Education Board route start
    Route::get('/education_board',['middleware'=>'check-permission:admin|super|executive','uses'=>'EducationBoardController@index'])->name('education_board.index');
    Route::get('/education_board/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'EducationBoardController@show'])->name('education_board.show');
    Route::post('/education_board',['middleware'=>'check-permission:admin|super','uses'=>'EducationBoardController@store'])->name('education_board.store');
    Route::get('/education_board/{id}/edit',['middleware'=>'check-permission:admin|super|executive','uses'=>'EducationBoardController@edit'])->name('education_board.edit');
    Route::match(['put','patch'],'/education_board/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'EducationBoardController@update'])->name('education_board.update');
//Education Board route end

//Grade Point route start
    Route::get('/grade_point',['middleware'=>'check-permission:admin|super|executive','uses'=>'GradePointController@index'])->name('grade_point.index');
    Route::get('/grade_point/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'GradePointController@show'])->name('grade_point.show');
    Route::post('/grade_point',['middleware'=>'check-permission:admin|super','uses'=>'GradePointController@store'])->name('grade_point.store');
    Route::get('/grade_point/{id}/edit',['middleware'=>'check-permission:admin|super|executive','uses'=>'GradePointController@edit'])->name('grade_point.edit');
    Route::match(['put','patch'],'/grade_point/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'GradePointController@update'])->name('grade_point.update');
//Grade Point route end

//Semester Year route start
    Route::get('/semester_year',['middleware'=>'check-permission:admin|super|executive','uses'=>'SemesterYearController@index'])->name('semester_year.index');
    Route::get('/semester_year/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'SemesterYearController@show'])->name('semester_year.show');
    Route::post('/semester_year',['middleware'=>'check-permission:admin|super','uses'=>'SemesterYearController@store'])->name('semester_year.store');
    Route::get('/semester_year/{id}/edit',['middleware'=>'check-permission:admin|super|executive','uses'=>'SemesterYearController@edit'])->name('semester_year.edit');
    Route::match(['put','patch'],'/semester_year/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'SemesterYearController@update'])->name('semester_year.update');
//Semester Year route end


//Semester Year route start
    Route::get('/occupation',['middleware'=>'check-permission:admin|super|executive','uses'=>'OccupationController@index'])->name('occupation.index');
    Route::get('/occupation/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'OccupationController@show'])->name('occupation.show');
    Route::post('/occupation',['middleware'=>'check-permission:admin|super','uses'=>'OccupationController@store'])->name('occupation.store');
    Route::get('/occupation/{id}/edit',['middleware'=>'check-permission:admin|super|executive','uses'=>'OccupationController@edit'])->name('occupation.edit');
    Route::match(['put','patch'],'/occupation/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'OccupationController@update'])->name('occupation.update');
//Semester Year route end


//Tutor route start
    Route::get('/tutor/create',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'TutorController@create'])->name('tutor.create');
    Route::post('/tutor',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'TutorController@store'])->name('tutor.store');
    Route::get('/tutor',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'TutorController@index'])->name('tutor.index');
    Route::get('/tutor_pending',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'TutorController@tutor_pending'])->name('tutor.pending');
    Route::get('/tutor_advance_search',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'TutorController@advance_search'])->name('tutor.advance_search');
    Route::get('/tutor_name_search/{name}',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'TutorController@name_search'])->name('tutor.name_search');
    Route::get('/tutor_all/',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'TutorController@all'])->name('tutor.all');
    Route::get('/tutor/approve/{id}',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'TutorController@approve_tutor'])->name('tutor.approve');
    Route::get('/tutor/reject/{id}',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'TutorController@reject_tutor'])->name('tutor.reject');
    Route::get('/tutor/{id}',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'TutorController@show'])->name('tutor.show');
    Route::patch('/tutor_personal_information/{id}',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'TutorController@storePersonalInfo']);
    Route::patch('/tutor_location/{id}',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'TutorController@storeLocation']);
    Route::patch('/tutor_preferred_choices/{id}',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'TutorController@storePreferredChoices']);
    Route::patch('/tutor_availability/{id}',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'TutorController@storeAvailability']);
    Route::patch('/tutor_education_info/{id}',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'TutorController@storeEducationInfo']);
    Route::patch('/tutor_account_information/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'TutorController@storeAccountInformation']);
    Route::patch('/tutor_password/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'TutorController@storePassword']);
    Route::patch('/tutor_image/{id}',['middleware'=>'check-permission:admin|super|executive','uses'=>'TutorController@storePhoto']);
    Route::post('/tutor/add_credentials',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'TutorController@add_credentials'])->name('tutor.add_credentials');
    Route::get('/tutor/delete_credentials/{id}',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'TutorController@delete_credentials'])->name('tutor.delete_credentials');
//Subject Result route start
    Route::post('tutor_subject_result',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'SubjectResultController@store_hsc'])->name('tutor_subject_result.store_hsc');
    Route::delete('tutor_subject_result/{id}',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'SubjectResultController@delete_hsc'])->name('hsc_subject_result.delete');
    Route::post('tutor_subject_result_a',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'SubjectResultController@store_a_level'])->name('tutor_subject_result.store_a_level');
    Route::delete('tutor_subject_result_a/{id}',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'SubjectResultController@delete_a'])->name('a_subject_result.delete');
    Route::post('tutor_subject_result_o',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'SubjectResultController@store_o_level'])->name('tutor_subject_result.store_o_level');
    Route::delete('tutor_subject_result_o/{id}',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'SubjectResultController@delete_o'])->name('o_subject_result.delete');

    
//Subject Result route end
//Tutor route end

//AJAX REQUESTS route start
    Route::get('/ajax/get_location',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'LocationController@get_location'])->name('service_area.get_location');
    Route::get('/ajax/get_curriculum',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'CurriculumController@get_curriculum'])->name('ajax.get_curriculum');
    Route::get('/ajax/get_preferred_curriculum',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'CurriculumController@get_preferred_curriculum'])->name('ajax.get_preferred_curriculum');
    Route::get('/ajax/get_class',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'ClassTableController@get_class'])->name('ajax.get_class');
    Route::get('/ajax/get_subject',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'SubjectController@get_subject'])->name('ajax.get_subject');
    Route::get('/ajax/get_institute',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'InstituteController@get_institute'])->name('ajax.get_institute');



//AJAX REQUESTS route end


//Student route start
    Route::get('/student',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'StudentController@index'])->name('student.index');
    Route::post('/student/add',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'StudentController@addStudent'])->name('student.add');
    Route::get('/student/list',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'StudentController@student_list'])->name('student.list');
    Route::get('/student/approve/{id}',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'StudentController@approve_student'])->name('student.approve');
    Route::get('/student/profile/{id}',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'StudentController@profile'])->name('student.profile');
    Route::get('/student/reject/{id}',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'StudentController@reject_student'])->name('student.reject');
    Route::post('/profile_editInfo',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'StudentController@updatePersonalInfo'])->name('student.edit.personalInfo');
    Route::post('/profile_updateStudentStatus',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'StudentController@updateStudentStatus'])->name('student.update.studentStatus');
    Route::get('/student/panding_list',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'StudentController@student_pending_list'])->name('student.pendingList');
    Route::get('/student_name_search/{name}',['middleware'=>'check-permission:admin|super|executive','uses'=>'StudentController@name_search'])->name('student.name_search');
    Route::get('/student_all',['middleware'=>'check-permission:admin|super|executive','uses'=>'StudentController@all'])->name('student.all');
    Route::get('/student_advance_search',['middleware'=>'check-permission:admin|super|executive','uses'=>'StudentController@advance_search'])->name('student.advance_search');


//Student route start

//Job route start
    Route::get('/job',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'JobController@index'])->name('job.index');
    Route::get('/advance_search_tutor/job',['middleware'=>'check-permission:admin|super|executive','uses'=>'JobController@advance_search_tutor'])->name('job.advance_search_tutor');
    Route::post('/job/post',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'JobController@postJob'])->name('job.post');
    Route::post('/assign_tutor',['middleware'=>'check-permission:admin|super|executive','uses'=>'JobController@assign_tutor'])->name('job.assign_tutor');
    Route::get('/job/list',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'JobController@job_list'])->name('job.list');
    Route::get('/job/search',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'JobController@job_search'])->name('job.search');
    Route::get('/job/list_pending',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'JobController@job_pending_list'])->name('job.list.pending');
    Route::get('/job/approve/{id}',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'JobController@approve_post'])->name('job.approve');
    Route::get('/job/reject/{id}',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'JobController@reject_post'])->name('job.reject');
    Route::get('/job/view/{id}',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'JobController@view_job'])->name('job.view');
    Route::get('/job/edit/{id}',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'JobController@edit_view'])->name('job.edit');
    Route::get('/job_update/{id}',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'JobController@update_job'])->name('job.update');
    Route::get('/job/confirmed_list',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'JobController@job_confirmed_list'])->name('job.confirmed.list');
    Route::get('/job/confirmed/view/{id}',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'JobController@view_confirmed_job'])->name('job.confirmed.view');
    Route::get('/job/confirmed/update_Preference_Details',['middleware'=>'check-permission:admin|super|executive|student','uses'=>'JobController@update_Preference_Details'])->name('job.update_Preference_Details');
    
//Job route End


//User route start
    Route::get('create_user',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'UserController@create_user_view'])->name('createUser.view');
    Route::post('store_user',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'UserController@store_user'])->name('createUser.store_user');
    Route::get('user_list',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'UserController@user_list'])->name('user.list');
    Route::get('active_inactive_user/{id}/{status}',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'UserController@active_inactive_user'])->name('user.active_inactive');
    Route::get('user_profile',['middleware'=>'check-permission:admin|super|executive|tutor','uses'=>'UserController@user_profile'])->name('user.user_profile');
    
//User route end

//Notification route Start
    Route::get('/notification_read',['middleware'=>'check-permission:admin|super|executive','uses'=>'NotificationController@read'])->name('notification.read');

//Notification route End
});
















