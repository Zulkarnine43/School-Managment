<?php

namespace App\Http\Controllers\Student\Payment;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
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
use App\Model\ExamType;


class PaymentController extends Controller
{
    public function index()
    {
        return view('student.payment.payment-view');  
    }
}
