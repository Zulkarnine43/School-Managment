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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth','admin']],function(){
	Route::get('dashboard','Admin\DashboardController@index')->name('admin.dashboard');
	Route::group(['prefix'=>'users','namespace'=>'Admin'], function(){	
		//User Route
		Route::get('/view','UserController@view')->name('users.view');
		Route::get('/add','UserController@add')->name('users.add');
		Route::post('/store','UserController@store')->name('users.store');
		Route::get('/edit/{id}','UserController@edit')->name('users.edit');
		Route::post('/update/{id}','UserController@update')->name('users.update');
		Route::post('/delete','UserController@delete')->name('users.delete');
	});

	Route::group(['prefix'=>'profiles','namespace'=>'Admin'], function(){	
		//Profile Route
		Route::get('/view','ProfileController@view')->name('profiles.view');
		Route::get('/edit','ProfileController@edit')->name('profiles.edit');
		Route::post('/update','ProfileController@update')->name('profiles.update');
		Route::get('/password/view','ProfileController@passwordView')->name('profiles.password.view');
		Route::post('/password/update','ProfileController@passwordUpdate')->name('profiles.password.update');
	});	

	Route::group(['prefix'=>'settings','namespace'=>'Admin\Settings'], function(){	
		//class Route
		Route::get('/school/view','SchoolController@view')->name('settings.school.view');
		Route::get('/school/add','SchoolController@add')->name('settings.school.add');
		Route::post('/school/store','SchoolController@store')->name('settings.school.store');
		Route::get('/school/edit/{id}','SchoolController@edit')->name('settings.school.edit');
		Route::post('/school/update/{id}','SchoolController@update')->name('settings.school.update');
		Route::post('/school/delete','SchoolController@delete')->name('settings.school.delete');
	});

	Route::group(['prefix'=>'setups','namespace'=>'Admin\Setups'], function(){	
		//class Route
		Route::get('/student/class/view','StudentClassController@view')->name('setups.student.class.view');
		Route::get('/student/class/add','StudentClassController@add')->name('setups.student.class.add');
		Route::post('/student/class/store','StudentClassController@store')->name('setups.student.class.store');
		Route::get('/student/class/edit/{id}','StudentClassController@edit')->name('setups.student.class.edit');
		Route::post('/student/class/update/{id}','StudentClassController@update')->name('setups.student.class.update');
		Route::post('/student/class/delete','StudentClassController@delete')->name('setups.student.class.delete');
		//Year Route
		Route::get('/student/year/view','YearController@view')->name('setups.student.year.view');
		Route::get('/student/year/add','YearController@add')->name('setups.student.year.add');
		Route::post('/student/year/store','YearController@store')->name('setups.student.year.store');
		Route::get('/student/year/edit/{id}','YearController@edit')->name('setups.student.year.edit');
		Route::post('/student/year/update/{id}','YearController@update')->name('setups.student.year.update');
		Route::post('/student/year/delete','YearController@delete')->name('setups.student.year.delete');
		//Group Route
		Route::get('/student/group/view','GroupController@view')->name('setups.student.group.view');
		Route::get('/student/group/add','GroupController@add')->name('setups.student.group.add');
		Route::post('/student/group/store','GroupController@store')->name('setups.student.group.store');
		Route::get('/student/group/edit/{id}','GroupController@edit')->name('setups.student.group.edit');
		Route::post('/student/group/update/{id}','GroupController@update')->name('setups.student.group.update');
		Route::post('/student/group/delete','GroupController@delete')->name('setups.student.group.delete');
		//Shift Route
		Route::get('/student/shift/view','ShiftController@view')->name('setups.student.shift.view');
		Route::get('/student/shift/add','ShiftController@add')->name('setups.student.shift.add');
		Route::post('/student/shift/store','ShiftController@store')->name('setups.student.shift.store');
		Route::get('/student/shift/edit/{id}','ShiftController@edit')->name('setups.student.shift.edit');
		Route::post('/student/shift/update/{id}','ShiftController@update')->name('setups.student.shift.update');
		Route::post('/student/shift/delete','ShiftController@delete')->name('setups.student.shift.delete');
		//Fee Category Route
		Route::get('/fee/category/view','FeeCategoryController@view')->name('setups.fee.category.view');
		Route::get('/fee/category/add','FeeCategoryController@add')->name('setups.fee.category.add');
		Route::post('/fee/category/store','FeeCategoryController@store')->name('setups.fee.category.store');
		Route::get('/fee/category/edit/{id}','FeeCategoryController@edit')->name('setups.fee.category.edit');
		Route::post('/fee/category/update/{id}','FeeCategoryController@update')->name('setups.fee.category.update');
		Route::post('/fee/category/delete','FeeCategoryController@delete')->name('setups.fee.category.delete');
		//Fee Category Amount Route
		Route::get('/fee/amount/view','FeeCategoryAmountController@view')->name('setups.fee.amount.view');
		Route::get('/fee/amount/add','FeeCategoryAmountController@add')->name('setups.fee.amount.add');
		Route::post('/fee/amount/store','FeeCategoryAmountController@store')->name('setups.fee.amount.store');
		Route::get('/fee/amount/edit/{fee_category_id}','FeeCategoryAmountController@edit')->name('setups.fee.amount.edit');
		Route::post('/fee/amount/update/{fee_category_id}','FeeCategoryAmountController@update')->name('setups.fee.amount.update');
		Route::get('/fee/amount/details/{fee_category_id}','FeeCategoryAmountController@details')->name('setups.fee.amount.details');
		//Exam Type Route
		Route::get('/exam/type/view','ExamTypeController@view')->name('setups.exam.type.view');
		Route::get('/exam/type/add','ExamTypeController@add')->name('setups.exam.type.add');
		Route::post('/exam/type/store','ExamTypeController@store')->name('setups.exam.type.store');
		Route::get('/exam/type/edit/{id}','ExamTypeController@edit')->name('setups.exam.type.edit');
		Route::post('/exam/type/update/{id}','ExamTypeController@update')->name('setups.exam.type.update');
		Route::post('/exam/type/delete','ExamTypeController@delete')->name('setups.exam.type.delete');
		//Subject Route
		Route::get('/subject/view','SubjectController@view')->name('setups.subject.view');
		Route::get('/subject/add','SubjectController@add')->name('setups.subject.add');
		Route::post('/subject/store','SubjectController@store')->name('setups.subject.store');
		Route::get('/subject/edit/{id}','SubjectController@edit')->name('setups.subject.edit');
		Route::post('/subject/update/{id}','SubjectController@update')->name('setups.subject.update');
		Route::post('/subject/delete','SubjectController@delete')->name('setups.subject.delete');
		//Assign Subject Route
		Route::get('/assign/subject/view','AssignSubjectController@view')->name('setups.assign.subject.view');
		Route::get('/assign/subject/add','AssignSubjectController@add')->name('setups.assign.subject.add');
		Route::post('/assign/subject/store','AssignSubjectController@store')->name('setups.assign.subject.store');
		Route::get('/assign/subject/edit/{class_id}','AssignSubjectController@edit')->name('setups.assign.subject.edit');
		Route::post('/assign/subject/update/{class_id}','AssignSubjectController@update')->name('setups.assign.subject.update');
		Route::get('/assign/subject/details/{class_id}','AssignSubjectController@details')->name('setups.assign.subject.details');
		//Designation Route
		Route::get('/employee/designation/view','DesignationController@view')->name('setups.employee.designation.view');
		Route::get('/employee/designation/add','DesignationController@add')->name('setups.employee.designation.add');
		Route::post('/employee/designation/store','DesignationController@store')->name('setups.employee.designation.store');
		Route::get('/employee/designation/edit/{id}','DesignationController@edit')->name('setups.employee.designation.edit');
		Route::post('/employee/designation/update/{id}','DesignationController@update')->name('setups.employee.designation.update');
		Route::post('/employee/designation/delete','DesignationController@delete')->name('setups.employee.designation.delete');
	});

	Route::group(['prefix'=>'students','namespace'=>'Admin\Students'], function(){	
		//class Route
		Route::get('/student/registration/view','StudentRegistrationController@view')->name('students.registration.view');
		Route::get('/student/registration/add','StudentRegistrationController@add')->name('students.registration.add');
		Route::post('/student/registration/store','StudentRegistrationController@store')->name('students.registration.store');
		Route::get('/student/registration/edit/{student_id}','StudentRegistrationController@edit')->name('students.registration.edit');
		Route::post('/student/registration/update/{student_id}','StudentRegistrationController@update')->name('students.registration.update');
		Route::get('/student/year-class-wise','StudentRegistrationController@yearClassWise')->name('students.year.class.wise');
		Route::get('/student/registration/promotion/{student_id}','StudentRegistrationController@promotion')->name('students.registration.promotion');
		Route::post('/student/promotion/store/{student_id}','StudentRegistrationController@promotionStore')->name('students.promotion.store');
		Route::get('/student/registration/details/{student_id}','StudentRegistrationController@details')->name('students.registration.details');
		//Student Roll Generate Route
		Route::get('/student/roll/view','RollGenerateController@view')->name('students.roll.view');
		Route::get('/student/get/student','RollGenerateController@getStudent')->name('students.get.student');
		Route::post('/student/roll/store','RollGenerateController@store')->name('students.roll.store');
		//Student Registration Fee Route
		Route::get('/student/registration/fee/view','RegistrationFeeController@view')->name('students.registration.fee.view');
		Route::get('/student/registration/get/student','RegistrationFeeController@getStudent')->name('students.registration.get.student');
		Route::get('/student/registration/fee/payslip','RegistrationFeeController@feePayslip')->name('students.registration.fee.payslip');
		//Student Monthly Fee Route
		Route::get('/student/monthly/fee/view','MonthlyFeeController@view')->name('students.monthly.fee.view');
		Route::get('/student/monthly/get/student','MonthlyFeeController@getStudent')->name('students.monthly.get.student');
		Route::get('/student/monthly/fee/payslip','MonthlyFeeController@feePayslip')->name('students.monthly.fee.payslip');
		//Student Exam Fee Route
		Route::get('/student/exam/fee/view','ExamFeeController@view')->name('students.exam.fee.view');
		Route::get('/student/exam/get/student','ExamFeeController@getStudent')->name('students.exam.get.student');
		Route::get('/student/exam/fee/payslip','ExamFeeController@feePayslip')->name('students.exam.fee.payslip');
	});

	Route::prefix('employees')->group(function(){
		//Employee Registration Route
		Route::get('/registration/view','Admin\Employees\EmployeeRegistrationController@view')->name('employees.registration.view');
		Route::get('/registration/add','Admin\Employees\EmployeeRegistrationController@add')->name('employees.registration.add');
		Route::post('/registration/store','Admin\Employees\EmployeeRegistrationController@store')->name('employees.registration.store');
		Route::get('/registration/edit/{id}','Admin\Employees\EmployeeRegistrationController@edit')->name('employees.registration.edit');
		Route::post('/registration/update/{id}','Admin\Employees\EmployeeRegistrationController@update')->name('employees.registration.update');
		Route::get('/registration/details/{id}','Admin\Employees\EmployeeRegistrationController@details')->name('employees.registration.details');
		//Employee Salary Route
		Route::get('/salary/view','Admin\Employees\EmployeeSalaryController@view')->name('employees.salary.view');
		Route::get('/salary/increment/{id}','Admin\Employees\EmployeeSalaryController@increment')->name('employees.salary.increment');
		Route::post('/salary/increment/store/{id}','Admin\Employees\EmployeeSalaryController@store')->name('employees.salary.store');
		Route::get('/salary/details/{id}','Admin\Employees\EmployeeSalaryController@details')->name('employees.salary.details');
		//Employee Leave Purpose Route
		Route::get('/purpose/view','Admin\Employees\LeavePurposeController@view')->name('employees.purpose.view');
		Route::get('/purpose/add','Admin\Employees\LeavePurposeController@add')->name('employees.purpose.add');
		Route::post('/purpose/store','Admin\Employees\LeavePurposeController@store')->name('employees.purpose.store');
		Route::get('/purpose/edit/{id}','Admin\Employees\LeavePurposeController@edit')->name('employees.purpose.edit');
		Route::post('/purpose/update/{id}','Admin\Employees\LeavePurposeController@update')->name('employees.purpose.update');
		Route::post('/purpose/delete','Admin\Employees\LeavePurposeController@delete')->name('employees.purpose.delete');
		//Employee Leave Route
		Route::get('/leave/view','Admin\Employees\EmployeeLeaveController@view')->name('employees.leave.view');
		Route::get('/leave/add','Admin\Employees\EmployeeLeaveController@add')->name('employees.leave.add');
		Route::post('/leave/store','Admin\Employees\EmployeeLeaveController@store')->name('employees.leave.store');
		Route::get('/leave/edit/{id}','Admin\Employees\EmployeeLeaveController@edit')->name('employees.leave.edit');
		Route::post('/leave/update/{id}','Admin\Employees\EmployeeLeaveController@update')->name('employees.leave.update');
		//Employee Attendance
		Route::get('/attend/view','Admin\Employees\EmployeeAttendController@view')->name('employees.attendance.view');
		Route::get('/attend/add','Admin\Employees\EmployeeAttendController@add')->name('employees.attendance.add');
		Route::post('/attend/store','Admin\Employees\EmployeeAttendController@store')->name('employees.attendance.store');
		Route::get('/attend/edit/{date}','Admin\Employees\EmployeeAttendController@edit')->name('employees.attendance.edit');
		Route::get('/attend/details/{date}','Admin\Employees\EmployeeAttendController@details')->name('employees.attendance.details');
		//Employee Monthly Salary
	    Route::get('/monthly/salary/view','Admin\Employees\MonthlySalaryController@view')->name('employees.monthly.salary.view');
	    Route::get('/monthly/salary/get','Admin\Employees\MonthlySalaryController@getSalary')->name('employees.monthly.salary.get');
	    Route::get('/monthly/salary/payslip/{employee_id}','Admin\Employees\MonthlySalaryController@paySlip')->name('employees.monthly.salary.payslip');
	});

	Route::prefix('marks')->group(function(){
		Route::get('/add','Admin\Marks\MarksController@add')->name('marks.add');
		Route::post('/store','Admin\Marks\MarksController@store')->name('marks.store');
		Route::get('/edit','Admin\Marks\MarksController@edit')->name('marks.edit');
		Route::get('/get-student-marks','Admin\Marks\MarksController@getMarks')->name('get-student-marks');
		Route::post('/update','Admin\Marks\MarksController@update')->name('marks.update');
		//Grade Point
		Route::get('/grade/view','Admin\Marks\GradeController@view')->name('marks.grade.view');
		Route::get('/grade/add','Admin\Marks\GradeController@add')->name('marks.grade.add');
		Route::post('/grade/store','Admin\Marks\GradeController@store')->name('marks.grade.store');
		Route::get('/grade/edit/{id}','Admin\Marks\GradeController@edit')->name('marks.grade.edit');
		Route::post('/grade/update/{id}','Admin\Marks\GradeController@update')->name('marks.grade.update');
	});

	Route::prefix('accounts')->group(function(){
		//Students Fee
	    Route::get('/student/fee/view', 'Admin\Account\StudentFeeController@view')->name('accounts.fee.view');
	    Route::get('/student/fee/add', 'Admin\Account\StudentFeeController@add')->name('accounts.fee.add');
	    Route::post('/student/fee/store', 'Admin\Account\StudentFeeController@store')->name('accounts.fee.store');
	    Route::get('/student/getstudent', 'Admin\Account\StudentFeeController@getStudent')->name('accounts.fee.getstudent');
	    //Employee Salary
	    Route::get('/employee/salary/view', 'Admin\Account\SalaryController@view')->name('accounts.salary.view');
	    Route::get('/employee/salary/add', 'Admin\Account\SalaryController@add')->name('accounts.salary.add');
	    Route::post('/employee/salary/store', 'Admin\Account\SalaryController@store')->name('accounts.salary.store');
	    Route::get('/employee/get-employee', 'Admin\Account\SalaryController@getEmployee')->name('accounts.salary.get-employee');
	    //Others Cost
		Route::get('/cost/view', 'Admin\Account\OtherCostController@view')->name('accounts.cost.view');
		Route::get('/cost/add', 'Admin\Account\OtherCostController@add')->name('accounts.cost.add');
		Route::post('/cost/store', 'Admin\Account\OtherCostController@store')->name('accounts.cost.store');
		Route::get('/cost/edit/{id}', 'Admin\Account\OtherCostController@edit')->name('accounts.cost.edit');
		Route::post('/cost/update/{id}', 'Admin\Account\OtherCostController@update')->name('accounts.cost.update');
	});

	Route::prefix('reports')->group(function(){
	   //Profit
	   Route::get('/profit/view', 'Admin\Report\ProfitController@view')->name('reports.profit.view');
	   Route::get('/profit/get', 'Admin\Report\ProfitController@profit')->name('reports.profit.datewise.get');
	   Route::get('/profit/pdf', 'Admin\Report\ProfitController@pdf')->name('reports.profit.pdf');
	   //Mark Sheet
	   Route::get('/marksheet/view', 'Admin\Report\ProfitController@markSheetView')->name('reports.marksheet.view');
       Route::get('/marksheet/get', 'Admin\Report\ProfitController@markSheetGet')->name('reports.marksheet.get');
       //Attendance Report
	   Route::get('/attendance/view', 'Admin\Report\ProfitController@attendanceView')->name('reports.attendance.view');
       Route::get('/attendance/get', 'Admin\Report\ProfitController@attendanceGet')->name('reports.attendance.get');
       //All Student Result
	   Route::get('/result/view', 'Admin\Report\ProfitController@resultView')->name('reports.result.view');
       Route::get('/result/get', 'Admin\Report\ProfitController@resultGet')->name('reports.result.get');
       //All Student ID Card
	   Route::get('/id-card/view', 'Admin\Report\ProfitController@idCardView')->name('reports.id-card.view');
       Route::get('/id-card/get', 'Admin\Report\ProfitController@idCardGet')->name('reports.id-card.get');
	});

	Route::get('/get-student','Admin\DefaultController@getStudent')->name('get-student');
	Route::get('/get-subject','Admin\DefaultController@getSubject')->name('get-subject');

});

Route::group(['namespace'=>'Student','middleware'=>['auth','student']], function (){
	Route::prefix('student')->group(function(){
	Route::get('dashboard','DashboardController@index')->name('student.dashboard'); 
	Route::get('/studentmark/view','Marks\MarksController@index')->name('student.mark.view');
		});
	Route::prefix('payment')->group(function(){
	Route::get('/studentpayment/view','Payment\PaymentController@index')->name('studentpayment.view'); 
		});

	Route::prefix('info')->group(function(){
	Route::get('/studentinfo/view','InfoController@index')->name('studentinfo.view');
	Route::get('/assignment/add','InfoController@add')->name('studentinfo.add');
	Route::post('/studentinfo/store','InfoController@store')->name('studentinfo.store');
	Route::get('/studentinfo/edit/{id}','InfoController@edit')->name('studentinfo.edit');
	Route::post('/studentinfo/update/{id}','InfoController@update')->name('studentinfo.update');
	Route::post('/studentinfo/delete','InfoController@delete')->name('studentinfo.delete');
		});
	
});

Route::group(['namespace'=>'Teacher','middleware'=>['auth','teacher']], function (){
	Route::prefix('teacher')->group(function(){
	Route::get('dashboard','DashboardController@index')->name('teacher.dashboard'); 
	
		});
	
		Route::prefix('teacherinfo')->group(function(){
			Route::get('/teacherinfo/view','InfoController@index')->name('teacherinfo.view'); 
				});
});
 