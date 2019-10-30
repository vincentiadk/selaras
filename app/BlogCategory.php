<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
	protected $guarded = [];
    public function blogs()
    {
    	return $this->hasMany('App\Blog','id','blog_category_id');
    }
}
