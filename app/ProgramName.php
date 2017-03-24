<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramName extends Model
{
	public function programs()
	    {
		return $this->hasMany('App\Program', 'programName_id');
	}
	
	public function comments()
	    {
		return $this->hasMany('App\Programcommnet', 'program_id');
	}
}
