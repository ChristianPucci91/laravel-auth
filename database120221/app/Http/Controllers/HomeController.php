<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('home');
    }
    public function updateImg(Request $request) {

      $request -> validate([
         'icon' => 'required|file'
      ]);

      $image = $request -> file('icon');

      $ext = $image -> getClientOriginalExtension();
      $name = rand(100000,999999). '_' . time();
      $file = $name . '.'. $ext;

      $user = Auth::user();
      $user -> icon = $file;
      $user -> save();

      $file = $image -> storeAs('icon', $file ,'public');

    }
}
