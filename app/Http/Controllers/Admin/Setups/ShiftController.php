<?php

namespace App\Http\Controllers\Admin\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Shift;
use Auth;

class ShiftController extends Controller
{
    public function view()
    {
    	$shifts = Shift::all();
    	return view('admin.setups.shift.shift-view',compact('shifts'));
    }

    public function add()
    {    	
    	return view('admin.setups.shift.shift-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:shifts,name'
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }

        $shifts = new Shift();
        $shifts->name = $request->name;
        $shifts->status = $status;
        $shifts->created_by = Auth::user()->id;
        $shifts->save();

        return redirect()->route('setups.student.shift.view')->with('success','Student Shift has been created successfully!');
    }

    public function edit($id)
    {
    	$shifts = Shift::find($id);
    	return view('admin.setups.shift.shift-add',compact('shifts'));
    }

    public function update(Request $request, $id)
    {
        $shifts = Shift::find($id);
        $this->validate($request,[
            'name' => 'required|unique:shifts,name,'.$shifts->id
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }
        
        $shifts->name = $request->name;
        $shifts->status = $status;
        $shifts->updated_by = Auth::user()->id;
        $shifts->save();

        return redirect()->route('setups.student.shift.view')->with('success','Student Shift has been updated successfully!');
    }

    public function delete(Request $request)
    {
    	$shifts = Shift::find($request->id);  	
    	$shifts->delete();
    	return redirect()->route('setups.student.shift.view')->with('success','Student Shift has been deleted successfully!');
    }
}
