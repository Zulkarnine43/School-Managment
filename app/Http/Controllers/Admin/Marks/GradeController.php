<?php

namespace App\Http\Controllers\Admin\Marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\MarksGrade;

class GradeController extends Controller
{
    public function view(){
    $data['allData'] = MarksGrade::all();
    return view('admin.marks.grade-marks-view',$data);
  }

    public function add(){
      return view('admin.marks.grade-marks-add');
    }

    public function store(Request $request){
      $data = new MarksGrade();
      $data->grade_name = $request->grade_name;
      $data->grade_point = $request->grade_point;
      $data->start_marks = $request->start_marks;
      $data->end_marks = $request->end_marks;
      $data->start_point = $request->start_point;
      $data->end_point = $request->end_point;
      $data->remarks = $request->remarks;
      $data->save();
      return redirect()->route('marks.grade.view')->with('success','Data Saved successfully!');
    }

    public function edit($id){
      $data['editData'] = MarksGrade::find($id);
      return view('admin.marks.grade-marks-add',$data);
    }

    public function update(Request $request,$id){
      $data = MarksGrade::find($id);
      $data->grade_name = $request->grade_name;
      $data->grade_point = $request->grade_point;
      $data->start_marks = $request->start_marks;
      $data->end_marks = $request->end_marks;
      $data->start_point = $request->start_point;
      $data->end_point = $request->end_point;
      $data->remarks = $request->remarks;
      $data->save();
      return redirect()->route('marks.grade.view')->with('success','Data Updated successfully!');
    }
}
