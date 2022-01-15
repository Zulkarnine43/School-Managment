<?php

namespace App\Http\Controllers\Admin\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClass;
use App\Model\Subject;
use App\Model\AssignSubject;
use Auth;

class AssignSubjectController extends Controller
{
    public function view()
    {
    	$assignSubjects = AssignSubject::select('class_id')->groupBy('class_id')->get();
    	return view('admin.setups.assign_subject.assign-subject-view',compact('assignSubjects'));
    }

    public function add()
    {    	
    	$classes = StudentClass::all();
    	$subjects = Subject::all();
    	return view('admin.setups.assign_subject.assign-subject-add',compact('classes','subjects'));
    }

    public function store(Request $request)
    {
        $countSubject = count($request->subject_id);
        if($countSubject != NULL)
        {
            for ($i=0; $i < $countSubject; $i++) { 
                $assignSubjects = new AssignSubject();
                $assignSubjects->subject_id = $request->subject_id[$i];
                $assignSubjects->class_id = $request->class_id;
                $assignSubjects->full_mark = $request->full_mark[$i];
                $assignSubjects->pass_mark = $request->pass_mark[$i];
                $assignSubjects->subjective_mark = $request->subjective_mark[$i];
                $assignSubjects->created_by = Auth::user()->id;
                $assignSubjects->save();
            }
        }
        return redirect()->route('setups.assign.subject.view')->with('success','Assign Subject has been created successfully!');
    }

    public function edit($class_id)
    {
    	$assignSubjects = AssignSubject::where('class_id',$class_id)->orderBy('class_id','ASC')->get();
    	$classes = StudentClass::all();
    	$subjects = Subject::all();
    	return view('admin.setups.assign_subject.assign-subject-edit',compact('assignSubjects','classes','subjects'));
    }

    public function update(Request $request, $class_id){
        if($request->subject_id == NULL) {
            return redirect()->back()->with('error','Sorry! You do not select any items!');
        }else{
            AssignSubject::whereNotIn('subject_id',$request->subject_id)->where('class_id',$request->class_id)->delete();
            foreach ($request->subject_id as $key => $value) {
                $assign_subject_exist = AssignSubject::where('subject_id',$request->subject_id[$key])->where('class_id',$request->class_id)->first();
                if($assign_subject_exist){
                    $assignSubjects = $assign_subject_exist;
                }else{
                    $assignSubjects = new AssignSubject();
                }
                $assignSubjects->class_id = $request->class_id;
                $assignSubjects->subject_id = $request->subject_id[$key];
                $assignSubjects->full_mark = $request->full_mark[$key];
                $assignSubjects->pass_mark = $request->pass_mark[$key];
                $assignSubjects->subjective_mark = $request->subjective_mark[$key];
                $assignSubjects->updated_by = Auth::user()->id;
                $assignSubjects->save();
            }            
        }
        return redirect()->route('setups.assign.subject.view')->with('success','Assign Subject has been updated successfully!');
    }

    public function details($class_id)
    {
    	$assignSubjects = AssignSubject::where('class_id',$class_id)->orderBy('class_id','ASC')->get();
        return view('admin.setups.assign_subject.assign-subject-details',compact('assignSubjects'));
    }
}
