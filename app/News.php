<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	public function category()
	    {
		return $this->belongsTo('App\Category', 'news_category_id');
	}
	
	public function user()
	    {
		return $this->belongsTo('App\Admin');
	}
	
	public function sector()
	    {
		return $this->belongsTo('App\Location', 'location_id');
	}
}
