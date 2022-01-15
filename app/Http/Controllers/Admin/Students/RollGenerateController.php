<?php

namespace App\Http\Controllers\Admin\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AssignStudent;
use App\Model\DiscountStudent;
use App\Model\StudentClass;
use App\Model\Year;
use App\Model\Group;
use App\Model\Shift;
use App\Model\School;
use App\Model\User;
use DB;
use PDF;

class RollGenerateController extends Controller
{
    public function view()
    {
    	$data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = StudentClass::all();
    	return view('admin.student.roll_generate.roll-generate-view',$data);
    }

    public function getStudent(Request $request)
    {
    	$allData = AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
    	return response()->json($allData);
    }

    public function store(Request $request)
    {
    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
    	if($request->student_id != NULL)
    	{
    		for($i=0; $i < count($request->student_id); $i++)
    		{
    			AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update(['roll' => $request->roll[$i]]);
    		}
    	}
    	else
    	{
    		return redirect()->back()->with('error','Sorry! There are no student');
    	}
    	return redirect()->route('students.roll.view')->with('success','Roll generate has been created successfully!');
    } 
}
