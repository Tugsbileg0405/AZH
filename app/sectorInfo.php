<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sectorInfo extends Model
{
    public function sector()
    {
        return $this->belongsTo('App\Location', 'location_id');
    }
}
