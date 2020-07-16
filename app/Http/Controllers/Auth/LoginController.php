<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     //Show Login Form

     public function login($lang = "ar")
     {
        return view('auth.login');
     }
 
     public function loginp(Request $request)
     {
         $messsages = array(
            'email.required'=> __('You cant leave E_mail field empty'),
            'email.email'=> __('The email must be a valid email address'),
            'password.required'=>__('You cant leave Password field empty'),
            'password.min'=>__('You cant leave Password field empty'),
         );
 
         $validator = Validator::make($request->all(), [
             'email'=>'required|email',
             'password'=>'required|min:8'
         ],
             $messsages
         );
         if ($validator->fails()){
             return response()->json(['errors'=>$validator->errors()->first()]);
         }else{
             try 
             {
                 if(Auth::guard('web')->attempt(['email'=>$request->email, 'password'=> $request->password], $request->remember))
                 {
                     return response()->json(['success'=> redirect()->intended(route('home')),'message'=> __('successfully logged in Redirecting...')]);
                     //return response()->json(['message'=>'The login sucsses.']);
                 }else{
                     return response()->json(['errors'=>__('The login is invalid')]);
                   
                 // return redirect()->back()->withInput($request->only('email', 'remember'))->with('message', 'login failed');
                 }
             } catch (\Illuminate\Database\QueryException $ex) {
                 $success = false;
                 $data = null;
                 $message = $ex->getMessage();
             }
                     $response = 
                     [
                         'success' => $success,
                         'message' => $message
                     ];
 
             // return response
             // return response()->json($response, 200);
             return response()->json(['message'=>$message]);
         }
 
 
         // $this->validate($request, [
         //     'email'=>'required|email',
         //     'password'=>'required|min:6'
         // ]);
         
         // $user = customer::where('email', $request->email)->first();
 
         //     if(Hash::check($request->password,$user->password)){
 
         //         dd('zaid');
         //     }else{
         //         dd('here');
         //     }
 
        
        
     } 
 
     public function logout(){
         Auth::guard('web')->logout();
         return redirect('');
     }
 

   
}
