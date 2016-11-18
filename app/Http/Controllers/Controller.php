<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        $this->middleware('GuestJXN');
    }

    public function index(){
        return view('index')
            ->with('students', Student::paginate(10));
    }

    public function doLogin(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me)){
            return redirect()->intended('/');
            /**
             * The intended method on the redirector will redirect the user to the URL they were attempting to access before being intercepted
             * by the authentication middleware. A fallback URI may be given to this method in case the intended destination is not available.
            */
        }else{
            return 'INVALID LOGIN';
        }
    }

    public function doRegister(Request $request){
        $this->validate($request, [
            'email'         => 'bail|required|unique:users',
            'name'          => 'required|min:8|unique:users',
            'password'      => 'required|min:8',
        ]);

        \App\User::create([
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'password'  =>  Hash::make($request->password),
        ]);

        return redirect('/');
    }
}
