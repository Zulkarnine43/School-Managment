<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    
    public function index()
    {
        
        return view('teacher.info.info-view');
    }
}
