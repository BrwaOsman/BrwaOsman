<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\test;
use Carbon\Carbon;
use App\Models\doctor;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tests = test::all();
      return view('allCategory.allcategory', ['tests'=>$tests]);
    }
 public function home()
 { $date = Carbon::now ();
  $tests = test::all();
  $doctor = doctor::all();

  // return(dd( ));
  return view('home',['test'=>$tests, 'doctor'=>$doctor,'date'=>$date] );
  
 }
    public function AllTest()
    {
        $tests = test::all();
      return view('allCategory.allTest', ['tests'=>$tests]);
    }
}
