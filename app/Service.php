<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	public function service_category()
	{
		return $this->belongsTo('App\ServiceCategory','service_category_id','id');
	}
}
