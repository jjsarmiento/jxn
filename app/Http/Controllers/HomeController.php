<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(){
        return view('home');
    }
}
