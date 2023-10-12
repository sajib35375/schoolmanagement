<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('logout',[App\Http\Controllers\AuthenticationController::class,'userLogout'])->name('user.logout');

Route::group(['middleware'=>'auth'],function (){


//user route
Route::get('user/view',[App\Http\Controllers\UserController::class,'userView'])->name('user.view');
Route::get('user/add',[App\Http\Controllers\UserController::class,'userAdd'])->name('user.add');
Route::post('user/store',[App\Http\Controllers\UserController::class,'userStore'])->name('user.store');
Route::get('user/edit/{id}',[App\Http\Controllers\UserController::class,'userEdit'])->name('user.edit');
Route::post('user/update/{id}',[App\Http\Controllers\UserController::class,'userUpdate'])->name('user.update');
Route::get('user/delete/{id}',[App\Http\Controllers\UserController::class,'userDelete'])->name('user.delete');
//user profile
Route::get('profile/view',[App\Http\Controllers\ProfileController::class,'ProfileView'])->name('profile.view');
Route::get('edit/profile',[App\Http\Controllers\ProfileController::class,'ProfileEdit'])->name('profile.edit');
Route::post('update/profile',[App\Http\Controllers\ProfileController::class,'ProfileUpdate'])->name('profile.update');
//change password
Route::get('password/view',[App\Http\Controllers\ProfileController::class,'passwordView'])->name('password.view');
Route::post('password/change',[App\Http\Controllers\ProfileController::class,'passwordChange'])->name('password.change');
//student class Route
Route::get('student/class/view',[App\Http\Controllers\setup\StudentClassController::class,'StudentClass'])->name('student.class');
Route::post('student/class/store',[App\Http\Controllers\setup\StudentClassController::class,'StudentClassStore'])->name('student.class.store');
Route::get('student/class/edit/{id}',[App\Http\Controllers\setup\StudentClassController::class,'StudentClassEdit'])->name('student.class.edit');
Route::post('student/class/update',[App\Http\Controllers\setup\StudentClassController::class,'StudentClassUpdate'])->name('student.class.update');
Route::get('student/class/delete/{id}',[App\Http\Controllers\setup\StudentClassController::class,'StudentClassDelete'])->name('student.class.delete');
//student year
Route::get('student/view',[App\Http\Controllers\setup\StudentYearController::class,'studentYear'])->name('student.year');
Route::post('student/year/store',[App\Http\Controllers\setup\StudentYearController::class,'studentYearStore'])->name('student.year.store');
Route::get('student/year/edit/{id}',[App\Http\Controllers\setup\StudentYearController::class,'studentYearEdit'])->name('student.year.edit');
Route::post('student/year/update',[App\Http\Controllers\setup\StudentYearController::class,'studentYearUpdate'])->name('student.year.update');
Route::get('student/year/delete/{id}',[App\Http\Controllers\setup\StudentYearController::class,'studentYearDelete'])->name('student.year.delete');
//student_details group
Route::get('student/group/view',[App\Http\Controllers\setup\StudentGroupController::class,'studentGroup'])->name('student.group');
Route::post('student/group/store',[App\Http\Controllers\setup\StudentGroupController::class,'studentGroupStore'])->name('student.group.store');
Route::get('student/group/edit/{id}',[App\Http\Controllers\setup\StudentGroupController::class,'studentGroupEdit'])->name('student.group.edit');
Route::post('student/group/update',[App\Http\Controllers\setup\StudentGroupController::class,'studentGroupUpdate'])->name('student.group.update');
Route::get('student/group/delete/{id}',[App\Http\Controllers\setup\StudentGroupController::class,'studentGroupDelete'])->name('student.group.delete');
//student_details shift
Route::get('student/shift',[App\Http\Controllers\setup\StudentShiftController::class,'studentShift'])->name('student.shift');
Route::post('student/shift/store',[App\Http\Controllers\setup\StudentShiftController::class,'studentShiftStore'])->name('student.shift.store');
Route::get('student/shift/edit/{id}',[App\Http\Controllers\setup\StudentShiftController::class,'studentShiftEdit'])->name('student.shift.edit');
Route::post('student/shift/update',[App\Http\Controllers\setup\StudentShiftController::class,'studentShiftUpdate'])->name('student.shift.update');
Route::get('student/shift/delete/{id}',[App\Http\Controllers\setup\StudentShiftController::class,'studentShiftDelete'])->name('student.shift.delete');
//student_details fee category
Route::get('fee/category',[App\Http\Controllers\setup\FeeCategoryController::class,'feeCategory'])->name('fee.category');
Route::post('fee/category/store',[App\Http\Controllers\setup\FeeCategoryController::class,'feeCategoryStore'])->name('fee.category.store');
Route::get('fee/category/edit/{id}',[App\Http\Controllers\setup\FeeCategoryController::class,'feeCategoryEdit'])->name('fee.category.edit');
Route::post('fee/category/update',[App\Http\Controllers\setup\FeeCategoryController::class,'feeCategoryUpdate'])->name('fee.category.update');
Route::get('fee/category/delete/{id}',[App\Http\Controllers\setup\FeeCategoryController::class,'feeCategoryDelete'])->name('fee.category.delete');
//fee category amount
Route::get('fee/amount',[App\Http\Controllers\setup\FeeAmountController::class,'feeAmount'])->name('fee.amount');
Route::get('add/fee/amount',[App\Http\Controllers\setup\FeeAmountController::class,'AddFeeAmount'])->name('add.fee.amount');
Route::post('fee/amount/store',[App\Http\Controllers\setup\FeeAmountController::class,'feeAmountStore'])->name('fee.amount.store');
Route::get('fee/amount/edit/{fee_id}',[App\Http\Controllers\setup\FeeAmountController::class,'feeAmountEdit'])->name('fee.amount.edit');
Route::post('fee/amount/update/{fee_id}',[App\Http\Controllers\setup\FeeAmountController::class,'feeAmountUpdate'])->name('fee.amount.update');
Route::get('fee/amount/delete/{fee_id}',[App\Http\Controllers\setup\FeeAmountController::class,'feeAmountDelete'])->name('fee.amount.delete');
Route::get('fee/amount/details/{fee_id}',[App\Http\Controllers\setup\FeeAmountController::class,'feeAmountDetails'])->name('fee.amount.details');
//Exam Type
Route::get('exam/type',[App\Http\Controllers\setup\ExamTypeController::class,'examType'])->name('exam.type');
Route::post('exam/type/store',[App\Http\Controllers\setup\ExamTypeController::class,'examTypeStore'])->name('exam.type.store');
Route::get('exam/type/edit/{id}',[App\Http\Controllers\setup\ExamTypeController::class,'examTypeEdit'])->name('exam.type.edit');
Route::post('exam/type/update',[App\Http\Controllers\setup\ExamTypeController::class,'examTypeUpdate'])->name('exam.type.update');
Route::get('exam/type/delete/{id}',[App\Http\Controllers\setup\ExamTypeController::class,'examTypeDelete'])->name('exam.type.delete');
//subject
Route::get('subject',[App\Http\Controllers\setup\SubjectController::class,'subjectView'])->name('subject.view');
Route::post('subject/store',[App\Http\Controllers\setup\SubjectController::class,'subjectStore'])->name('subject.store');
Route::get('subject/edit/{id}',[App\Http\Controllers\setup\SubjectController::class,'subjectEdit'])->name('subject.edit');
Route::post('subject/update',[App\Http\Controllers\setup\SubjectController::class,'subjectUpdate'])->name('subject.update');
Route::get('subject/delete/{id}',[App\Http\Controllers\setup\SubjectController::class,'subjectDelete'])->name('subject.delete');
//Assign subject
Route::get('assign/subject',[App\Http\Controllers\setup\AssignSubjectController::class,'assignSubject'])->name('assign_subject');
Route::get('add/assign/subject',[App\Http\Controllers\setup\AssignSubjectController::class,'addAssignSubject'])->name('add.assign_subject');
Route::post('store/assign/subject',[App\Http\Controllers\setup\AssignSubjectController::class,'StoreAssignSubject'])->name('store.assign_subject');
Route::get('edit/assign/subject/{classId}',[App\Http\Controllers\setup\AssignSubjectController::class,'EditAssignSubject'])->name('edit.assign_subject');
Route::post('update/assign/subject/{classId}',[App\Http\Controllers\setup\AssignSubjectController::class,'UpdateAssignSubject'])->name('update.assign_subject');
Route::get('delete/assign/subject/{classId}',[App\Http\Controllers\setup\AssignSubjectController::class,'DeleteAssignSubject'])->name('delete.assign_subject');
Route::get('details/assign/subject/{classId}',[App\Http\Controllers\setup\AssignSubjectController::class,'DetailsAssignSubject'])->name('details.assign_subject');
//manage Designation
Route::get('designation',[App\Http\Controllers\setup\DesignationController::class,'designation'])->name('designation');
Route::post('designation/store',[App\Http\Controllers\setup\DesignationController::class,'designationStore'])->name('designation.store');
Route::get('designation/edit/{id}',[App\Http\Controllers\setup\DesignationController::class,'designationEdit'])->name('designation.edit');
Route::post('designation/update',[App\Http\Controllers\setup\DesignationController::class,'designationUpdate'])->name('designation.update');
Route::get('designation/delete/{id}',[App\Http\Controllers\setup\DesignationController::class,'designationDelete'])->name('designation.delete');
//Student Registration
Route::get('student/reg',[App\Http\Controllers\Student\StudentRegController::class,'studentReg'])->name('student.reg');
Route::get('student/add',[App\Http\Controllers\Student\StudentRegController::class,'studentAdd'])->name('student.add');
Route::post('student/reg/store',[App\Http\Controllers\Student\StudentRegController::class,'studentRegStore'])->name('stu.reg.store');
Route::get('student/reg/search',[App\Http\Controllers\Student\StudentRegController::class,'studentRegSearch'])->name('stu.reg.search');
Route::get('student/reg/edit/{student_id}',[App\Http\Controllers\Student\StudentRegController::class,'studentRegEdit'])->name('stu.reg.edit');
Route::post('student/reg/update/{student_id}',[App\Http\Controllers\Student\StudentRegController::class,'studentRegUpdate'])->name('stu.reg.update');
Route::get('student/reg/delete/{id}',[App\Http\Controllers\Student\StudentRegController::class,'studentRegDelete'])->name('stu.reg.delete');
//Student Promotion
Route::get('student/promotion/{student_id}',[App\Http\Controllers\Student\StudentRegController::class,'studentPromotion'])->name('stu.promo');
Route::post('student/promotion/update/{student_id}',[App\Http\Controllers\Student\StudentRegController::class,'studentPromotionUpdate'])->name('stu.promo.update');
//student_details details pdf
Route::get('stu/details/pdf/{student_id}',[App\Http\Controllers\Student\StudentRegController::class,'StudentPDFView'])->name('stu.details.pdf');
//roll generator
Route::get('roll/generator',[App\Http\Controllers\Student\RollGenerateController::class,'rollGenerator'])->name('roll.generator');
Route::get('roll/search',[App\Http\Controllers\Student\RollGenerateController::class,'rollShow'])->name('roll.show');
Route::post('roll/generate/store',[App\Http\Controllers\Student\RollGenerateController::class,'rollGenerateStore'])->name('roll.generate.store');
//student registration fee
Route::get('student/fee',[App\Http\Controllers\Student\StudentFeeController::class,'studentFee'])->name('student.fee');
Route::get('payslip/download/{student_id}/{class_id}',[App\Http\Controllers\Student\StudentFeeController::class,'paySlip'])->name('pay.slip');
//student monthly fee
Route::get('student/monthly/fee',[App\Http\Controllers\Student\StudentFeeController::class,'studentMonthlyFee'])->name('monthly.fee');
Route::get('monthly/payslip/download/{student_id}/{year_id}/{class_id}/{month}',[App\Http\Controllers\Student\StudentFeeController::class,'MonthlyPaySlip'])->name('monthly.pay.slip');
//Exam type fee
Route::get('exam/type/fee',[App\Http\Controllers\Student\StudentFeeController::class,'ExamTypeFee'])->name('exam.type.fee');
Route::get('exam/wise/paySlip/{student_id}/{class_id}/{year_id}',[App\Http\Controllers\Student\StudentFeeController::class,'ExamWisePaySlip'])->name('exam.pay.slip');




///////////////employee section////////////////////////




//employee registration
Route::get('employee/registration',[App\Http\Controllers\Employee\EmployeeController::class,'employeeReg'])->name('employee.reg');
Route::get('add/employee',[App\Http\Controllers\Employee\EmployeeController::class,'AddEmployee'])->name('add.employee');
Route::post('add/employee/store',[App\Http\Controllers\Employee\EmployeeController::class,'AddEmployeeStore'])->name('add.employee.store');
Route::get('edit/employee/{employee_id}',[App\Http\Controllers\Employee\EmployeeController::class,'EditEmployee'])->name('edit.employee');
Route::post('update/employee/{employee_id}',[App\Http\Controllers\Employee\EmployeeController::class,'UpdateEmployee'])->name('update.employee');
Route::get('delete/employee/{employee_id}',[App\Http\Controllers\Employee\EmployeeController::class,'DeleteEmployee'])->name('delete.employee');
//employee details pdf
Route::get('employee/details/pdf/{employee_id}',[App\Http\Controllers\Employee\EmployeeController::class,'employeePdf'])->name('employee.pdf');
//employee salary
Route::get('employee/salary',[App\Http\Controllers\Employee\EmployeeSalaryController::class,'employeeSalary'])->name('employee.salary');
Route::get('salary/increment/{id}',[App\Http\Controllers\Employee\EmployeeSalaryController::class,'SalaryIncrement'])->name('salary.increment');
Route::post('salary/increment/update',[App\Http\Controllers\Employee\EmployeeSalaryController::class,'SalaryIncrementUpdate'])->name('salary.increment.update');
Route::get('salary/increment/details/{id}',[App\Http\Controllers\Employee\EmployeeSalaryController::class,'SalaryIncrementDetails'])->name('salary.increment.details');

//employee leave
Route::get('employee/leave/view',[App\Http\Controllers\Employee\EmployeeLeaveController::class,'employeeLeave'])->name('employee.leave');
Route::post('employee/leave/store',[App\Http\Controllers\Employee\EmployeeLeaveController::class,'employeeLeaveStore'])->name('employee.leave.store');
Route::get('employee/leave/edit/{id}',[App\Http\Controllers\Employee\EmployeeLeaveController::class,'employeeLeaveEdit'])->name('employee.leave.edit');
Route::post('employee/leave/update/{id}',[App\Http\Controllers\Employee\EmployeeLeaveController::class,'employeeLeaveUpdate'])->name('employee.leave.update');
Route::get('employee/leave/delete/{id}',[App\Http\Controllers\Employee\EmployeeLeaveController::class,'employeeLeaveDelete'])->name('employee.leave.delete');

//employee attendance
Route::get('employee/attendance',[App\Http\Controllers\Employee\EmployeeAttendanceController::class,'EmployeeAttendance'])->name('employee.attendance');
Route::get('add/attendance',[App\Http\Controllers\Employee\EmployeeAttendanceController::class,'AddAttendance'])->name('add.attendance');
Route::post('employee/attendance/store',[App\Http\Controllers\Employee\EmployeeAttendanceController::class,'EmployeeAttendanceStore'])->name('store.attendance');
Route::get('attendance/edit/{date}',[App\Http\Controllers\Employee\EmployeeAttendanceController::class,'EmployeeAttendanceEdit'])->name('edit.attendance');
Route::post('attendance/update',[App\Http\Controllers\Employee\EmployeeAttendanceController::class,'EmployeeAttendanceUpdate'])->name('update.attendance');
Route::get('employee/attendance/details/{date}',[App\Http\Controllers\Employee\EmployeeAttendanceController::class,'EmployeeAttendanceDetails'])->name('employee.attendance.details');

//monthly salary
Route::get('monthly/salary',[App\Http\Controllers\Employee\MonthlySalaryController::class,'monthlySalary'])->name('monthly.salary');
Route::get('monthly/pay/slip/{employee_id}/{date}',[App\Http\Controllers\Employee\MonthlySalaryController::class,'monthlyPaySlipEmployee'])->name('monthly.pay.slip.employee');

//student marks entry
Route::get('student/marks/add',[App\Http\Controllers\Marks\StudentMarksController::class,'StudentMarksAdd'])->name('marks.add');
Route::get('student/subject/get',[App\Http\Controllers\Marks\StudentMarksController::class,'StudentSubjectGet'])->name('subject.get');
Route::get('student/subject/marks',[App\Http\Controllers\Marks\StudentMarksController::class,'StudentSubjectMarks'])->name('subject.mark');
Route::post('store/subject/marks',[App\Http\Controllers\Marks\StudentMarksController::class,'StoreSubjectMarks'])->name('subject.mark.store');
Route::get('edit/marks/view',[App\Http\Controllers\Marks\StudentMarksController::class,'EditMarksView'])->name('edit.mark.view');
Route::get('edit/subject/marks',[App\Http\Controllers\Marks\StudentMarksController::class,'EditSubjectMarks'])->name('edit.subject.marks');
Route::post('update/subject/marks',[App\Http\Controllers\Marks\StudentMarksController::class,'UpdateSubjectMarks'])->name('subject.mark.update');

// student marks grade
Route::get('student/grade/view',[App\Http\Controllers\Marks\GradeController::class,'StudentGradeView'])->name('student.grade.view');
Route::get('add/new/grade',[App\Http\Controllers\Marks\GradeController::class,'AddNewGrade'])->name('add.new.grade');
Route::post('store/new/grade',[App\Http\Controllers\Marks\GradeController::class,'StoreNewGrade'])->name('store.new.grade');
Route::get('edit/grade/{id}',[App\Http\Controllers\Marks\GradeController::class,'EditGrade'])->name('edit.grade');
Route::post('update/grade/{id}',[App\Http\Controllers\Marks\GradeController::class,'UpdateGrade'])->name('update.grade');
Route::get('delete/grade/{id}',[App\Http\Controllers\Marks\GradeController::class,'DeleteGrade'])->name('delete.grade');

//student fee
Route::get('student/fee/view',[App\Http\Controllers\Student\Fee\StuFeeController::class,'StudentFeeView'])->name('student.fee.view');
Route::get('student/fee/add',[App\Http\Controllers\Student\Fee\StuFeeController::class,'StudentFeeAdd'])->name('student.fee.add');
Route::get('student/fee/search',[App\Http\Controllers\Student\Fee\StuFeeController::class,'StudentFeeSearch'])->name('student.fee.search');
Route::post('account/fee/store',[App\Http\Controllers\Student\Fee\StuFeeController::class,'AccountFeeStore'])->name('account.fee.store');


// student other fee
Route::get('student/other/fee/all',[App\Http\Controllers\Student\StudentFeeController::class,'otherFeeAll'])->name('other.fee.all');
Route::get('student/other/fee/add',[App\Http\Controllers\Student\StudentFeeController::class,'otherFee'])->name('other.fee.add');
Route::post('student/other/fee/store',[App\Http\Controllers\Student\StudentFeeController::class,'otherFeeStore'])->name('other.fee.store');
Route::get('student/other/fee/view',[App\Http\Controllers\Student\StudentFeeController::class,'otherFeeView'])->name('other.fee.view');
Route::get('payslip/other/fee/{student_id}/{class_id}/{year_id}',[App\Http\Controllers\Student\StudentFeeController::class,'otherFeePayslip'])->name('other.fee.payslip');
// student other fee edit delete
Route::get('other/fee/edit/{id}',[App\Http\Controllers\Student\StudentFeeController::class,'otherFeeEdit'])->name('other.fee.edit');
Route::post('other/fee/update/{id}',[App\Http\Controllers\Student\StudentFeeController::class,'otherFeeUpdate'])->name('other.fee.update');
Route::get('other/fee/delete/{id}',[App\Http\Controllers\Student\StudentFeeController::class,'otherFeeDelete'])->name('other.fee.delete');

// student other fee submit
Route::get('submit/other/fee',[App\Http\Controllers\Student\Fee\StuFeeController::class,'submitOtherFee'])->name('submit.other.fee');
Route::get('submit/other/fee/add',[App\Http\Controllers\Student\Fee\StuFeeController::class,'submitOtherFeeAdd'])->name('submit.other.fee.add');
Route::get('submit/other/fee/search',[App\Http\Controllers\Student\Fee\StuFeeController::class,'submitOtherFeeSearch'])->name('submit.other.fee.search');
Route::post('submit/account/fee/store',[App\Http\Controllers\Student\Fee\StuFeeController::class,'submitAccountFeeStore'])->name('submit.account.fee.store');

// employee salary
Route::get('employee/salary/view',[App\Http\Controllers\Employee\EmployeeAccountController::class,'EmployeeAccountView'])->name('employee.salary.view');
Route::get('employee/salary/add',[App\Http\Controllers\Employee\EmployeeAccountController::class,'EmployeeAccountAdd'])->name('employee.salary.add');
Route::get('employee/salary/get',[App\Http\Controllers\Employee\EmployeeAccountController::class,'EmployeeAccountGet'])->name('employee.salary.get');
Route::post('employee/salary/store',[App\Http\Controllers\Employee\EmployeeAccountController::class,'EmployeeAccountStore'])->name('employee.salary.store');

// other cost
Route::get('other/cost/view',[App\Http\Controllers\OtherCostController::class,'OtherCostView'])->name('other.cost.view');
Route::get('other/cost/add',[App\Http\Controllers\OtherCostController::class,'OtherCostAdd'])->name('other.cost.add');
Route::post('other/cost/store',[App\Http\Controllers\OtherCostController::class,'OtherCostStore'])->name('other.cost.store');
Route::get('other/cost/edit/{id}',[App\Http\Controllers\OtherCostController::class,'OtherCostEdit'])->name('other.cost.edit');
Route::post('other/cost/update/{id}',[App\Http\Controllers\OtherCostController::class,'OtherCostUpdate'])->name('other.cost.update');
Route::get('other/cost/delete/{id}',[App\Http\Controllers\OtherCostController::class,'OtherCostDelete'])->name('other.cost.delete');

//monthly /yearly profit
Route::get('profit/view',[App\Http\Controllers\Reports\CalculateProfitController::class,'ProfitView'])->name('profit.view');
Route::get('profit/pdf/view/{start_date}/{end_date}/{sdate}/{edate}',[App\Http\Controllers\Reports\CalculateProfitController::class,'ProfitPDFView'])->name('profit.pdf.view');

// student marksheet
Route::get('marksheet/view',[App\Http\Controllers\Reports\MarkSheetGenerateController::class,'MarkSheetView'])->name('marksheet.view');
Route::get('marksheet/view/pdf',[App\Http\Controllers\Reports\MarkSheetGenerateController::class,'MarkSheetViewPDF'])->name('marksheet.view.pdf');

// attendance reports
Route::get('attendance/report/view',[App\Http\Controllers\Reports\AttendanceReportController::class,'attendanceReportView'])->name('attendance.report.view');
Route::get('attendance/report/pdf',[App\Http\Controllers\Reports\AttendanceReportController::class,'attendanceReportPDF'])->name('attendance.report.pdf');

// student result
Route::get('student/result/view',[App\Http\Controllers\Reports\StudentResultController::class,'StudentResultView'])->name('student.result.view');
Route::get('student/result/pdf',[App\Http\Controllers\Reports\StudentResultController::class,'StudentResultPDF'])->name('student.result.pdf');

//student marks show
Route::get('student/marks/show',[App\Http\Controllers\Marks\StudentMarksController::class,'AllMarksShow'])->name('all.marks.show');
Route::get('student/marks/delete/{id}',[App\Http\Controllers\Marks\StudentMarksController::class,'AllMarksDelete'])->name('all.marks.delete');

});



