<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\School;

class SchoolController extends Controller
{
    public function view()
    {
    	$schools = School::all();
    	return view('admin.settings.school.school-view',compact('schools'));
    }

    public function add()
    {    	
    	return view('admin.settings.school.school-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:schools,name'
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }

        $schools = new School();
        $schools->name = $request->name;
        $schools->address = $request->address;
        $schools->phone = $request->phone;
        $schools->mobile = $request->mobile;
        $schools->email = $request->email;
        $schools->website = $request->website;
        $schools->status = $status;
        if($request->file('image'))
        {
        	$file = $request->file('image');
        	$filename = date('YmdHi').$file->getClientOriginalName();
        	$file->move(public_path('assets/backend/upload/schools'),$filename);
        	$schools['image'] = $filename;
        }
        $schools->save();

        return redirect()->route('settings.school.view')->with('success','School has been created successfully!');
    }

    public function edit($id)
    {
    	$schools = School::find($id);
    	return view('admin.settings.school.school-add',compact('schools'));
    }

    public function update(Request $request, $id)
    {
        $schools = School::find($id);
        $this->validate($request,[
            'name' => 'required|unique:schools,name,'.$schools->id
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }
        
        $schools->name = $request->name;
        $schools->address = $request->address;
        $schools->phone = $request->phone;
        $schools->mobile = $request->mobile;
        $schools->email = $request->email;
        $schools->website = $request->website;
        $schools->status = $status;        
        if($request->file('image'))
        {
        	$file = $request->file('image');
        	@unlink(public_path('assets/backend/upload/schools/' .$schools->image));
        	$filename = date('YmdHi').$file->getClientOriginalName();
        	$file->move(public_path('assets/backend/upload/schools'),$filename);
        	$schools['image'] = $filename;
        }
        $schools->save();

        return redirect()->route('settings.school.view')->with('success','School has been updated successfully!');
    }

    public function delete(Request $request)
    {
    	$schools = School::find($request->id);
    	if(file_exists('assets/backend/upload/schools/' . $schools->image) AND ! empty($schools->image))
    	{
    		unlink('assets/backend/upload/schools/' . $schools->image);
    	}
    	
    	$schools->delete();

    	return redirect()->route('settings.school.view')->with('success','School has been deleted successfully!');
    }
}
