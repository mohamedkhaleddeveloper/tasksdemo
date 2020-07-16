<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
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
        app()->setLocale(Auth::user()->lang);
        return view('welcome');
    }

    public function updateUserlang()
    {      
        $user_id = Auth::id();
        $user = user::where('id',$user_id)->first();
        if( $user->lang == 'ar'){
            $lang = 'en';
        }else{
            $lang = 'ar';
        }
        $user->lang = $lang;
        $user->save();
       

        return redirect()->back();
       
    }
}
