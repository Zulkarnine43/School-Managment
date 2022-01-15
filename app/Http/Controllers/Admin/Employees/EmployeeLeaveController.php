<?php

namespace App\Http\Controllers\Admin\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\EmployeeSalaryLog;
use App\Model\Designation;
use App\Model\User;
use App\Model\LeavePurpose;
use App\Model\EmployeeLeave;
use DB;
use PDF;
use Auth;

class EmployeeLeaveController extends Controller
{
    public function view()
    {
    	$data['allData'] = EmployeeLeave::orderBy('id','DESC')->get();
    	return view('admin.employees.leave.leave-view',$data);
    }

    public function add()
    {    	
        $data['leavePurposes'] = LeavePurpose::all();
        $data['employees'] = User::where('usertype','employee')->get();
        return view('admin.employees.leave.leave-add',$data);
    }
    public function store(Request $request)
    {
    	if($request->leave_purpose_id == "0")
    	{
    		$leavePurposes = new LeavePurpose();
    		$leavePurposes->name = $request->name;
    		$leavePurposes->created_by = Auth::user()->id;
    		$leavePurposes->save();
    		$leave_purpose_id = $leavePurposes->id;
    	}
    	else
    	{
    		$leave_purpose_id = $request->leave_purpose_id;
    	}

    	$employeeleaves = new EmployeeLeave();
    	$employeeleaves->employee_id = $request->employee_id;
    	$employeeleaves->start_date = date('Y-m-d',strtotime($request->start_date));
    	$employeeleaves->end_date = date('Y-m-d',strtotime($request->end_date));
    	$employeeleaves->leave_purpose_id = $leave_purpose_id;
    	$employeeleaves->save();
        
        return redirect()->route('employees.leave.view')->with('success','Employee Leave has been created successfully!');
    }

    public function edit($id)
    {
    	$data['editData'] = EmployeeLeave::find($id);
        $data['leavePurposes'] = LeavePurpose::all();
        $data['employees'] = User::where('usertype','employee')->get();
        return view('admin.employees.leave.leave-add',$data);
    }

    public function update(Request $request, $id)
    {
        if($request->leave_purpose_id == "0")
    	{
    		$leavePurposes = new LeavePurpose();
    		$leavePurposes->name = $request->name;
    		$leavePurposes->created_by = Auth::user()->id;
    		$leavePurposes->save();
    		$leave_purpose_id = $leavePurposes->id;
    	}
    	else
    	{
    		$leave_purpose_id = $request->leave_purpose_id;
    	}

    	$employeeleaves = EmployeeLeave::find($id);
    	$employeeleaves->employee_id = $request->employee_id;
    	$employeeleaves->start_date = date('Y-m-d',strtotime($request->start_date));
    	$employeeleaves->end_date = date('Y-m-d',strtotime($request->end_date));
    	$employeeleaves->leave_purpose_id = $leave_purpose_id;
    	$employeeleaves->save();
        return redirect()->route('employees.leave.view')->with('success','Employee Leave has been updated successfully!');
    }    

    public function details($id) 
    {
        $data['details'] = User::find($id);
        $data['schools'] = School::where('status','1')->first();
        $pdf = PDF::loadView('admin.employees.registration.pdf.employee-details', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
