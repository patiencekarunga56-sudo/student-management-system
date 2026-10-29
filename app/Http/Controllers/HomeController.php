<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

   public function contact(){

return view('contact');

   }

   public function login(){

    return view('login');

       }

       public function dashboard(){

    return view('student.dashboard');

       }

         public function dashboards(){

    return view('admin.dashboard');

       }
  
}
