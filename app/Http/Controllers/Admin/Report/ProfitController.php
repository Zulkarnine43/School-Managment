<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AccountEmployeeSalary;
use App\Model\AccountOtherCost;
use App\Model\AccountStudentFee;
use PDF;
use App\Model\StudentMarks;
use App\Model\ExamType;
use App\Model\StudentClass;
use App\Model\Year;
use App\Model\MarksGrade;
use App\Model\User;
use App\Model\EmployeeAttendance;
use App\Model\AssignStudent;

class ProfitController extends Controller
{
    public function view(){
      return view('admin.report.porfit-view');
    }

  	public function profit(Request $request){
      $start_date = date('Y-m',strtotime($request->start_date));
      $end_date = date('Y-m',strtotime($request->end_date));
      $sdate = date('Y-m-d',strtotime($request->start_date));
      $edate = date('Y-m-d',strtotime($request->end_date));
      $student_fee = AccountStudentFee::whereBetween('date',[$start_date, $end_date])->sum('amount');
      $other_cost = AccountOtherCost::whereBetween('date',[$sdate,$edate])->sum('amount');
      $emp_salary = AccountEmployeeSalary::whereBetween('date',[$start_date, $end_date])->sum('amount');
      $total_cost = $other_cost+$emp_salary;
      $profit = $student_fee-$total_cost;
      $html['thsource']  = '<th>Students Fee</th>';
      $html['thsource'] .= '<th>Other Cost</th>';
      $html['thsource'] .= '<th>Employee Salary</th>';
      $html['thsource'] .= '<th>Total Cost</th>';
      $html['thsource'] .= '<th>Profit</th>';
      $html['thsource'] .= '<th>Action</th>';
      $color = 'success';
      $html['tdsource']   ='<td>'.$student_fee.'</td>';
      $html['tdsource']  .='<td>'.$other_cost.'</td>';
      $html['tdsource']  .='<td>'.$emp_salary.'</td>';
      $html['tdsource']  .='<td>'.$total_cost.'</td>';
      $html['tdsource']  .='<td>'.$profit.'</td>';
      $html['tdsource'] .='<td>';
      $html['tdsource'] .=' <a class="btn btn-sm btn-'.$color.'" title="PDF" target="_blank" href="'.route("reports.profit.pdf").'?start_date='.$sdate.'&end_date='.$edate.'"><i class="fa fa-file"></i></a> ';
      $html['tdsource'] .='</td>';

      return response()->json(@$html);
  }

  public function pdf(Request $request){
      $data['sdate'] = date('Y-m',strtotime($request->start_date));
      $data['edate'] = date('Y-m',strtotime($request->end_date));
      $data['start_date'] = date('Y-m-d',strtotime($request->start_date));
      $data['end_date'] = date('Y-m-d',strtotime($request->end_date));
      $pdf = PDF::loadView('admin.report.pdf.montly-profit-pdf', $data);
      $pdf->SetProtection(['copy', 'print'], '', 'pass');
      return $pdf->stream('document.pdf');
  }

  public function markSheetView(){
    $data['years'] = Year::orderBy('id','DESC')->get();
    $data['classes'] = StudentClass::all();
    $data['exam_types'] = ExamType::all();
    return view('admin.report.marksheet-view',$data);
  }

  public function markSheetGet(Request $request){
      $year_id = $request->year_id;
      $class_id = $request->class_id;
      $exam_type_id = $request->exam_type_id;
      $id_no = $request->id_no;
      $count_fail = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->where('marks','<','33')->get()->count();
      // dd($count_fail);
      $singleStudent = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->first();
      if($singleStudent == true){
          $allMarks = StudentMarks::with(['assign_subject','year'])->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->get();
          // dd($allMarks->toArray());
          $allGreades = MarksGrade::all();
          return view('admin.report.pdf.marksheet-pdf', compact('allMarks','allGreades','count_fail'));
      }else{
          return redirect()->back()->with('error','Sorry! These criteria does not match!');
      }
  }

  public function attendanceView()
  {
    $data['employees'] = User::where('usertype','employee')->get();
    return view('admin.report.attendance-view',$data);
  }

  public function attendanceGet(Request $request)
  {
    $employee_id = $request->employee_id;
    if($employee_id !=''){
        $where[] = ['employee_id',$employee_id];
    }
    $date = date('Y-m', strtotime($request->date));
    if($date !=''){
        $where[] = ['date','like',$date.'%'];
    }
    $singleAttendance = EmployeeAttendance::with(['user'])->where($where)->first();
    if($singleAttendance == true){
      $data['allData'] = EmployeeAttendance::with(['user'])->where($where)->get();
      // dd($data['allData']->toArray());
      $data['absents'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status','Absent')->get()->count();
      $data['leaves'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status','Leave')->get()->count();
      $data['month'] = date('M Y', strtotime($request->date));
      $pdf = PDF::loadView('admin.report.pdf.attendance-pdf', $data);
      $pdf->SetProtection(['copy', 'print'], '', 'pass');
      return $pdf->stream('document.pdf');
    }else{
        return redirect()->back()->with('error','Sorry! These criteria does not match!');
    }
  }

  public function resultView(){
    $data['years'] = Year::orderBy('id','DESC')->get();
    $data['classes'] = StudentClass::all();
    $data['exam_types'] = ExamType::all();
    return view('admin.report.result-view',$data);
  }

  public function resultGet(Request $request){
    $year_id = $request->year_id;
    $class_id = $request->class_id;
    $exam_type_id = $request->exam_type_id;
    $singleResult = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->first();
    if($singleResult == true){
        $data['allData'] = StudentMarks::select('year_id','class_id','exam_type_id','student_id')->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->groupBy('year_id')->groupBy('class_id')->groupBy('exam_type_id')->groupBy('student_id')->get();
        // dd($data['allData']->toArray());
        $pdf = PDF::loadView('admin.report.pdf.result-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }else{
        return redirect()->back()->with('error','Sorry! These criteria does not match!');
    }
  }

  public function idCardView(){
    $data['years'] = Year::orderBy('id','DESC')->get();
    $data['classes'] = StudentClass::all();
    return view('admin.report.id-card-view',$data);
  }

  public function idCardGet(Request $request){
    $year_id = $request->year_id;
    $class_id = $request->class_id;
    $check_data = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->first();
    if($check_data == true){
        $data['allData'] = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->get();
        // dd($data['allData']->toArray());
        $pdf = PDF::loadView('admin.report.pdf.id-card-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }else{
        return redirect()->back()->with('error','Sorry! These criteria does not match!');
    }
  }
}
