<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Helper; 
use SEOMeta;
use OpenGraph;
use SEO;

class PageController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Helper::setData();
    }

    public function view($slug)
    { 	
        $data = $this->data;
        $data['page'] = Page::where('slug',$slug)->first();
        SEOMeta::setTitle($data['page']['title'], false);
        SEO::setDescription('Selaras is a professional team who provide high-quality service for create the best solution for you');
        SEO::setCanonical(url()->current());
        SEO::opengraph()->setUrl(url()->current());
        SEO::opengraph()->addProperty('type', 'webpage');
        SEO::opengraph()->setSiteName($this->data['sitename']);
        SEO::opengraph()->setTitle($data['page']['title'], false);
        SEO::opengraph()->setDescription('Selaras is a professional team who provide high-quality service for create the best solution for you');
        return view('frontpage.pageView',compact('data'));   	
    }
}
