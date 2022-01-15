<?php

namespace App\Http\Controllers\Admin\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AssignStudent;
use App\Model\DiscountStudent;
use App\Model\StudentClass;
use App\Model\ExamType;
use App\Model\Year;
use App\Model\Group;
use App\Model\Shift;
use App\Model\School;
use App\Model\FeeCategoryAmount;
use App\Model\User;
use DB;
use PDF;

class ExamFeeController extends Controller
{
    public function view()
    {
    	$data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['examTypes'] = ExamType::all();
    	return view('admin.student.exam_fee.exam-fee-view',$data);
    }

    public function getStudent(Request $request)
    {
    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
    	if($year_id != ''){
    		$where[] = ['year_id','like',$year_id.'%'];
    	}
    	if($class_id != ''){
    		$where[] = ['class_id','like',$class_id.'%'];
    	}
    	$allStudent = AssignStudent::with(['discount'])->where($where)->get();
    	$html['thsource'] = '<th>SL</th>';
    	$html['thsource'] .= '<th>ID No</th>';
    	$html['thsource'] .= '<th>Student Name</th>';
    	$html['thsource'] .= '<th>Roll No</th>';
    	$html['thsource'] .= '<th>Exam Fee</th>';
    	$html['thsource'] .= '<th>Discount Amount</th>';
    	$html['thsource'] .= '<th>Fee (This student)</th>';
    	$html['thsource'] .= '<th>Action</th>';

    	foreach($allStudent as $key => $v){
    		$examFee = FeeCategoryAmount::where('fee_category_id','3')->where('class_id',$v->class_id)->first();
    		$color = 'success';
    		$html[$key]['tdsource'] = '<td>'.($key+1).'</td>';
    		$html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
    		$html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
    		$html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
    		$html[$key]['tdsource'] .= '<td>'.$examFee->amount.' Tk'.'</td>';
    		$html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';

    		$orginalFee = $examFee->amount;
    		$discount = $v['discount']['discount'];
    		$discountAbleFee = $discount/100*$orginalFee;
    		$finalFee = (float)$orginalFee-(float)$discountAbleFee;

    		$html[$key]['tdsource'] .='<td>'.$finalFee.' Tk'.'</td>';
    		$html[$key]['tdsource'] .='<td>';
    		$html[$key]['tdsource'] .=' <a class="btn btn-success btn-sm-'.$color.'" title="Payslip" target="_blank" href="'.route("students.exam.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&exam_type_id='.$request->exam_type_id.'">Fee Slip</a> ';
    		$html[$key]['tdsource'] .='</td>';
    	}
    	return response()->json(@$html);
    }

    public function feePayslip(Request $request)
    {
    	$student_id = $request->student_id;
    	$class_id = $request->class_id;
    	$data['details'] = AssignStudent::with(['discount','Student'])->where('student_id',$student_id)->where('class_id',$class_id)->first();
    	$data['schools'] = School::where('status','1')->first();
        $data['exam_name'] = ExamType::where('id',$request->exam_type_id)->first()['name'];
    	$pdf = PDF::loadView('admin.student.exam_fee.pdf.exam-fee-payslip',$data);
    	$pdf->SetProtection(['copy','print'],'','pass');
    	return $pdf->stream('document.pdf');
    }
}
