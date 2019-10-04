<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper;
use App\Category;
use SEOMeta;
use OpenGraph;
use SEO;

class CategoryController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Helper::setData();
    }

    public function view($slug)
    { 	
        $data = $this->data;
        $data['category'] = Category::where('slug',$slug)->first();
        SEOMeta::setTitle($data['category']->name, false);
        SEO::setDescription($data['category']->brief_description);
        SEO::setCanonical(url()->current());
        SEO::opengraph()->setUrl(url()->current());
        SEO::opengraph()->addProperty('type', 'webpage');
        SEO::opengraph()->setSiteName($this->data['sitename']);
        SEO::opengraph()->setTitle($data['category']->name, false);
        SEO::opengraph()->setDescription($data['category']->brief_description);
        return view('frontpage.categoryView',compact('data'));   	
    }
}
