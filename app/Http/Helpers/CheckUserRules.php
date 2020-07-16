<?php
namespace App\Http\Helpers; 
use Auth;
use App\stuff; 
use App\role; 
use App\user_rols;
class CheckUserRules {

    public static function check($key=NULL,$category=NULL)
    {  
        $role = role::where('name_en',$key)->where('category_en',$category)->first();
        if (!$role) 
        {
            return FALSE;  
        }                                  
        $user_role =  user_rols::where('role_id',$role->id)->where('user_id', Auth::user()->id)->first(); 
        if ($user_role) {
            return TRUE;
        }    
        return false;  
    }
    












}// end off main 