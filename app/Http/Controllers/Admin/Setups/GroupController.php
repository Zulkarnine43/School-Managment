<?php

namespace App\Http\Controllers\Admin\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Group;
use Auth;

class GroupController extends Controller
{
    public function view()
    {
    	$groups = Group::all();
    	return view('admin.setups.group.group-view',compact('groups'));
    }

    public function add()
    {    	
    	return view('admin.setups.group.group-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:groups,name'
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }

        $groups = new Group();
        $groups->name = $request->name;
        $groups->status = $status;
        $groups->created_by = Auth::user()->id;
        $groups->save();

        return redirect()->route('setups.student.group.view')->with('success','Student Group has been created successfully!');
    }

    public function edit($id)
    {
    	$groups = Group::find($id);
    	return view('admin.setups.group.group-add',compact('groups'));
    }

    public function update(Request $request, $id)
    {
        $groups = Group::find($id);
        $this->validate($request,[
            'name' => 'required|unique:groups,name,'.$groups->id
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }
        
        $groups->name = $request->name;
        $groups->status = $status;
        $groups->updated_by = Auth::user()->id;
        $groups->save();

        return redirect()->route('setups.student.group.view')->with('success','Student Group has been updated successfully!');
    }

    public function delete(Request $request)
    {
    	$groups = Group::find($request->id);  	
    	$groups->delete();
    	return redirect()->route('setups.student.group.view')->with('success','Student Group has been deleted successfully!');
    }
}
