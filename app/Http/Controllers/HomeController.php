<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SEOMeta;
use OpenGraph;
use SEO;
use App\Helper;
use App\Page;
use App\Service;

class HomeController extends Controller
{
	private $data;

    public function __construct()
    {
        $this->data = Helper::setData();
    }

    public function index()
    {
        $data = $this->data;
        SEOMeta::addKeyword('IT consulting, Management Consulting, Energy Optimizer, Market Research');
        SEOMeta::setTitle($this->data['sitename'] . ' Home',false);
        SEO::setDescription('Selaras is a professional team who provide high-quality service for create the best solution for you');
        SEO::setCanonical(url()->current());
        SEO::opengraph()->setUrl(url()->current());
        SEO::opengraph()->addProperty('type', 'webpage');
        SEO::opengraph()->setSiteName($this->data['sitename']);
        SEO::opengraph()->setTitle($this->data['sitename'] . ' Home', false);
        SEO::opengraph()->setDescription('Selaras is a professional team who provide high-quality service for create the best solution for you');
    	return view('frontpage.home',compact('data'));
    }


    /*--------------------------------------  Admin Functon --------------------------------*/
    public function indexAdmin()
    {
    	return view('admin.layouts.master');
    }

}
