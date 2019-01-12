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


//update admin password for student

    Route::get('/student/updatePassword/{id}', 'HomeController@passwordForm')->name('student.passwordFrom');
    Route::post('student/updatePassword/{id}', 'HomeController@updatePassword')->name('student.updatePassword');






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
    //view student by grade
    Route::get('/student/byGrade', 'StudentController@viewByGrade')->name('student.byGrade');

    //view detail grade
    Route::get('/student/detailByGrade/{grade_profile_id}', 'StudentController@viewAllStudentByGrade')->name('view.allStudent.byGrade');
    //view student detail
    Route::get('/student/detail/{student_id}', 'StudentController@studentDetail')->name('student.detail');
    //show student edit form
    Route::get('/student/detail/edit/{id}', 'StudentController@editStudent')->name('student.detail.edit');
    //update student info
    Route::post('/student/detail/update/{id}', 'StudentController@updateStudent')->name('student.detail.update');
    //delete student
    Route::get('/student/detail/delete/{id}', 'StudentController@deleteStudent')->name('student.detail.delete');



    //change student password
    Route::post('/student/changePassword/{id}', 'StudentController@changeStudentPassword')->name('student.changePassword');  
    Route::get('/student/changePassword/{id}', 'StudentController@passwordForm')->name('student.changePassword');   



    Route::get('/login', 'auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'auth\AdminLoginController@login')->name('admin.login.submit');

    // Route::get('/postjob', 'AdminController@showPostjobForm')->name('admin.postjob');
    // Route::post('/postjob', 'AdminController@postjob')->name('admin.postjob.submit');


//Query subject by grade
    Route::get('/student/score/{grade_id}/{student_id}', 'StudentController@SubjectByGrade')->name('subject.score');
    //show all subjects form to add to score table in high school student
    Route::get('/student/score/highSchool/{grade_id}/{student_id}', 'StudentController@showHighScoreForm')->name('subject.highschool.showAllscore');
//insert data to score table
    Route::post('/student/score/insert/{student_id}/{grade_id}', 'StudentController@insertScore')->name('student.score.insert');
    //insert all subject to high school student
    Route::post('/student/allSubjects/insert/{student_id}/{grade_id}', 'StudentController@insertAllSubjectsToScore')->name('student.allSubjects.insert');
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
    //add add subject at one time
    Route::get('/secondary/addAllSubject/{grade_id}/{student_id}', 'SecondaryController@showSecondaryAddAllSubject')->name('secondary.addAllSubject');


    Route::post('/secondary/insertSubject/{grade_id}/{student_id}', 'SecondaryController@secondaryAddSubject')->name('secondary.insertSubject');
    //insert all subject to secondary score
    Route::post('/secondary/insertAllSubject/{grade_id}/{student_id}', 'SecondaryController@secondaryInsertAllSubject')->name('secondary.insertAllSubject');
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
//add all subject to pre-k and k score table at one time
    Route::get('/prekscore/AllSubjects/{grade_id}/{student_id}', 'PrekController@showAllPrekSubject')->name('show.prek.allsubject');

    //add all subject to pre-k and k score table at one time
    Route::post('/prekscore/insertAllSubjects/{grade_id}/{student_id}', 'PrekController@insertAllPrekSubject')->name('prek.insert.allSubject');

    Route::post('/prekscore/insertSubject/{grade_id}/{student_id}', 'PrekController@prekAddSubject')->name('prek.insertSubject');


//edit data from  prekScore table
    Route::get('prekscore/edit/{score_id}/{grade_id}/{student_id}', 'PrekController@editPrekScoreForm')->name('prek.score.edit');
//update score
    Route::post('prekscore/update/{score_id}/{grade_id}/{student_id}', 'PrekController@updatePrekScore')->name('prek.update');
//delete data from prekScore table
    Route::get('/prekscore/delete/{id}', 'PrekController@destroyPrekScore')->name('prek.score.delete');





//view Grade
    Route::get('/grade', 'GradeController@index')->name('grade.index');
    Route::post('/grade', 'GradeController@store')->name('grade.store');
    Route::get('/grade/delete/{id}', 'GradeController@destroy')->name('grade.delete');
    Route::get('/grade/edit/{id}', 'GradeController@edit')->name('grade.edit');
    Route::post('/grade/update/{id}', 'GradeController@update')->name('grade.update');

//Grade profile for setting in register and updade student profile

     Route::get('/gradeprofile', 'GradeProfileController@index')->name('gradeprofile.index');
     Route::post('/gradeprofile/store', 'GradeProfileController@store')->name('gradeprofile.store');
     Route::get('/gradeprofile/edit/{id}', 'GradeProfileController@edit')->name('gradeprofile.edit');
     Route::get('/gradeprofile/delete/{id}', 'GradeProfileController@delete')->name('gradeprofile.delete');
     Route::post('/gradeprofile/update/{id}', 'GradeProfileController@update')->name('gradeprofile.update');





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

   

   //High School student absent
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






  // ******* secondary school student Absent ******* //
  
    Route::get('/secondarySchool/absent/{grade_id}/{student_id}', 'AbsentController@secondarySchoolAbsent')->name('secondarySchool.absentRecord'); 

    // add new absent route
   Route::post('/secondarySchool/absentInsert/{grade_id}/{student_id}', 'AbsentController@storeSecondaryAbsent')->name('store.secondarySchool.absentRecord');
  // Edit absent record for highschool
     Route::get('/secondarySchool/absentEdit/{grade_id}/{student_id}/{absentRecord_id}', 'AbsentController@editSecondaryAbsent')->name('edit.secondarySchool.absentRecord');
  //update absent record for highschool
     Route::post('/secondarySchool/absentUpdate/{grade_id}/{student_id}/{absentRecord_id}', 'AbsentController@updateSecondaryAbsent')->name('update.secondarySchool.absentRecord');

  //update absent record for highschool
     Route::get('/secondarySchool/absentDelete/{grade_id}/{student_id}/{absentRecord_id}', 'AbsentController@deleteSecondaryAbsent')->name('delete.SecondarySchool.absentRecord');






// ******* Primary school student Absent ******* //
  
    Route::get('/prekSchool/absent/{grade_id}/{student_id}', 'AbsentController@prekSchoolAbsent')->name('prekSchool.absentRecord'); 


// add new absent route
   Route::post('/prekSchool/absentInsert/{grade_id}/{student_id}', 'AbsentController@storePrekAbsent')->name('store.prekSchool.absentRecord');
  // Edit absent record for highschool
     Route::get('/prekSchool/absentEdit/{grade_id}/{student_id}/{absentRecord_id}', 'AbsentController@editPrekAbsent')->name('edit.prekSchool.absentRecord');
  //update absent record for highschool
     Route::post('/prekSchool/absentUpdate/{grade_id}/{student_id}/{absentRecord_id}', 'AbsentController@updatePrekAbsent')->name('update.prekSchool.absentRecord');

  //update absent record for highschool
     Route::get('/prekSchool/absentDelete/{grade_id}/{student_id}/{absentRecord_id}', 'AbsentController@deletePrekAbsent')->name('delete.prekSchool.absentRecord');




  //print section
    Route::get('/selectTranscript/{student_id}', 'TranscriptController@selectTranscript')->name('select.transcript');


    Route::get('/selectOption/{student_id}', 'TranscriptController@selectOption')->name('select.option');

//K and Pre-K print view
    Route::get('/printView/prek/{student_id}', 'TranscriptController@prekPrintView')->name('prek.printview');

    //high School print view
    Route::get('/printView/secondaryschool/{student_id}', 'TranscriptController@secondarySchoolPrintView')->name('secondaryschool.printview');

    //high School transcript print view
    Route::get('/printView/highschool/{student_id}', 'TranscriptController@highSchoolPrintView')->name('highschool.transcript');

    //CGPA for high school transcript
    Route::get('/transcript/cgpa/{student_id}', 'TranscriptController@highSchoolCGPA')->name('cgpa.school');

    //high school yearly report
    Route::get('/yearlyReport/highschool/{student_id}', 'TranscriptController@yearlyReportHighSchool')->name('yearlyReport.highSchool');

    //show transption form 
    Route::get('/transcript/student/{student_id}', 'TranscriptController@transcript')->name('transcript');

    //CGPA for Grade 9 to 10 
    Route::get('/transcript910/student/{student_id}', 'TranscriptController@transcript910')->name('transcript910');
    //CGPA for Grade 9 to 11 
    Route::get('/transcript911/student/{student_id}', 'TranscriptController@transcript911')->name('transcript911');


    //search student

    Route::get('/student/search', 'StudentController@searchStudent')->name('student.search');


    //teacher section ****************************************************************

    

    // Route::get('/teacher/dashboard', 'TeacherController@index')->name('teacher.dashboard');

    //show all teacher
    Route::get('/teacher/showAll', 'TeacherController@show')->name('teacher.showAll');

    //register new teacher from
    Route::get('/teacher/register', 'TeacherController@register')->name('teacher.register');

    //register new teacher 
    Route::post('/teacher/store/{id}', 'TeacherController@store')->name('teacher.store');
    //get edit form for teacher
    Route::get('/teacher/edit/{admin_id}/{teacher_id}', 'TeacherController@edit')->name('teacher.edit');


    //register new teacher 
    Route::post('/teacher/update/{admin_id}/{teacher_id}', 'TeacherController@update')->name('teacher.update');

    Route::get('/teacher/delete/{admin_id}/{teacher_id}', 'TeacherController@delete')->name('teacher.delete');



  



});//end admin

//teacher

Route::prefix('teacher')->group(function () {

    //Change teacher password form
    Route::get('/changePassword/{teacher_id}', 'TeacherProfileController@changePassword')->name('teacher.changePassword');

    //change password method
    Route::post('/changePassword/{teacher_id}', 'TeacherProfileController@updatePassword')->name('teacher.changePassword.update');

    Route::get('/', 'TeacherProfileController@index');
    Route::get('/profile', 'TeacherProfileController@index')->name('teacher.profile');

    Route::get('/login', 'Auth\TeacherLoginController@showLoginForm')->name('teacher.login');
    Route::post('/login', 'Auth\TeacherLoginController@teacherLogin')->name('teacher.login.submit');

    Route::get('/logout', 'Auth\TeacherLoginController@logout')->name('teacher.logout');


    //view all student
    Route::get('/viewStudent/{teacher_id}', 'TeacherProfileController@viewStudent')->name('teacher.student.viewAll');


    //add subject to pre-k and k score
    Route::get('/prekscore/addSubject/{teacher_id}/{grade_id}/{student_id}', 'TeacherProfileController@showPrekAddSubject')->name('teacher.prek.addSubject');

    //view student detail
    Route::get('/student/detail/{teacher_id}/{student_id}', 'TeacherProfileController@studentDetail')->name('teacher.student.detail');

    //K and Pre-k Score
    Route::get('/prekscore/view/{teacher_id}/{grade_id}/{student_id}', 'TeacherProfileController@prekScore')->name('teacher.prekschool.score');

    Route::post('/prekscore/insertSubject/{teacher_id}/{grade_id}/{student_id}', 'TeacherProfileController@prekAddSubject')->name('teacher.prek.insertSubject');
//Prek-edit subject score form
    Route::get('/prekscore/EditSubject/{teacher_id}/{score_id}/{grade_id}/{student_id}', 'TeacherProfileController@prekEditSubject')->name('teacher.prek.editSubject');

    //Prek-update subject score
    Route::post('/prekscore/EditSubject/{teacher_id}/{score_id}/{grade_id}/{student_id}', 'TeacherProfileController@updatePrekScore')->name('teacher.prek.updateSubject');

    //Delete Prek Subject Score

    Route::get('/prekscore/Subject/delete/{id}', 'TeacherProfileController@DeletePrekScore')->name('teacher.prek.Subject.delete');


    



    // secondary score (teacher panel)
    Route::get('/score/secondary/{teacher_id}/{grade_id}/{student_id}', 'TeacherProfileController@secondaryScore')->name('teacher.score.secondary');

    //add subject to secondary score form (teacher panel)
    Route::get('/secondary/addSubject/{teacher_id}/{grade_id}/{student_id}', 'TeacherProfileController@showSecondaryAddSubject')->name('teacher.secondary.addSubject');

    //insert subject to secondary score table (teacher panel)
    Route::post('/secondary/insertSubject/{teacher_id}/{grade_id}/{student_id}', 'TeacherProfileController@secondaryAddSubject')->name('teacher.secondary.insertSubject');

    //delete data from SecondaryScore table
    Route::get('/secondaryScore/delete/{id}', 'TeacherProfileController@destroySecondaryScore')->name('teacher.secondary.score.delete');





    //View high school student score
    Route::get('/score/{teacher_id}/{grade_id}/{student_id}', 'TeacherProfileController@viewScore')->name('teacher.score.view');

    //show subjects form to add to score table
    Route::get('/student/score/{teacher_id}/{grade_id}/{student_id}', 'TeacherProfileController@SubjectByGrade')->name('teacher.subject.score');

    //insert subject to score table for high school
    Route::post('/score/insert/{teacher_id}/{student_id}/{grade_id}', 'TeacherProfileController@insertScore')->name('teacher.score.insert');

    //edit data from score table (teacher panel)
    Route::get('score/edit/{teacher_id}/{score_id}/{grade_id}/{student_id}', 'TeacherProfileController@editScore')->name('teacher.student.score.edit');

    //delete data from score table (teacher panel)
    Route::get('/score/delete/{id}', 'TeacherProfileController@destroyScore')->name('teacher.score.delete');

    //update score (teacher panel)
    Route::post('score/update/{teacher_id}/{score_id}/{grade_id}/{student_id}', 'TeacherProfileController@updateScore')->name('teacher.score.update');


    //edit data from secondaryScore table (teacher panel)
    Route::get('secondaryScore/edit/{teacher_id}/{score_id}/{grade_id}/{student_id}', 'TeacherProfileController@editSecondaryScoreForm')->name('teacher.secondary.score.edit');
    //update secondary score student
    Route::post('secondaryScore/update/{teacher_id}/{score_id}/{grade_id}/{student_id}', 'TeacherProfileController@updateSecondaryScore')->name('teacher.secondaryScore.update');



    //assignment section

    Route::get('assignment/view/{teacher_id}', 'AssignmentController@showAssignment')->name('teacher.assignment.show');

    Route::get('assignment/create/{teacher_id}', 'AssignmentController@createAssignmentForm')->name('teacher.assignment.create');
    Route::post('assignment/create/{teacher_id}', 'AssignmentController@createAssignment')->name('teacher.assignment.post');

    Route::get('assignment/detail/{teacher_id}/{assignment_id}', 'AssignmentController@assignmentDetail')->name('teacher.assignment.detail');
    Route::get('assignment/edit/{teacher_id}/{assignment_id}', 'AssignmentController@assignmentEdit')->name('teacher.assignment.edit');
    Route::get('assignment/delete/{assignment_id}', 'AssignmentController@assignmentDelete')->name('teacher.assignment.delete');
    Route::post('assignment/update/{teacher_id}/{assignment_id}', 'AssignmentController@assignmentUpdate')->name('teacher.assignment.update');



    //view student by Grade
    Route::get('/student/byGrade/{teacher_id}', 'TeacherProfileController@viewByGrade')->name('teacher.student.byGrade');

    //view detail grade

    // Route::get('/student/detailByGrade/{grade_profile_id}/{teacher_id}', 'TeacherProfileController@viewStudentByGrade')->name('teacher.viewStudent.byGrade');

    Route::get('/student/byGrade/detail/{grade_profile_id}/{teacher_id}', 'TeacherProfileController@studentByGrade')->name('teacher.viewStudent.byGrade');


});
//show assignment in user profile
Route::get('student/assignment/show/{student_id}', 'HomeController@studentAssignmentShow')->name('student.assignment.show');
//show detail assignment in student profile
Route::get('student/assignment/detail/{student_id}/{assignment_id}', 'HomeController@assignmentDetail')->name('student.assignment.detail');

/////////////////////////////////absent//////////////////////////////////

//view student 
Route::get('student/absent/{student_id}', 'HomeController@viewStudentAbsent')->name('student.showAbsent');

//view student absent by Grade in PREK
Route::get('student/prek/absentByGrade/{grade_id}/{student_id}', 'HomeController@prekAbsentByGrade')->name('prek.absentByGrade');

//view student absent by Grade in Secondary
Route::get('student/secondary/absentByGrade/{grade_id}/{student_id}', 'HomeController@secondaryAbsentByGrade')->name('secondary.absentByGrade');

//View student absent by Grade HighSchool
Route::get('student/highSchool/absentByGrade/{grade_id}/{student_id}', 'HomeController@highSchoolAbsentByGrade')->name('highSchool.absentByGrade');


//

//View student absent by Grade HighSchool
Route::get('endUser/teacher/{student_id}', 'HomeController@viewTeacher')->name('endUser.teacher');

//view teacher profile
Route::get('teacher/profile/{student_id}/{teacher_id}', 'HomeController@teacherProfile')->name('endUser.teacher.profile');

//view all staff profile
Route::get('endUser/staff/{student_id}', 'HomeController@viewStaff')->name('view.staff');









