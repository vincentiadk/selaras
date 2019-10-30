<?php

namespace App;

use App\Setting;

class Helper 
{
	public static function setData(){
		$data = [];
		$data['sitename'] = Setting::find('sitename')->value;
		$data['pages'] = Page::where('is_static', 0)->get();
		$data['categories'] = ServiceCategory::all(); 
		return $data;
	}
}