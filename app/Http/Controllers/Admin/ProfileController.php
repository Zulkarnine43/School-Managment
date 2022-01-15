<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\User;

class ProfileController extends Controller
{
    public function view()
    {
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	return view('admin.user.profile.profile-view',compact('user'));
    }

    public function edit()
    {
    	$id = Auth::user()->id;
    	$users = User::find($id);
    	return view('admin.user.profile.profile-edit',compact('users'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required'
        ]);

        $data = User::find(Auth::user()->id);        
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;

        if($request->file('image'))
        {
        	$file = $request->file('image');
        	@unlink(public_path('assets/backend/upload/users/' .$data->image));
        	$filename = date('YmdHi').$file->getClientOriginalName();
        	$file->move(public_path('assets/backend/upload/users'),$filename);
        	$data['image'] = $filename;
        }

        $data->save();

        return redirect()->route('profiles.view')->with('success','Profile has been updated successfully!');
    }

    public function passwordView()
    {
    	return view('admin.user.profile.password-edit');
    }

    public function passwordUpdate(Request $request)
    {
    	if(Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->current_password]))
    	{
    		$user = User::find(Auth::user()->id);
    		$user->password = bcrypt($request->new_password);
    		$user->save();

    		return redirect()->route('profiles.view')->with('success','Your password has been successfully change!');
    	}
    	else
    	{
    		return redirect()->back()->with('error','Sorry! your current password does not match!');
    	}
    }
}
