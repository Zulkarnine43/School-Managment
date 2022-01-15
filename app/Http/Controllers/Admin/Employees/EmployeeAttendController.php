<?php

namespace App\Http\Controllers\Admin\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\EmployeeSalaryLog;
use App\Model\Designation;
use App\Model\User;
use App\Model\LeavePurpose;
use App\Model\EmployeeLeave;
use App\Model\EmployeeAttendance;
use DB;
use PDF;
use Auth;

class EmployeeAttendController extends Controller
{
    public function view(){
    	$data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id','DESC')->get();
    	return view('admin.employees.attend.attendance-view',$data);
    }

    public function add(){ 
        $data['employees'] = User::where('usertype','employee')->get();
        return view('admin.employees.attend.attendance-add',$data);
    }
    public function store(Request $request){
        EmployeeAttendance::where('date',date('Y-m-d',strtotime($request->date)))->delete();
    	$countemployee = count($request->employee_id);
        for ($i=0; $i <$countemployee ; $i++) { 
            $attend_status = 'attend_status'.$i;
            $attend = new EmployeeAttendance();
            $attend->date = date('Y-m-d',strtotime($request->date));
            $attend->employee_id = $request->employee_id[$i];
            $attend->attend_status = $request->$attend_status;
            $attend->save();
        }
        return redirect()->route('employees.attendance.view')->with('success','Data saved successfully!');
    }

    public function edit($date){
    	$data['editData'] = EmployeeAttendance::where('date',$date)->get();
        $data['employees'] = User::where('usertype','employee')->get();
        return view('admin.employees.attend.attendance-add',$data);
    }

    public function details($date) {
        $data['details'] = EmployeeAttendance::where('date',$date)->get();
        return view('admin.employees.attend.attendance-details',$data);
    }
}
