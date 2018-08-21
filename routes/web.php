<?php
use App\User;
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

//Route::get('/', function () {
//    return view('welcome');
//});

//student route





Route::get('/', function () {
    return view('welcome');
});

//student profile and score view
Route::get('/studentProfile', 'HomeController@index')->name('home.profile');
//view prek score for pre-k and k student
Route::get('/student/prekScore/{grade_id}/{student_id}', 'HomeController@viewPrekScore')->name('student.prekscore');
//view primary and secondary score student side
Route::get('/student/Secondary/{grade_id}/{student_id}', 'HomeController@viewSecondaryScore')->name('student.secondary');
//view high school score student side
Route::get('/student/highschool/{grade_id}/{student_id}', 'HomeController@viewHighschoolScore')->name('student.highschool');



//employer login
Route::get('/employer/login', 'Auth\EmployerLoginController@showLoginForm')->name('employer.login');
Route::post('/employer/login', 'Auth\EmployerLoginController@employerLogin')->name('employer.login.submit');
//employer register
Route::get('/employer/register', 'Auth\EmployerRegisterController@showEmployerRegisterForm')->name('employer.register');
Route::post('/employer/register', 'Auth\EmployerRegisterController@employerRegister')->name('employer.register.submit');
Route::get('/employer/{id}', 'EmployerController@index')->name('employer.profile');
Route::get('/employer', 'EmployerController@index')->name('employer.dashboard');

Route::get('/employer/viewAllJobs', 'EmployerController@employeeAllJobs')->name('employer.viewAllJobs');
Route::get('/employer/edit/{id}', 'EmployerController@edit')->name('employer.edit');
Route::post('/employer/update/{id}', 'EmployerController@update')->name('employer.update');
//change password for employer
Route::get('/employer/changepassword/{id}', 'EmployerController@showPassForm')->name('employer.showPasswordForm');
Route::post('/employer/changepassword/{id}', 'EmployerController@updatePassword')->name('employer.changePassword');

//create job by employer
Route::get('employer/createjob/post/{id}', 'EmployerJobController@create')->name('employer.createjob.create');
Route::post('employer/createjob/{id}', 'EmployerJobController@store')->name('employer.createjob.postjob');
Route::get('employer/createjob/edit/{id}/{company_id}', 'EmployerJobController@edit')->name('employer.createjob.edit');
Route::post('employer/createjob/update/{id}/{company_id}', 'EmployerJobController@update')->name('employer.createjob.update');



Route::get('/form', 'PagesController@form');
Route::post('/form', 'PagesController@store');

Auth::routes();
Route::get('/about', 'PagesController@getAbout');
Route::get('/about/setting', 'PagesController@aboutSetting')->name('about.setting');
Route::post('/about/setting', 'PagesController@aboutPageSetting')->name('about.pageSetting');

Route::get('/contact', 'PagesController@getContact');










// Route::get('/home/job', 'HomeController@showJobForm')->name('home.jobform');
// Route::post('/home/job', 'HomeController@createjob')->name('home.jobform.submit');

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

//user route controller
Route::get('/user/profile', 'ProfileController@index')->name('user.profile');
Route::post('/user/profile/update', 'ProfileController@update')->name('user.profile.update');
//upload CV
Route::get('/user/uploadcv', 'UploadCvController@uploadCv')->name('user.uploadcv');
Route::post('/user/uploadcvFunction', 'UploadCvController@uploadCvFunction')->name('user.uploadcvFunction');
Route::get('/user/uploadcv/delete/{id}', 'UploadCvController@destroy')->name('user.cv.delete');


Route::resource('/user', 'ProfileController');

// //build CV
// Route::resource('/mycv', 'CvController');
// Route::post('/mycv/update/{id}', 'CvController@update')->name('mycv.update');
// Route::get('/mycv/delete/{id}', 'CvController@destroy')->name('mycv.delete');

//user education route

// Route::resource('/education', 'UserEducationController');
// Route::post('/education/update/{id}', 'UserEducationController@update')->name('education.update');
// Route::get('/education/delete/{id}', 'UserEducationController@destroy')->name('education.delete');




Route::prefix('admin')->group(function () {

    Route::get('/student/register', 'StudentController@showRegisterForm')->name('student.register');
    Route::post('/student/register', 'StudentController@studentRegister')->name('student.register.create');
    Route::get('/student/viewStudent', 'StudentController@viewStudent')->name('student.viewAll');
    //view student detail
    Route::get('/student/detail/{student_id}', 'StudentController@studentDetail')->name('student.detail');
    //show student edit form
    Route::get('/student/detail/edit/{id}', 'StudentController@editStudent')->name('student.detail.edit');
    //update student info
    Route::post('/student/detail/update/{id}', 'StudentController@updateStudent')->name('student.detail.update');
    //delete student
    Route::get('/student/detail/delete/{id}', 'StudentController@deleteStudent')->name('student.detail.delete');



    Route::get('/login', 'auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'auth\AdminLoginController@login')->name('admin.login.submit');

    // Route::get('/postjob', 'AdminController@showPostjobForm')->name('admin.postjob');
    // Route::post('/postjob', 'AdminController@postjob')->name('admin.postjob.submit');


//Query subject by grade
    Route::get('/student/score/{grade_id}/{student_id}', 'StudentController@SubjectByGrade')->name('subject.score');
//insert data to score table
    Route::post('/student/score/insert/{student_id}/{grade_id}', 'StudentController@insertScore')->name('student.score.insert');
//delete data from score table
    Route::get('/score/delete/{id}', 'StudentController@destroyScore')->name('student.score.delete');
//edit data from score table
    Route::get('score/edit/{score_id}/{grade_id}/{student_id}', 'StudentController@editScore')->name('student.score.edit');

//update score
    Route::post('score/update/{score_id}/{grade_id}/{student_id}', 'StudentController@updateScore')->name('score.update');
//setting menu
    Route::get('/score/menu/{id}', 'StudentController@scoreMenu')->name('score.menu');
//View student score
    Route::get('/score/{grade_id}/{student_id}', 'StudentController@viewScore')->name('score.view');



// secondary score

    Route::get('/score/secondary/{grade_id}/{student_id}', 'SecondaryController@secondaryScore')->name('score.secondary');
//add subject to secondary score
    Route::get('/secondary/addSubject/{grade_id}/{student_id}', 'SecondaryController@showSecondaryAddSubject')->name('secondary.addSubject');
    Route::post('/secondary/insertSubject/{grade_id}/{student_id}', 'SecondaryController@secondaryAddSubject')->name('secondary.insertSubject');
//edit data from secondaryScore table
    Route::get('secondaryScore/edit/{score_id}/{grade_id}/{student_id}', 'SecondaryController@editSecondaryScoreForm')->name('secondary.score.edit');
    //update score
    Route::post('secondaryScore/update/{score_id}/{grade_id}/{student_id}', 'SecondaryController@updateSecondaryScore')->name('secondaryScore.update');
    //delete data from SecondaryScore table
    Route::get('/secondaryScore/delete/{id}', 'SecondaryController@destroySecondaryScore')->name('secondary.score.delete');

//K and Pre-k Score

    Route::get('/prekscore/view/{grade_id}/{student_id}', 'PrekController@prekScore')->name('prekschool.score');
//add subject to pre-k and k score
    Route::get('/prekscore/addSubject/{grade_id}/{student_id}', 'PrekController@showPrekAddSubject')->name('prek.addSubject');
    Route::post('/prekscore/insertSubject/{grade_id}/{student_id}', 'PrekController@prekAddSubject')->name('prek.insertSubject');
//edit data from  prekScore table
    Route::get('prekscore/edit/{score_id}/{grade_id}/{student_id}', 'PrekController@editPrekScoreForm')->name('prek.score.edit');
//update score
    Route::post('prekscore/update/{score_id}/{grade_id}/{student_id}', 'PrekController@updatePrekScore')->name('prek.update');
//delete data from prekScore table
    Route::get('/prekscore/delete/{id}', 'PrekController@destroyPrekScore')->name('prek.score.delete');


  //print section
    Route::get('/selectTranscript/{student_id}', 'TranscriptController@selectTranscript')->name('select.transcript');

    Route::get('/selectOption/{student_id}', 'TranscriptController@selectOption')->name('select.option');








//view Grade
    Route::get('/grade', 'GradeController@index')->name('grade.index');
    Route::post('/grade', 'GradeController@store')->name('grade.store');
    Route::get('/grade/delete/{id}', 'GradeController@destroy')->name('grade.delete');
    Route::get('/grade/edit/{id}', 'GradeController@edit')->name('grade.edit');
    Route::post('/grade/update/{id}', 'GradeController@update')->name('grade.update');
//setting grade for K and pre-k
    Route::get('/prek', 'GradeController@showPrek')->name('grade.prek');
    Route::post('/prekt', 'GradeController@storePrek')->name('grade.prek.store');
    Route::get('/prek/delete/{id}', 'GradeController@destroyPrek')->name('grade.prek.delete');
    Route::get('/prek/edit/{id}', 'GradeController@editPrek')->name('grade.prek.edit');
    Route::post('/prek/update/{id}', 'GradeController@updatePrek')->name('grade.prek.update');

    //setting grade for Primary school
    Route::get('/primary', 'GradeController@showPrimary')->name('grade.primary');
    Route::post('/primary', 'GradeController@storePrimary')->name('grade.primary.store');
    Route::get('/primary/delete/{id}', 'GradeController@destroyPrimary')->name('grade.primary.delete');
    Route::get('/primary/edit/{id}', 'GradeController@editPrimary')->name('grade.primary.edit');
    Route::post('/primary/update/{id}', 'GradeController@updatePrimary')->name('grade.primary.update');

    //setting grade for Second school
    Route::get('/secondary', 'GradeController@showSecondary')->name('grade.secondary');
    Route::post('/secondary', 'GradeController@storeSecondary')->name('grade.secondary.store');
    Route::get('/secondary/delete/{id}', 'GradeController@destroySecondary')->name('grade.secondary.delete');
    Route::get('/secondary/edit/{id}', 'GradeController@editSecondary')->name('grade.secondary.edit');
    Route::post('/secondary/update/{id}', 'GradeController@updateSecondary')->name('grade.secondary.update');




//setting subject
    Route::get('/subject', 'SubjectController@index')->name('subject.index');
    Route::post('/subject', 'SubjectController@store')->name('subject.store');
    Route::get('/subject/delete/{id}', 'SubjectController@destroy')->name('subject.delete');
    Route::get('/subject/edit/{id}', 'SubjectController@edit')->name('subject.edit');
    Route::post('/subject/update/{id}', 'SubjectController@update')->name('subject.update');


//setting subject for k and pre-k
    Route::get('/subject/prek', 'SubjectController@showPrek')->name('subject.prek');
    Route::post('/subject/prek', 'SubjectController@storePrek')->name('subject.prek.store');
    Route::get('/subject/prek/delete/{id}', 'SubjectController@destroyPrek')->name('subject.prek.delete');
    Route::get('/subject/prek/edit/{id}', 'SubjectController@editPrek')->name('subject.prek.edit');
    Route::post('/subject/prek/update/{id}', 'SubjectController@updatePrek')->name('subject.prek.update');

//--------pre-k score------------------------------
    Route::get('/prek/score', 'PrekController@viewScorePrek')->name('prek.score');
    

//setting subject for primary and secondary

    Route::get('/subject/primary', 'SubjectController@showPrimary')->name('subject.primary');
    Route::post('/subject/primary', 'SubjectController@storePrimary')->name('subject.primary.store');
    Route::get('/subject/primary/delete/{id}', 'SubjectController@destroyPrimary')->name('subject.primary.delete');
    Route::get('/subject/primary/edit/{id}', 'SubjectController@editPrimary')->name('subject.primary.edit');
    Route::post('/subject/primary/update/{id}', 'SubjectController@updatePrimary')->name('subject.primary.update');



    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

//    //Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');


//user-admin profile
    Route::get('/showAdminProfile/{id}', 'AdminController@showAdminProfile')->name('admin.adminProfile');
    Route::get('/adminProfile/edit/{id}', 'AdminController@EditAdminProfileForm')->name('admin.adminProfile.edit');
    Route::post('/adminProfile/edit/{id}', 'AdminController@updateAdminProfile')->name('admin.adminProfile.edit');
    Route::get('/adminProfile/delete/{id}', 'AdminController@destroy')->name('admin.adminProfile.delete');

    Route::get('/register', 'AdminController@showRegister')->name('admin.register');
    Route::post('/register/user', 'AdminController@store')->name('admin.storeUser');

    Route::get('/allUser', 'AdminController@showAllUser')->name('admin.showUsers');
    Route::get('/adminProfile/{id}', 'AdminController@makeAdmin')->name('admin.makeAdmin');
    Route::get('/adminProfileRemovePermission/{id}', 'AdminController@removePermission')->name('admin.removeAdmin');

    //update admin password

    Route::get('/updatePassword/{id}', 'AdminController@formUpdatePassword')->name('admin.updatepassword');
    Route::post('/updatePassword/{id}', 'AdminController@updatePassword');

//    // Password reset routes
//    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
//    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
//    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
//    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
//    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');


// employee route
//    Route::prefix('employer')->group(function () {
//
//        //Route::get('/register', 'employer\EmployerRegisterController@createRegister')->name('employer.register');
//        Route::get('/login', 'employer\EmployerLoginController@showLoginForm')->name('employer.login');
//
//    });

   // Route::get('/employer', 'EmployerControler@index');


   //setting absent for high school
   Route::get('/absent', 'AbsentController@show')->name('show.absent');
   Route::post('/absent', 'AbsentController@store')->name('store.absent');
   Route::get('/absent/delete/{id}', 'AbsentController@destroy')->name('destroy.absent');
   Route::get('/absent/edit/{id}', 'AbsentController@edit')->name('edit.absent');
   Route::post('/absent/update/{id}', 'AbsentController@update')->name('update.absent');

   //record student absent
   Route::get('/absent/show/{student_id}', 'AbsentController@showAbsent')->name('show.absentRecord');
   //record high school student absent by grade
   Route::get('/highSchool/absent/{grade_id}/{student_id}', 'AbsentController@highSchoolAbsent')->name('highSchool.absentRecord');
  // add new absent route
   Route::post('/highSchool/absentInsert/{grade_id}/{student_id}', 'AbsentController@storeHighSchoolAbsent')->name('store.highSchool.absentRecord');
  // Edit absent record for highschool
     Route::get('/highSchool/absentEdit/{grade_id}/{student_id}/{absentRecord_id}', 'AbsentController@editHighSchoolAbsent')->name('edit.highSchool.absentRecord');
  //update absent record for highschool
     Route::post('/highSchool/absentUpdate/{grade_id}/{student_id}/{absentRecord_id}', 'AbsentController@updateHighSchoolAbsent')->name('update.highSchool.absentRecord');

  //update absent record for highschool
     Route::get('/highSchool/absentDelete/{grade_id}/{student_id}/{absentRecord_id}', 'AbsentController@deleteHighSchoolAbsent')->name('delete.highSchool.absentRecord');






});




