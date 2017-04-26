<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userprocomment extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User', 'user');
    }

    public function comments()
    {
        return $this->belongsTo('App\Program', 'program_id');
    }
}
