<?php

namespace App\Http\Controllers;

use App\admin;
use App\role;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
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

    public function getstuff()
    {
        app()->setLocale(Auth::user()->lang);
        $stuffs = admin::get();
        return response()->json($stuffs);
    }
    public function getroles(admin $stuff)
    {
        app()->setLocale(Auth::user()->lang);
        $roles = $stuff->roles()->get()->pluck('id')->toArray();
     
        return $roles;
    }
     
    public function index()
    {
        app()->setLocale(Auth::user()->lang);
        $stuff = admin::get();
        $roles = role::get();
        $roles = $roles->groupBy('category_en');
        
        return view('user',compact('roles'));
    }

    public function editeuser()
    {
        return view('system.useredite');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        app()->setLocale(Auth::user()->lang);
        //dd($request->all());
        $password = Hash::make($request->password);
        $messsages = array(
            'name_ar.required'=>__('You cant leave Arabic Name field empty'),
            'name.required'=>__('You cant leave English Name field empty'),
            'mobile.required'=>__('You cant leave Mobile field empty & number only'),
            'mobile.unique:users'=>__('You cant leave Mobile field empty & number only'),
            'password.required'=>__('You cant leave Password field empty'),
            'password.confirmed'=>__('The password confirmation does not match'),
        );
        $validator = Validator::make($request->all(), [
            'name_ar'  => 'required|string',
            'name'  => 'required|string',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ],  $messsages
        );
        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->first()]);
        }else{
            try 
            {
                $input = $request->all();     
               // dd($input);
              
              
                $stuff  = admin::create(array_merge($input,  ["password" => $password]));
                $success = true;
                $message = __('Added successfully');
            } catch (\Exception $ex) {
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

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function show(admin $stuff)
    {
        app()->setLocale(Auth::user()->lang);
        $response = [
            'stuff' => $stuff,
        ];
        return response()->json($response);
    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $stuff)
    {
        app()->setLocale(Auth::user()->lang);
        $messsages = array(
            'name_ar.required'=>__('You cant leave Arabic Name field empty'),
            'name.required'=>__('You cant leave English Name field empty'),
            'mobile.required'=>__('You cant leave Mobile field empty & number only'),
            'mobile.unique:users'=>__('You cant leave Mobile field empty & number only'),
            'password.required'=>__('You cant leave Password field empty'),
            'password.confirmed'=>__('The password confirmation does not match'),
        );
        $validator = Validator::make($request->all(), [
            'name_ar'  => 'required|string',
            'name'  => 'required|string',
            'email'    => 'required|email|unique:users,id,'.$stuff->id,
            'password' => 'nullable|string|min:8|confirmed'
        ],  $messsages
        );
        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->first()]);
        }else{
            try 
            {
                $input = $request->all();     
               
                if($request->password == null){
                    $password = $stuff->password;
                }
                $stuff->update(array_merge($input,["password"=>$password]));
               
                $success = true;
                $message = __('Update successfully');
            } catch (\Exception $ex) {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $stuff)
    {
        $stuff->delete();
        return response()->json(['message'=>__('Deleted successfully')]);
    }
    
    public function update_password(Request $request,stuff $stuff)
    {
        $password = Hash::make($request->password);
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|confirmed'
        ]
        );
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->first()]);
        }
        else
        {
            try 
            {
                $stuff->update(["password" => $password]);
                $success = true;
                $message = __('Update successfully');
            }
             catch (\Exception $ex) 
            {
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
    }

   
    public function roles(Request $request,Admin $stuff)
    {
        app()->setLocale(Auth::user()->lang);
        $roles = $request->roles;
        $stuff->roles()->sync($roles);
        return response()->json(['message'=>'permission added successfully']);

    }
}
