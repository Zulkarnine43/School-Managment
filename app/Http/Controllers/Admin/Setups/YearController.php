<?php

namespace App\Http\Controllers\Admin\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Year;
use Auth;

class YearController extends Controller
{
    public function view()
    {
    	$years = Year::all();
    	return view('admin.setups.year.year-view',compact('years'));
    }

    public function add()
    {    	
    	return view('admin.setups.year.year-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:years,name'
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }

        $years = new Year();
        $years->name = $request->name;
        $years->status = $status;
        $years->created_by = Auth::user()->id;
        $years->save();

        return redirect()->route('setups.student.year.view')->with('success','Student Year has been created successfully!');
    }

    public function edit($id)
    {
    	$years = Year::find($id);
    	return view('admin.setups.year.year-add',compact('years'));
    }

    public function update(Request $request, $id)
    {
        $years = Year::find($id);
        $this->validate($request,[
            'name' => 'required|unique:years,name,'.$years->id
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }
        
        $years->name = $request->name;
        $years->status = $status;
        $years->updated_by = Auth::user()->id;
        $years->save();

        return redirect()->route('setups.student.year.view')->with('success','Student Year has been updated successfully!');
    }

    public function delete(Request $request)
    {
    	$years = Year::find($request->id);  	
    	$years->delete();
    	return redirect()->route('setups.student.year.view')->with('success','Student Year has been deleted successfully!');
    }
}
