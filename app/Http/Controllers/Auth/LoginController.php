<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        if (Auth::check() && Auth::user()->role_id == 1)
        {
            $this->redirectTo = route('admin.dashboard');
        } elseif(Auth::check() && Auth::user()->role_id == 2)
        {
            $this->redirectTo = route('student.dashboard');
        }

        elseif(Auth::check() && Auth::user()->role_id == 3)
        {
            $this->redirectTo = route('teacher.dashboard');
        }
       
        elseif(Auth::check() && Auth::user()->role_id == 4)
        {
            $this->redirectTo = route('parent.dashboard');
        }
        elseif(Auth::check() && Auth::user()->role_id == 5)
        {
            $this->redirectTo = route('staff.dashboard');
        }
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
  
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
  
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
        {
            return redirect()->route('home');
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }
}
