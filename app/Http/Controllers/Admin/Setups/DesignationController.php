<?php

namespace App\Http\Controllers\Admin\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Designation;
use Auth;

class DesignationController extends Controller
{
    public function view()
    {
    	$designations = Designation::all();
    	return view('admin.setups.designation.designation-view',compact('designations'));
    }

    public function add()
    {    	
    	return view('admin.setups.designation.designation-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:designations,name'
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }

        $designations = new Designation();
        $designations->name = $request->name;
        $designations->status = $status;
        $designations->created_by = Auth::user()->id;
        $designations->save();

        return redirect()->route('setups.employee.designation.view')->with('success','Designation has been created successfully!');
    }

    public function edit($id)
    {
    	$designations = Designation::find($id);
    	return view('admin.setups.designation.designation-add',compact('designations'));
    }

    public function update(Request $request, $id)
    {
        $designations = Designation::find($id);
        $this->validate($request,[
            'name' => 'required|unique:designations,name,'.$designations->id
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }
        
        $designations->name = $request->name;
        $designations->status = $status;
        $designations->updated_by = Auth::user()->id;
        $designations->save();

        return redirect()->route('setups.employee.designation.view')->with('success','Designation has been updated successfully!');
    }

    public function delete(Request $request)
    {
    	$designations = Designation::find($request->id);  	
    	$designations->delete();
    	return redirect()->route('setups.employee.designation.view')->with('success','Designation has been deleted successfully!');
    }
}
