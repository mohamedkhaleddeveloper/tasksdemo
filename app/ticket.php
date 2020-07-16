<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ticket extends Model
{
    //
    use SoftDeletes;
    public $timestamps = TRUE;
    protected $fillable = [
        'subject',
        'content',
        'deadline',
        'user_id',
    ];

    public function admin()
    {
        return $this->belongsTo('App\admin', 'user_id');
    }
}
