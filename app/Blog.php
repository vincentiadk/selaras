<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User','created_by','id');
    }

    public function category()
    {
    	return $this->belongsTo('App\BlogCategory','blog_category_id','id');
    }
}
