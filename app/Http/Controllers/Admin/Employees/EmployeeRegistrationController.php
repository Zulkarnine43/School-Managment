<?php

namespace App\Http\Controllers\Admin\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\EmployeeSalaryLog;
use App\Model\Designation;
use App\Model\School;
use App\Model\User;
use DB;
use PDF;

class EmployeeRegistrationController extends Controller
{
    public function view()
    {
    	$data['allData'] = User::where('usertype','employee')->get();
    	return view('admin.employees.registration.employee-view',$data);
    }

    public function add()
    {    	
        $data['designations'] = Designation::all();
        return view('admin.employees.registration.employee-add',$data);
    }
    public function store(Request $request)
    {
        DB::transaction(function() use($request){
            $checkYear = date('Ym',strtotime($request->join_date));
            $employee = User::where('usertype','employee')->orderBy('id','DESC')->first();
            if($employee == NULL){
                $firstReg = 0;
                $employeeId = $firstReg+1;
                if($employeeId < 10){
                    $id_no = '000'.$employeeId;
                }elseif($employeeId < 100){
                    $id_no = '00'.$employeeId;
                }elseif($employeeId < 1000){
                    $id_no = '0'.$employeeId;
                }
            }else{
                $employee = User::where('usertype','employee')->orderBy('id','DESC')->first()->id;
                $employeeId = $employee+1;
                if($employeeId < 10){
                    $id_no = '000'.$employeeId;
                }elseif($employeeId < 100){
                    $id_no = '00'.$employeeId;
                }elseif($employeeId < 1000){
                    $id_no = '0'.$employeeId;
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
            $user->usertype = 'employee';
            $user->id_no = $final_id_no;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->designation_id = $request->designation_id;
            $user->salary = $request->salary;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->join_date = date('Y-m-d',strtotime($request->join_date));
            $user->password = bcrypt($code);
            $user->code = $code;
            $user->role_id = 3;
            $rest = substr($request->name, -2); 
            $user->username = $rest.$id_no;


            $user->status = $status;
            
            $pname=$request->name;
       
            $to = $request->mobile;
    
            $token = "143effd9cab6f8fadbc84d4690cb02ae";
            $message =  "Dear Teacher $pname. Your Username: $rest$id_no and Password: $code . Please Login ABC School" ;
    
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
    



            if($request->file('image')){
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('assets/backend/upload/employees'),$filename);
                $user['image'] = $filename;
            }
            $user->save();
            $employeeSalaryLogs = new EmployeeSalaryLog();
            $employeeSalaryLogs->employee_id = $user->id;
            $employeeSalaryLogs->previous_salary = $request->salary;
            $employeeSalaryLogs->present_salary = $request->salary;
            $employeeSalaryLogs->increment_salary = '0';
            $employeeSalaryLogs->effected_date = date('Y-m-d',strtotime($request->join_date));
            $employeeSalaryLogs->save();
        });
        return redirect()->route('employees.registration.view')->with('success','Employee Registration has been created successfully!');
    }

    public function edit($id)
    {
    	$data['editData'] = User::find($id);
        $data['designations'] = Designation::all();
        return view('admin.employees.registration.employee-add',$data);
    }

    public function update(Request $request, $id)
    {
        if(empty($request['status'])){
            $status='0';
        }else{
            $status='1';
        }
        $user = User::find($id);
        $user->name = $request->name;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->designation_id = $request->designation_id;
        $user->dob = date('Y-m-d',strtotime($request->dob));
        $user->status = $status;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('assets/backend/upload/employees/' .$user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('assets/backend/upload/employees'),$filename);
            $user['image'] = $filename;
        }
        $user->save();
        return redirect()->route('employees.registration.view')->with('success','Employee Registration has been updated successfully!');
    }    

    public function details($id) 
    {
        $data['details'] = User::find($id);
        $data['schools'] = School::where('status','1')->first();
        $pdf = PDF::loadView('admin.employees.registration.pdf.employee-details', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
