<?php

namespace App\Http\Controllers\Admin\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\EmployeeSalaryLog;
use App\Model\Designation;
use App\Model\User;
use DB;

class EmployeeSalaryController extends Controller
{
    public function view()
    {
    	$data['allData'] = User::where('usertype','employee')->get();
    	return view('admin.employees.salary.salary-view',$data);
    }

    public function increment($id)
    {
    	$data['editData'] = User::find($id);
        return view('admin.employees.salary.salary-increment-add',$data);
    }

    public function store(Request $request, $id)
    {
        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary+(float)$request->increment_salary;
        $user->salary = $present_salary;
        $user->save();
        $salaryData = new EmployeeSalaryLog();
        $salaryData->employee_id = $id;
        $salaryData->previous_salary = $previous_salary;
        $salaryData->increment_salary = $request->increment_salary;
        $salaryData->present_salary = $present_salary;
        $salaryData->effected_date = date('Y-m-d',strtotime($request->effected_date));
        $salaryData->save();
        return redirect()->route('employees.salary.view')->with('success','Employee Salary Increment has been inserted successfully!');
    }    

    public function details($id) 
    {
        $data['details'] = User::find($id);
        $data['salaryLogs'] = EmployeeSalaryLog::where('employee_id',$data['details']->id)->get();
        return view('admin.employees.salary.salary-increment-details',$data);
    }
}
