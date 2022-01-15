<?php

namespace App\Http\Controllers\Admin;

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
use App\Model\StudentMarks;
use App\Model\AssignSubject;

class DefaultController extends Controller
{
    public function getStudent(Request $request){
    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
    	$allData = AssignStudent::with(['student'])->where('year_id',$year_id)->where('class_id',$class_id)->get();
    	return response()->json($allData);
    }

    public function getSubject(Request $request){
    	$class_id = $request->class_id;
    	$allData = AssignSubject::with(['subject'])->where('class_id',$class_id)->get();
    	return response()->json($allData);
    }
}
