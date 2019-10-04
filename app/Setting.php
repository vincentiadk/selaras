<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $guarded=[];
	protected $primaryKey = 'name';
	public $incrementing = false;
	public $timestamps = false;
}
