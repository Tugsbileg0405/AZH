<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function sector()
    {
        return $this->belongsTo('App\Location', 'location');
    }

}
