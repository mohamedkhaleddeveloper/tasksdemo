<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class admin extends Authenticatable
{
    //
    use SoftDeletes; //
    use Notifiable;
    protected $guard = 'users';
    protected $table      = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'name_ar',
        'email',
        'lang',
        'password',
    ];

    public function tickets()
    {
        return $this->hasMany('App\ticket','user_id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\role','App\user_rols','user_id','role_id');
    }
}
