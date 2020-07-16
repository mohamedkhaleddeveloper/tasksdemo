<?php

namespace App\Http\Controllers;

use App\ticket;
use Illuminate\Http\Request;
use App\role;
use Auth;
use Hash;
use App\admin;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {

        app()->setLocale(Auth::user()->lang);
        $users = admin::all();
        return view('tickets',compact('users'));
    }

    public function getitems()
    {
        app()->setLocale(Auth::user()->id);
        if (Auth::user()->id == 1) {
            $ticket = ticket::with('admin')->get();
        } else {
            $ticket = ticket::where('user_id',Auth::user()->id)->with('admin')->get();
        }
        
        
        return response()->json($ticket);
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
        $messsages = array(
            'subject.required'=>__('You cant leave title field empty'),
            'content.required'=>__('You cant leave content field empty'),
            'deadline.required'=>__('You cant leave deadline field empty'),
            'user_id.required'=>__('Choose-admin'),
        );

        $validator = Validator::make($request->all(), [
            'subject' => 'required|string',
            'content' => 'required|string',
            'deadline' => 'required|date',
            'user_id' => 'required|integer'
        ], $messsages
        );

        
        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->first()]);
        }else{
            try 
            {
              
                $input = $request->all();     
                $additem = ticket::create($input);
                $success = true;
                $message =  __('Added successfully');
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

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(ticket $item)
    {
        app()->setLocale(Auth::user()->lang_id);
    
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ticket $item)
    {
        app()->setLocale(Auth::user()->lang);
        $messsages = array(
            'subject.required'=>__('You cant leave title field empty'),
            'content.required'=>__('You cant leave content field empty'),
            'deadline.required'=>__('You cant leave deadline field empty'),
            'user_id.required'=>__('Choose-admin'),
        );

        $validator = Validator::make($request->all(), [
            'subject' => 'required|string',
            'content' => 'required|string',
            'deadline' => 'required|date',
            'user_id' => 'required|integer'
        ], $messsages
        );
        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->first()]);
        }else{
            try {
                if($request->status){$status = 1;}else{$status = 0;}
               
                $input = $request->all();
                $item->update($input);
               
                $success = true;
                //$message  = $input['repeater-group'];
                $message =  __("Update successfully");
            } catch (\Illuminate\Database\QueryException $ex) {
                $success = false;
                $data = null;
                $message = $ex->getMessage();
            }
            //$item = item::create($request->all());

              // make response
            $response = [
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
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(ticket $item)
    {
        app()->setLocale(Auth::user()->lang);
        $item->delete();
        $massage =  __("Deleted successfully");
        return response()->json(['message'=>$massage]);
    }
}
