<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;

class UserController extends Controller
{
    public function view()
    {
    	$users = User::where('usertype','admin')->get();
        return view('admin.user.user-view',compact('users'));
    }

    public function add()
    {    	
    	return view('admin.user.user-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users,email'
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }
        $code = rand(0000,9999);
        $users = new User();
        $users->usertype = 'admin';
        $users->role = $request->role;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($code);
        $users->code = $code;
        $users->status = $status;
        $users->save();

        return redirect()->route('users.view')->with('success','User has been created successfully!');
    }

    public function edit($id)
    {
    	$users = User::find($id);
    	return view('admin.user.user-edit',compact('users'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required'
        ]);

        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }

        $users = User::find($id);
        $users->role = $request->role;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->status = $status;
        $users->save();

        return redirect()->route('users.view')->with('success','User has been updated successfully!');
    }

    public function delete(Request $request)
    {
    	$users = User::find($request->id);
    	if(file_exists('assets/backend/upload/users/'.$users->image) AND ! empty($users->image))
    	{
    		unlink('assets/backend/upload/users/'.$users->image);
    	}
    	
    	$users->delete();

    	return redirect()->route('users.view')->with('success','User has been deleted successfully!');
    }
}
