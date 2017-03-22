<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function programName()
    {
        return $this->belongsTo('App\programName', 'programName_id');
    }
}
