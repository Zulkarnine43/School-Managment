<?php

namespace App\Http\Controllers\Admin\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\LeavePurpose;
use Auth;

class LeavePurposeController extends Controller
{
    public function view()
    {
    	$leavePurposes = LeavePurpose::all();
    	return view('admin.employees.leave_purpose.leave-purpose-view',compact('leavePurposes'));
    }

    public function add()
    {    	
    	return view('admin.employees.leave_purpose.leave-purpose-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:leave_purposes,name'
        ]);

        $leavePurposes = new LeavePurpose();
        $leavePurposes->name = $request->name;
        $leavePurposes->created_by = Auth::user()->id;
        $leavePurposes->save();

        return redirect()->route('employees.purpose.view')->with('success','Leave Purpose has been created successfully!');
    }

    public function edit($id)
    {
    	$leavePurposes = LeavePurpose::find($id);
    	return view('admin.employees.leave_purpose.leave-purpose-add',compact('leavePurposes'));
    }

    public function update(Request $request, $id)
    {
        $leavePurposes = LeavePurpose::find($id);
        $this->validate($request,[
            'name' => 'required|unique:leave_purposes,name,'.$leavePurposes->id
        ]);
        
        $leavePurposes->name = $request->name;
        $leavePurposes->updated_by = Auth::user()->id;
        $leavePurposes->save();

        return redirect()->route('employees.purpose.view')->with('success','Leave Purpose has been updated successfully!');
    }

    public function delete(Request $request)
    {
    	$leavePurposes = LeavePurpose::find($request->id);  	
    	$leavePurposes->delete();
    	return redirect()->route('employees.purpose.view')->with('success','Leave Purpose has been deleted successfully!');
    }
}
