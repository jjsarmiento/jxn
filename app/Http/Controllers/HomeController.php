<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(){
        return view('home')
            ->with('students', Student::paginate(10));
    }

    public function doAdd(Request $request){
        $this->validate($request, [
            'student_id'    => 'bail|required|min:10|unique:students',
            'name'          => 'required|min:8',
        ]);

        Student::create([
            'student_id' =>  $request->student_id,
            'name'       =>  $request->name,
        ]);

        return redirect()->back();
    }

    public function delete($id){
        Student::where('id', $id)->delete();
        return redirect('/');
    }
}
