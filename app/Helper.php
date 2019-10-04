<?php

namespace App;

use App\Setting;

class Helper 
{
	public static function setData(){
		$data = [];
		$data['sitename'] = Setting::find('sitename')->value;
		$data['pages'] = Page::all();
		$data['categories'] = Category::all(); 
		return $data;
	}
}