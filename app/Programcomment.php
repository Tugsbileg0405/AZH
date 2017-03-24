<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programcomment extends Model
{
	public function programName()
	     {
		return $this->belongsTo('App\programName', 'program_id');
	}
}
