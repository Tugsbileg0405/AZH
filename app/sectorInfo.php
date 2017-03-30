<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sectorInfo extends Model
{
    public function province()
	    {
		return $this->belongsTo('App\Province', 'location_id');
	}
}
