<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\assignment;
use Auth;


class InfoController extends Controller
{
    public function index()
    {
        return view('student.info.info-view');
    }
    public function add()
    {    	
    	return view('student.info.info-add');
    }

    public function store(Request $request)
    {
       
        // DB::table('assignments')->insert([
           
        //     'subject_name' => $request->subject_name,
            
        // ]);

        $subjects = new assignment;
        
        $subjects->subject_name = $request->subject_name;
        // $subjects->assignment = $request->assignment;
         $subjects->user_id = Auth::user()->id;
        // return $subjects;

        $image = $request->file('image');
        $slug = Str::slug($request->subject_name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/assignment'))
            {
                mkdir('uploads/assignment',0777,true);
            }
            $image->move('uploads/assignment',$imagename);
        }else{
            $imagename = "default.png";
        }

        $subjects->image = $imagename;

        $subjects->save();
        return redirect()->route('home')->with('success','Assignment has been created successfully!');
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
