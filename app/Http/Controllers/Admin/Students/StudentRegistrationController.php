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
use Hashids\Hashids;
use DB;
use PDF;

class StudentRegistrationController extends Controller
{
    public function view()
    {
    	$data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['year_id'] = Year::orderBy('id','DESC')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id','ASC')->first()->id;
        $data['allData'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();
    	return view('admin.student.registration.student-view',$data);
    }

    public function add()
    {    	
        $data['years'] = Year::orderBy('id','DESC')->get();
        $data['groups'] = Group::all();
        $data['shifts'] = Shift::all();
        $data['classes'] = StudentClass::all();
        return view('admin.student.registration.student-add',$data);
    }
    public function store(Request $request)
    {
       

        DB::transaction(function() use($request){
            $checkYear = Year::find($request->year_id)->name;
            $student = User::where('usertype','student')->orderBy('id','DESC')->first();
            if($student == NULL){
                $firstReg = 0;
                $studentId = $firstReg+1;
                if($studentId < 10){
                    $id_no = '000'.$studentId;
                }elseif($studentId < 100){
                    $id_no = '00'.$studentId;
                }elseif($studentId < 1000){
                    $id_no = '0'.$studentId;
                }
            }else{
                $student = User::where('usertype','student')->orderBy('id','DESC')->first()->id;
                $studentId = $student+1;
                if($studentId < 10){
                    $id_no = '000'.$studentId;
                }elseif($studentId < 100){
                    $id_no = '00'.$studentId;
                }elseif($studentId < 1000){
                    $id_no = '0'.$studentId;
                }
            }
            if(empty($request['status'])){
                $status='0';
            }else{
                $status='1';
            }
            $final_id_no = $checkYear.$id_no;
            $code = rand(0000,9999);
            $user = new User();
            $user->usertype = 'student';
            $user->id_no = $final_id_no;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->password = bcrypt($code);
            //$user->password = bcrypt($request->mobile);
            $user->code = $code;
            $user->role_id = 2;
           
           
            $rest = substr($request->name, -2); 
            $user->username = $rest.$id_no;
            $user->status = $status;
            if($request->file('image')){
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('assets/backend/upload/students'),$filename);
                $user['image'] = $filename;
            }
            $pname=$request->name;
       
            $to = $request->mobile;
    
            $token = "143effd9cab6f8fadbc84d4690cb02ae";
            $message =  "Dear Student $pname. Your Username: $rest$id_no and Password: $code . Please Login ABC School" ;
    
            $url = "http://api.smscpanel.net/api.php";
    
            $data= array(
            'to'=>"$to",
            'message'=>"$message",
            'token'=>"$token"
            ); // Add parameters in key value
            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_ENCODING, '');
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $smsresult = curl_exec($ch);
            //Result
            echo $smsresult;
            //Error Display
            echo curl_error($ch);
    
    

            $user->save();
            $assignStudent = new AssignStudent();
            $assignStudent->student_id = $user->id;
            $assignStudent->year_id = $request->year_id;
            $assignStudent->class_id = $request->class_id;
            $assignStudent->group_id = $request->group_id;
            $assignStudent->shift_id = $request->shift_id;
            $assignStudent->save();
            $discountStudent = new DiscountStudent();
            $discountStudent->assign_student_id = $assignStudent->id;
            $discountStudent->fee_category_id = '1';
            $discountStudent->discount = $request->discount;
            $discountStudent->save();
        });

      
        return redirect()->route('students.registration.view')->with('success','Student Registration has been created successfully!');
    }

    public function edit($student_id)
    {
    	$data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        $data['years'] = Year::orderBy('id','DESC')->get();
        $data['groups'] = Group::all();
        $data['shifts'] = Shift::all();
        $data['classes'] = StudentClass::all();
        return view('admin.student.registration.student-add',$data);
    }

    public function update(Request $request, $student_id)
    {
        DB::transaction(function() use($request, $student_id){
            if(empty($request['status'])){
                $status='0';
            }else{
                $status='1';
            }
            $user = User::where('id',$student_id)->first();
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->status = $status;
            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('assets/backend/upload/students/' .$user->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('assets/backend/upload/students'),$filename);
                $user['image'] = $filename;
            }
            $user->save();
            $assignStudent = AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();
            $assignStudent->year_id = $request->year_id;
            $assignStudent->class_id = $request->class_id;
            $assignStudent->group_id = $request->group_id;
            $assignStudent->shift_id = $request->shift_id;
            $assignStudent->save();
            $discountStudent = DiscountStudent::where('assign_student_id',$request->id)->first();
            $discountStudent->discount = $request->discount;
            $discountStudent->save();
        });       

        return redirect()->route('students.registration.view')->with('success','Student Registration has been updated successfully!');
    }

    public function yearClassWise(Request $request)
    {
    	$data['years'] = Year::orderBy('id','DESC')->get();
        $data['classes'] = StudentClass::all();
        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;
        $data['allData'] = AssignStudent::where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
        return view('admin.student.registration.student-view',$data);
    }

    public function promotion($student_id)
    {
        $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        $data['years'] = Year::orderBy('id','DESC')->get();
        $data['groups'] = Group::all();
        $data['shifts'] = Shift::all();
        $data['classes'] = StudentClass::all();
        return view('admin.student.registration.student-promotion',$data);
    }

    public function promotionStore(Request $request, $student_id)
    {
        DB::transaction(function() use($request, $student_id){
            if(empty($request['status'])){
                $status='0';
            }else{
                $status='1';
            }
            $user = User::where('id',$student_id)->first();
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->status = $status;
            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('assets/backend/upload/students/' .$user->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('assets/backend/upload/students'),$filename);
                $user['image'] = $filename;
            }
            $user->save();
            $assignStudent = new AssignStudent();
            $assignStudent->student_id = $student_id;
            $assignStudent->year_id = $request->year_id;
            $assignStudent->class_id = $request->class_id;
            $assignStudent->group_id = $request->group_id;
            $assignStudent->shift_id = $request->shift_id;
            $assignStudent->save();
            $discountStudent = new DiscountStudent();
            $discountStudent->assign_student_id = $assignStudent->id;
            $discountStudent->fee_category_id = '1';
            $discountStudent->discount = $request->discount;
            $discountStudent->save();
        });       

        return redirect()->route('students.registration.view')->with('success','Student Promotion has been updated successfully!');
    }

    function details($student_id) 
    {
        $data['details'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        $data['schools'] = School::where('status','1')->first();
        $pdf = PDF::loadView('admin.student.registration.pdf.student-details', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
