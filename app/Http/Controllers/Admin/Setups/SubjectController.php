<?php

namespace App\Http\Controllers\Admin\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Subject;
use Auth;

class SubjectController extends Controller
{
    public function view()
    {
    	$subjects = Subject::all();
    	return view('admin.setups.subject.subject-view',compact('subjects'));
    }

    public function add()
    {    	
    	return view('admin.setups.subject.subject-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:subjects,name'
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }

        $subjects = new Subject();
        $subjects->name = $request->name;
        $subjects->status = $status;
        $subjects->created_by = Auth::user()->id;
        $subjects->save();

        return redirect()->route('setups.subject.view')->with('success','Subject has been created successfully!');
    }

    public function edit($id)
    {
    	$subjects = Subject::find($id);
    	return view('admin.setups.subject.subject-add',compact('subjects'));
    }

    public function update(Request $request, $id)
    {
        $subjects = Subject::find($id);
        $this->validate($request,[
            'name' => 'required|unique:subjects,name,'.$subjects->id
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }
        
        $subjects->name = $request->name;
        $subjects->status = $status;
        $subjects->updated_by = Auth::user()->id;
        $subjects->save();

        return redirect()->route('setups.subject.view')->with('success','Subject has been updated successfully!');
    }

    public function delete(Request $request)
    {
    	$subjects = Subject::find($request->id);  	
    	$subjects->delete();
    	return redirect()->route('setups.subject.view')->with('success','Subject has been deleted successfully!');
    }
}
