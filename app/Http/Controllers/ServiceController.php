<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper;
use App\ServiceCategory;
use App\Service;
use SEOMeta;
use OpenGraph;
use SEO;

class ServiceController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Helper::setData();
    }
    public function view($category,$slug)
    { 	
        $data = $this->data; 
    	$data['category'] = ServiceCategory::where('slug',$category)->get()->first();

    	if($category != null) {
    	$service = Service::where('slug',$slug)->get()->first();
    	$data['service'] = $service;

        SEOMeta::setTitle($data['service']['title'], false);
        SEO::setCanonical(url()->current());
        SEO::opengraph()->setUrl(url()->current());
        SEO::opengraph()->addProperty('type', 'webpage');
        SEO::opengraph()->setSiteName($this->data['sitename']);
        SEO::opengraph()->setTitle($data['service']['title'], false);

    	session()->forget('error');
    	return view('frontpage.serviceView', compact('data'));

    	} else {
    	Session()->flash("error","Can not find page");
    	return view('frontpage.error', compact('data'));
    	} 	
    	
    }
}
