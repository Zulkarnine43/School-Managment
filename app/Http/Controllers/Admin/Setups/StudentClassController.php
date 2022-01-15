<?php

namespace App\Http\Controllers\Admin\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClass;
use Auth;

class StudentClassController extends Controller
{
    public function view()
    {
    	$classDetails = StudentClass::all();
    	return view('admin.setups.class.class-view',compact('classDetails'));
    }

    public function add()
    {    	
    	return view('admin.setups.class.class-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:student_classes,name'
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }

        $studentClass = new StudentClass();
        $studentClass->name = $request->name;
        $studentClass->status = $status;
        $studentClass->created_by = Auth::user()->id;
        $studentClass->save();

        return redirect()->route('setups.student.class.view')->with('success','Student Class has been created successfully!');
    }

    public function edit($id)
    {
    	$studentClass = StudentClass::find($id);
    	return view('admin.setups.class.class-add',compact('studentClass'));
    }

    public function update(Request $request, $id)
    {
        $studentClass = StudentClass::find($id);
        $this->validate($request,[
            'name' => 'required|unique:student_classes,name,'.$studentClass->id
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }
        
        $studentClass->name = $request->name;
        $studentClass->status = $status;
        $studentClass->updated_by = Auth::user()->id;
        $studentClass->save();

        return redirect()->route('setups.student.class.view')->with('success','Student Class has been updated successfully!');
    }

    public function delete(Request $request)
    {
    	$studentClass = StudentClass::find($request->id);  	
    	$studentClass->delete();
    	return redirect()->route('setups.student.class.view')->with('success','Student Class has been deleted successfully!');
    }
}
