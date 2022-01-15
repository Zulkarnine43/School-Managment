<?php

namespace App\Http\Controllers\Admin\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ExamType;
use Auth;

class ExamTypeController extends Controller
{
    public function view()
    {
    	$examTypes = ExamType::all();
    	return view('admin.setups.exam_type.exam-type-view',compact('examTypes'));
    }

    public function add()
    {    	
    	return view('admin.setups.exam_type.exam-type-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:exam_types,name'
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }

        $examTypes = new ExamType();
        $examTypes->name = $request->name;
        $examTypes->status = $status;
        $examTypes->created_by = Auth::user()->id;
        $examTypes->save();

        return redirect()->route('setups.exam.type.view')->with('success','Exam Type has been created successfully!');
    }

    public function edit($id)
    {
    	$examTypes = ExamType::find($id);
    	return view('admin.setups.exam_type.exam-type-add',compact('examTypes'));
    }

    public function update(Request $request, $id)
    {
        $examTypes = ExamType::find($id);
        $this->validate($request,[
            'name' => 'required|unique:exam_types,name,'.$examTypes->id
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }
        
        $examTypes->name = $request->name;
        $examTypes->status = $status;
        $examTypes->updated_by = Auth::user()->id;
        $examTypes->save();

        return redirect()->route('setups.exam.type.view')->with('success','Exam Type has been updated successfully!');
    }

    public function delete(Request $request)
    {
    	$examTypes = ExamType::find($request->id);  	
    	$examTypes->delete();
    	return redirect()->route('setups.exam.type.view')->with('success','Exam Type has been deleted successfully!');
    }
}
