<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


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

      $this -> deleteImg();

      $image = $request -> file('icon');

      $ext = $image -> getClientOriginalExtension();
      $name = rand(100000,999999). '_' . time();
      $file = $name . '.'. $ext;

      $user = Auth::user();
      $user -> icon = $file;
      $user -> save();

      $fileStore = $image -> storeAs('icon', $file ,'public');

      // dd($image,$name,$file,$user);

      return redirect() -> back();

    }

    public function clearImg() {

      $this -> deleteImg();

      $user = Auth::user();
      $user -> icon = null;
      $user -> save();

      return redirect() -> back();

    }
    public function deleteImg() {

      $user = Auth::user();

      try {

        $fileName = $user -> icon;

        $file = storage_path('app/public/icon/' . $fileName);
        File::delete($file);

      } catch (\Exception $e) {}
    }
}
