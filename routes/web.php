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

// Route::get('/insertForm', function () {
//     return view('insert_data');
// });
//********** this insert section is to add extra record to database ***********//
// Route::get('/insertForm', 'InsertController@insertForm');

//Route::post('/insertdata', 'InsertController@insertData')->name('insertdata.submit');

//insert all form
//Route::get('/insertAllForm', 'InsertController@insertAllForm')->name('insertAll.form');
//insert all 
//Route::post('/insertAll/{grade_id}', 'InsertController@insertAll')->name('insertAll.submit');

//mid-term menu
// Route::get('/midterm/{student_id}', 'MidtermController@midTermOption')->name('midterm.option');

//******end of insert section */

//student login form
Route::get('/', function () {
    return view('studentLogin');
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


    //Report students

    Route::get('/student/reportByYear', 'AdminController@reportByYear')->name('student.reportByYear');

    //show file library
    Route::get('/filelibrary', 'AdminController@fileLibrary')->name('admin.filelibrary');
    //file library upload
    Route::post('/filelibrary/upload', 'AdminController@fileLibraryUpload')->name('admin.filelibrary.upload');
    //file library delete
    Route::get('/filelibrary/delete/{id}', 'AdminController@fileLibraryDelete')->name('admin.filelibrary.delete');


    Route::get('/student/register', 'StudentController@showRegisterForm')->name('student.register');
    Route::post('/student/register', 'StudentController@studentRegister')->name('student.register.create');

    Route::get('/student/viewStudent', 'StudentController@viewStudent')->name('student.viewAll');
    //view student by grade
    Route::get('/student/byGrade', 'StudentController@viewByGrade')->name('student.byGrade');

    //view detail grade
    Route::get('/student/detailByGrade/{grade_profile_id}', 'StudentController@viewAllStudentByGrade')->name('view.allStudent.byGrade');

// --------------************************ APPROVE SCORE *******************************------------------//
    //approve by grade
    Route::get('/student/scoreApproved/{gradeID}', 'StudentController@approveByGrade')->name('approve.grade');

    //high school approve score
    //gradeID = grade_profile_id
    Route::get('/highschool/scoreApprove/{gradeID}', 'StudentController@highschoolApproveScore')->name('hightschool.approveScore');
    //this time gradeID=grade_id for highschool (score)   
    Route::post('/highschool/scoreApprove/{grade_profile_id}', 'StudentController@updateHighschoolApproveScore')->name('update.hightschool.approveScore');
    
    //this time gradeID=grade_id for secondary (score grade 1-8)
    Route::post('/seconday/scoreApprove/{grade_profile_id}', 'SecondaryController@updateSecondaryApproveScore')->name('update.secondary.approveScore');

    //this time gradeID=grade_id for Pre-K and K (score grade pre-k and k)
    Route::post('/prekandgradeK/scoreApprove/{grade_profile_id}', 'PrekController@updatePrekApproveScore')->name('update.prekandgradeK.approveScore');

// --------------************************* END OF APPROVE SCORE ************************------------------//

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


//***********staff**************************//

     Route::get('/showStaff', 'StaffController@showStaff')->name('admin.showStaff');
     
     Route::get('/createStaff', 'StaffController@createStaff')->name('admin.createStaff');

     //store staff to table route
     Route::post('/storeStaff/{id}', 'StaffController@storeStaff')->name('admin.storeStaff');
//+++++++++++++++******** Staff Absnet ********+++++++++++++++
     //store staff absent
     Route::post('/storeStaff/absent/{admin_id}/{id}', 'StaffController@storeStaffAbsent')->name('admin.storeStaff.absent');
     //edit staff absent

     Route::get('/editStaff/absent/{staffAbsnet_id}/{admin_id}/{staff_id}', 'StaffController@editStaffAbsent')->name('admin.editStaff.absent');

    //Update staff Absent
    Route::post('/staff/absent/update/{staffAbsent_id}/{admin_id}/{teacher_id}', 'StaffController@updateStaffAbsent')->name('admin.updateStaff.absent');

    //delete staff absent
    Route::get('/staff/absent/delete/{id}', 'StaffController@deleteStaffAbsent')->name('admin.deleteStaff.absent');



    // view profile
     Route::get('/staffDetail/{id}', 'StaffController@staffDetail')->name('admin.staffDetail');
     //edit staff profile
     Route::get('/staff/edit/{id}', 'StaffController@staffEdit')->name('admin.staff.edit');
     //staff update info
     Route::post('/staff/update/{id}', 'StaffController@staffUpdate')->name('admin.staff.update');
     //delete staff 
     Route::get('/staff/delete/{id}', 'StaffController@staffDelete')->name('admin.staff.delete');


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
  //  Route::post('score/update', 'StudentController@updateScore')->name('score.update');
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
    // Route::post('secondaryScore/update/{score_id}/{grade_id}/{student_id}', 'SecondaryController@updateSecondaryScore')->name('secondaryScore.update');

    Route::post('secondaryScore/update', 'SecondaryController@updateSecondaryScore')->name('secondaryScore.update');
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
 //   Route::post('prekscore/update/{score_id}/{grade_id}/{student_id}', 'PrekController@updatePrekScore')->name('prek.update');
    Route::post('prekscore/update', 'PrekController@updatePrekScore')->name('prek.update');
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

//setting Day Present

Route::get('/daypresent', 'DaypresentController@index')->name('daypresent.index');
Route::post('/daypresent/store', 'DaypresentController@store')->name('daypresent.store');
Route::get('/daypresent/edit/{id}', 'DaypresentController@edit')->name('daypresent.edit');
Route::get('/daypresent/delete/{id}', 'DaypresentController@destroy')->name('daypresent.delete');
Route::post('/daypresent/update/{id}', 'DaypresentController@update')->name('daypresent.update');




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

    

    //********* midterm print preview for admin ********************

    //mid-term menu admin
    Route::get('/midterm/{student_id}', 'MidtermController@midTermOption')->name('midterm.option');
    
    //Pre-K print view for midterm
    Route::get('/midterm/prek/{student_id}', 'MidtermController@prekPrintView')->name('midterm.prek.printview');

    //update midterm score for pre-k school
    Route::post('midterm/prekscore/update', 'MidtermController@midtermUpdatePrekScore')->name('midterm.prek.update');

    //GradeK print view for midterm
    Route::get('/midterm/gradeK/{student_id}', 'MidtermController@gradeKPrintView')->name('midterm.gradeK.printview');

    //update midterm score for grade-k school
    Route::post('midterm/gradeKscore/update', 'MidtermController@midtermUpdateGradeKScore')->name('midterm.gradeK.update');

    //secondary midterm printview
    Route::get('/midterm/secondaryschool/{student_id}', 'MidtermController@secondarySchoolPrintView')->name('midterm.secondaryschool.printview');

    //update midterm score for secondary school
    Route::post('/midterm/secondaryschool/update', 'MidtermController@midtermUpdateSecondaryScore')->name('midterm.secondaryschool.update');

    //high school midterm printview
    Route::get('/midterm/highschool/{student_id}', 'MidtermController@midtermHighSchool')->name('midterm.yearlyReport.highSchool');
    
    //update midterm score for high school
    Route::post('/midterm/highSchool/update', 'MidtermController@midtermUpdateHighSchoolScore')->name('midterm.hightSchool.update');



    //********* end of midterm print preview for admin *************

  

//Pre-K print view
    Route::get('/printView/prek/{student_id}', 'TranscriptController@prekPrintView')->name('prek.printview');
//Grade K print preview
    Route::get('/printView/gradek/{student_id}', 'TranscriptController@gradekPrintView')->name('gradek.printview');

    //secondary report card print view
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

    //CGPA for Grade 10 to 11 
    Route::get('/transcript1011/student/{student_id}', 'TranscriptController@transcript1011')->name('transcript1011');

      //CGPA for Grade 11 to 12 
    Route::get('/transcript1112/student/{student_id}', 'TranscriptController@transcript1112')->name('transcript1112');

    //CGPA for Grade 10 to 12
    Route::get('/transcript1012/student/{student_id}', 'TranscriptController@transcript1012')->name('transcript1012');


    //search student
    Route::get('/student/search', 'StudentController@searchStudent')->name('student.search');


    //teacher section ****************************************************************


    // Route::get('/teacher/dashboard', 'TeacherController@index')->name('teacher.dashboard');
    //search teahcer
    Route::get('/teacher/search', 'TeacherController@searchTeacher')->name('teacher.search');
    //show all teacher
    Route::get('/teacher/showAll', 'TeacherController@show')->name('teacher.showAll');
    //view teacher profile
    Route::get('/teacher/profile/{admin_id}/{teacher_id}', 'TeacherController@teacherProfile')->name('admin.teacher.profile');

    //register new teacher from
    Route::get('/teacher/register', 'TeacherController@register')->name('teacher.register');

    //register new teacher 
    Route::post('/teacher/store/{id}', 'TeacherController@store')->name('teacher.store');
    //get edit form for teacher
    Route::get('/teacher/edit/{admin_id}/{teacher_id}', 'TeacherController@edit')->name('teacher.edit');


    //register new teacher 
    Route::post('/teacher/update/{admin_id}/{teacher_id}', 'TeacherController@update')->name('teacher.update');

    Route::get('/teacher/delete/{admin_id}/{teacher_id}', 'TeacherController@delete')->name('teacher.delete');


// +++++++++*******************++++++++++++++++//
    //Record Teacher Absent
    Route::post('/teacher/absent/{admin_id}/{teacher_id}', 'AbsentTeacherController@store')->name('absentTeacher.store');
    
   // Route::resource('/teacher/absent', 'AbsentTeacherController');
    //View Teacher Absent
    Route::get('/teacher/absent/view/{admin_id}/{teacher_id}', 'AbsentTeacherController@show')->name('absentTeacher.view');
    //Edit Teacher Absent
    Route::get('/teacher/absent/edit/{id}/{admin_id}/{teacher_id}', 'AbsentTeacherController@edit')->name('absentTeacher.edit');
    //Update Teacher Absent
    Route::post('/teacher/absent/update/{id}/{admin_id}/{teacher_id}', 'AbsentTeacherController@update')->name('absentTeacher.update');
    //Delete Teacher Absent
    Route::get('/teacher/absent/delete/{absent_id}', 'AbsentTeacherController@destroy')->name('absentTeacher.delete');

    //+++++++++++++++++++++**********************++++++++++++++++++++
    // Record Staff Absent, add, update, Delete





});//end admin



    

//teacher

Route::prefix('teacher')->group(function () {

     //mid-term menu admin
     Route::get('/midterm/{student_id}', 'MidtermTeacherController@midTermOption')->name('teacher.midterm.option');


     //********* midterm print preview for teacher ********************

   
    
    //Pre-K print view for midterm
    Route::get('/midterm/prek/{student_id}', 'MidtermTeacherController@prekPrintView')->name('teacher.midterm.prek.printview');

    //update midterm score for pre-k school
    Route::post('/midterm/prekscore/update', 'MidtermTeacherController@midtermUpdatePrekScore')->name('teacher.midterm.prek.update');

    //GradeK print view for midterm
    Route::get('/midterm/gradeK/{student_id}', 'MidtermTeacherController@gradeKPrintView')->name('teacher.midterm.gradeK.printview');

    //update midterm score for grade-k school
    Route::post('/midterm/gradeKscore/update', 'MidtermTeacherController@midtermUpdateGradeKScore')->name('teacher.midterm.gradeK.update');

    //secondary midterm printview
    Route::get('/midterm/secondaryschool/{student_id}', 'MidtermTeacherController@secondarySchoolPrintView')->name('teacher.midterm.secondaryschool.printview');

    //update midterm score for secondary school
    Route::post('/midterm/secondaryschool/update', 'MidtermTeacherController@midtermUpdateSecondaryScore')->name('teacher.midterm.secondaryschool.update');

    //high school midterm printview
    Route::get('/midterm/highschool/{student_id}', 'MidtermTeacherController@midtermHighSchool')->name('teacher.midterm.yearlyReport.highSchool');
    
    //update midterm score for high school
    Route::post('/midterm/highSchool/update', 'MidtermTeacherController@midtermUpdateHighSchoolScore')->name('teacher.midterm.hightSchool.update');



    //********* end of midterm print preview for teacher *************

  //  Report card and transcript
  //high school yearly report
  Route::get('/yearlyReport/highschool/{student_id}', 'TeacherTranscriptController@yearlyReportHighSchool')->name('teacher.yearlyReport.highSchool');
  
    //select option for teacher side
    Route::get('/selectOption/{student_id}', 'TeacherTranscriptController@selectOption')->name('teacher.select.option');

   //secondary report card print view
   Route::get('/printView/secondaryschool/{student_id}', 'TeacherTranscriptController@secondarySchoolPrintView')->name('teacher.secondaryschool.printview');

   //Grade K print preview (Report Card)
   Route::get('/printView/gradek/{student_id}', 'TeacherTranscriptController@gradekPrintView')->name('teacher.gradek.printview');

   //Pre-K print view (Report Card)
   Route::get('/printView/prek/{student_id}', 'TeacherTranscriptController@prekPrintView')->name('teacher.prek.printview');

//    **************************************************
   //Teacher Transcript print view
   Route::get('/transcript/student/{student_id}', 'TeacherTranscriptController@ShowTranscript')->name('teacher.transcript');

     //high School transcript print view
     Route::get('/printView/highschool/{student_id}', 'TeacherTranscriptController@highSchoolPrintView')->name('teacher.highschool.transcript');

     //CGPA for Grade 9 to 10 
    Route::get('/transcript910/student/{student_id}', 'TeacherTranscriptController@transcript910')->name('teacher.transcript910');

    //CGPA for Grade 9 to 11 
    Route::get('/transcript911/student/{student_id}', 'TeacherTranscriptController@transcript911')->name('teacher.transcript911');
     //CGPA for Grade 9 to 12 
     Route::get('/transcript/cgpa/{student_id}', 'TeacherTranscriptController@highSchoolCGPA')->name('teacher.cgpa.school');

    //CGPA for Grade 10 to 11 
    Route::get('/transcript1011/student/{student_id}', 'TeacherTranscriptController@transcript1011')->name('teacher.transcript1011');

      //CGPA for Grade 11 to 12 
    Route::get('/transcript1112/student/{student_id}', 'TeacherTranscriptController@transcript1112')->name('teacher.transcript1112');

    //CGPA for Grade 10 to 12
    Route::get('/transcript1012/student/{student_id}', 'TeacherTranscriptController@transcript1012')->name('teacher.transcript1012');
    






    //Absent

  //High School student absent for teacher side
  Route::get('/absent/show/{student_id}', 'TeacherAbsentController@showAbsent')->name('teacher.show.absentRecord');
//Secondary
  Route::get('/secondarySchool/absent/{grade_id}/{student_id}', 'TeacherAbsentController@secondarySchoolAbsent')->name('teacher.secondarySchool.absentRecord'); 
//pre-k
  Route::get('/prekSchool/absent/{grade_id}/{student_id}', 'TeacherAbsentController@prekSchoolAbsent')->name('teacher.prekSchool.absentRecord'); 
//high school

Route::get('/highSchool/absent/{grade_id}/{student_id}', 'TeacherAbsentController@highSchoolAbsent')->name('teacher.highSchool.absentRecord');

  //end Absent

    //teacher search students
    Route::get('/search/{teacher_id}', 'TeacherProfileController@searchStudent')->name('teacher.searchStudent');

    //view all staff
    Route::get('/viewStaff/{teacher_id}', 'TeacherProfileController@viewStaff')->name('teacher.viewStaff');

    //view staff detail
    Route::get('/staffDetail/{teacher_id}/{staff_id}/', 'TeacherProfileController@staffDetail')->name('teacher.staffDetail');
    //search staff
    Route::get('/staff/search', 'StaffController@searchStaff')->name('staff.search');




    //show all teacher
    Route::get('/showAllTeacher/{teacher_id}', 'TeacherProfileController@showAllTeacher')->name('teacher.showAllTeacher');

    //view teacher detail
    Route::get('/detail/{teacher_id}', 'TeacherProfileController@teacherDetail')->name('teacher.detail');




    //Change teacher password form
    Route::get('/changePassword/{teacher_id}', 'TeacherProfileController@changePassword')->name('teacher.changePassword');

    //change password method
    Route::post('/changePassword/{teacher_id}', 'TeacherProfileController@updatePassword')->name('teacher.changePassword.update');

    Route::get('/', 'TeacherProfileController@index')->name('teacher.dashboard');

    Route::get('/profile', 'TeacherProfileController@teacherProfile')->name('teacher.profile');

    Route::get('/login', 'Auth\TeacherLoginController@showLoginForm')->name('teacher.login');
    Route::post('/login', 'Auth\TeacherLoginController@teacherLogin')->name('teacher.login.submit');

    Route::get('/logout', 'Auth\TeacherLoginController@logout')->name('teacher.logout');


    //view all student
    Route::get('/viewStudent/{teacher_id}', 'TeacherProfileController@viewStudent')->name('teacher.student.viewAll');


    //add subject to pre-k and k score
    Route::get('/prekscore/addSubject/{teacher_id}/{grade_id}/{student_id}', 'TeacherProfileController@showPrekAddSubject')->name('teacher.prek.addSubject');

    //view student detail
    Route::get('/student/detail/{teacher_id}/{student_id}', 'TeacherProfileController@studentDetail')->name('teacher.student.detail');
    
    //view student profile only

    Route::get('/studentProfile/detail/{teacher_id}/{student_id}', 'TeacherProfileController@onlyStudentProfile')->name('teacher.studentProfile.detail');

    //K and Pre-k Score
    Route::get('/prekscore/view/{teacher_id}/{grade_id}/{student_id}', 'TeacherProfileController@prekScore')->name('teacher.prekschool.score');

    Route::post('/prekscore/insertSubject/{teacher_id}/{grade_id}/{student_id}', 'TeacherProfileController@prekAddSubject')->name('teacher.prek.insertSubject');
//Prek-edit subject score form
    Route::get('/prekscore/EditSubject/{teacher_id}/{score_id}/{grade_id}/{student_id}', 'TeacherProfileController@prekEditSubject')->name('teacher.prek.editSubject');

    //Prek-update subject score
    Route::post('/prekscore/EditSubject', 'TeacherProfileController@updatePrekScore')->name('teacher.prek.updateSubject');

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
    Route::post('secondaryScore/update', 'TeacherProfileController@updateSecondaryScore')->name('teacher.secondaryScore.update');



    //assignment section

    Route::get('assignment/view/{teacher_id}', 'AssignmentController@showAssignment')->name('teacher.assignment.show');

    Route::get('assignment/create/{teacher_id}', 'AssignmentController@createAssignmentForm')->name('teacher.assignment.create');
    Route::post('assignment/create/{teacher_id}', 'AssignmentController@createAssignment')->name('teacher.assignment.post');

    Route::get('assignment/detail/{teacher_id}/{assignment_id}', 'AssignmentController@assignmentDetail')->name('teacher.assignment.detail');
    Route::get('assignment/edit/{teacher_id}/{assignment_id}', 'AssignmentController@assignmentEdit')->name('teacher.assignment.edit');
    Route::get('assignment/delete/{assignment_id}', 'AssignmentController@assignmentDelete')->name('teacher.assignment.delete');
    Route::post('assignment/update/{teacher_id}/{assignment_id}', 'AssignmentController@assignmentUpdate')->name('teacher.assignment.update');

    //lesson plan

    Route::get('lessonPlan/view/{teacher_id}', 'LessonplanController@showLessonplan')->name('teacher.lessonPlan.show');

    Route::get('lessonPlan/create/{teacher_id}', 'LessonplanController@createLessonplanForm')->name('teacher.lessonPlan.create');
    Route::post('lessonPlan/create/{teacher_id}', 'LessonplanController@createLessonplan')->name('teacher.lessonPlan.post');

    Route::get('lessonPlan/detail/{teacher_id}/{lessonplan_id}', 'LessonplanController@LessonplanDetail')->name('teacher.lessonPlan.detail');
    Route::get('lessonPlan/edit/{teacher_id}/{lessonplan_id}', 'LessonplanController@LessonplanEdit')->name('teacher.lessonPlan.edit');
    Route::get('lessonPlan/delete/{lessonplan_id}', 'LessonplanController@LessonplanDelete')->name('teacher.lessonPlan.delete');
    Route::post('lessonPlan/update/{teacher_id}/{lessonplan_id}', 'LessonplanController@LessonplanUpdate')->name('teacher.lessonPlan.update');
//++++++++++++++++***********************++++++++++++++++++++++++++++++++
    //Grade File upload
    Route::get('gradeFile/view/{teacher_id}', 'GradefileController@showGradefile')->name('teacher.gradefile.show');

    //create upload grade file form
    Route::get('gradefile/create/{teacher_id}', 'GradefileController@createGradefileForm')->name('teacher.gradefile.create');

    //Create upload Grade file
    Route::post('gradefile/create/{teacher_id}', 'GradefileController@createGradefile')->name('teacher.gradefile.post');

    //view detail Grade file form
    Route::get('gradefile/detail/{teacher_id}/{gradefile_id}', 'GradefileController@gradefileDetail')->name('teacher.gradefile.detail');

    //Edit grade file 
    Route::get('gradefile/edit/{teacher_id}/{gradefile_id}', 'GradefileController@gradefileEdit')->name('teacher.gradefile.edit');

    //Update grade file
    Route::post('gradefile/update/{teacher_id}/{gradefile_id}', 'GradefileController@gradefileUpdate')->name('teacher.gradefile.update');

    //Delete Grade file
    Route::get('gradefile/delete/{gradefile_id}', 'GradefileController@gradefileDelete')->name('teacher.gradefile.delete');


   





    //view student by Grade
    Route::get('/student/byGrade/{teacher_id}', 'TeacherProfileController@viewByGrade')->name('teacher.student.byGrade');

    //view all student but only profile not score
    Route::get('/viewAllStudents/{teacher_id}', 'TeacherProfileController@viewAllStudents')->name('teacher.viewAllStudents');

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

//staff profile detail
Route::get('staff/profile/{student_id}/{staff_id}', 'HomeController@staffProfile')->name('staff.profile');

//student CGPA - END USER SIDE
Route::get('student/cgpa/{student_id}', 'HomeController@studentCGPA')->name('student.cgpa');

Route::get('student/highSchool/cpgabyGradeList/{student_id}', 'HomeController@cpgaByGradeList')->name('student.highschool.cgpaByGradeList');


//CGPA by grade student side
Route::get('student/cgpaByGrade/{student_id}/{grade_id}', 'HomeController@cgpaByGrade')->name('student.cgpaByGrade');

//CGPA grade 9 to 10 student side
Route::get('student/cgpa910/{student_id}', 'HomeController@studentCGPA910')->name('student.cgpa910');

//CGPA Grade 9 to 11
Route::get('student/cgpa911/{student_id}', 'HomeController@studentCGPA911')->name('student.cgpa911');

//CGPA Grade 9 to 12
Route::get('student/cgpa912/{student_id}', 'HomeController@studentCGPA912')->name('student.cgpa912');

//CGPA Grade 10 to 11
Route::get('student/cgpa1011/{student_id}', 'HomeController@studentCGPA1011')->name('student.cgpa1011');

//CGPA Grade 10 to 12
Route::get('student/cgpa1012/{student_id}', 'HomeController@studentCGPA1012')->name('student.cgpa1012');

//CGPA grade 11 to 12
Route::get('student/cgpa1112/{student_id}', 'HomeController@studentCGPA1112')->name('student.cgpa1112');


//Report Card for Pre-k
Route::get('student/prek/reportCard/{student_id}', 'HomeController@prekReportCard')->name('student.prek.reportCard');

//report card for pre-k detail print formate 
Route::get('student/prek/reportCard/detail/{student_id}/{grade_id}', 'HomeController@prekReportCardDetail')->name('student.prek.reportCard.detail');


//Report Card for Grade K
Route::get('student/gradeK/reportCard/{student_id}', 'HomeController@gradeKReportCard')->name('student.gradeK.reportCard');
//Report Card for Grade K detail printer formate
Route::get('student/gradeK/reportCard/detail/{student_id}/{grade_id}', 'HomeController@gradeKReportCardDetail')->name('student.gradeK.reportCard.detail');


//Report Card for Secondary School

Route::get('student/secondary/reportCard/{student_id}', 'HomeController@secondaryReportCard')->name('student.secondary.reportCard');

//Report Card for Secondary School detail
Route::get('student/secondary/reportCard/detail/{student_id}/{grade_id}', 'HomeController@secondaryReportCardDetail')->name('student.secondary.reportCard.detail');

//Report card for High School

Route::get('student/highSchool/reportCard/{student_id}', 'HomeController@highSchoolReportCard')->name('student.highschool.reportCard');

//Report Card for Secondary School detail
Route::get('student/highSchool/reportCard/detail/{student_id}/{grade_id}', 'HomeController@highschoolReportCardDetail')->name('student.highschool.reportCard.detail');



















