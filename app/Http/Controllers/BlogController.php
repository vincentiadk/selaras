<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper;
use App\Blog;
use App\BlogCategory;
use SEOMeta;
use OpenGraph;
use SEO;

class BlogController extends Controller
{
	private $data;

	public function __construct()
	{
		$this->data = Helper::setData();
	}

	public function index()
	{ 	
		$data = $this->data;
		$data['blogs'] = Blog::latest()->paginate(10);
		$data['blogcategories'] = BlogCategory::all();
		SEOMeta::setTitle($this->data['sitename'] . " Blog", false);
		SEO::setDescription('Latest news and activities of Selaras Consulting');
		SEO::setCanonical(url()->current());
		SEO::opengraph()->setUrl(url()->current());
		SEO::opengraph()->addProperty('type', 'blogpage');
		SEO::opengraph()->setSiteName($this->data['sitename']);
		SEO::opengraph()->setTitle($this->data['sitename'] . " Blog", false);
		SEO::opengraph()->setDescription('Latest news and activities of Selaras Consulting');
		return view('frontpage.blog',compact('data'));   	
	}

	public function view($slug)
	{ 	
		$data = $this->data;
		$data['blog'] = Blog::where('slug',$slug)->first();
		SEOMeta::setTitle($data['blog']->title, false);
		SEOMeta::addKeyword($data['blog']->tags);
		SEO::setDescription($data['blog']['asbtract']);
		SEO::setCanonical(url()->current());
		SEO::opengraph()->setUrl(url()->current());
		SEO::opengraph()->addProperty('type', 'blogpage');
		SEO::opengraph()->setSiteName($this->data['sitename']);
		SEO::opengraph()->setTitle($data['blog']['title'], false);
		SEO::opengraph()->setDescription($data['blog']['asbtract']);
		return view('frontpage.blogView',compact('data'));   	
	}

	public function getByCategory($category)
	{
		$data = $this->data;
		$data['blogcategories'] = BlogCategory::all();
		$cat = BlogCategory::where('slug',$category)->first();
		$data['blogs'] = $cat->blogs->paginate(10);
		return view('frontpage.blog',compact('data'));    
	}

	public function getByTag($tag)
	{
		$data = $this->data;
		$data['blogcategories'] = BlogCategory::all();
		$data['blogs'] = Blog::where('tags', '%' . $tag .'%')->paginate(10);
		return view('frontpage.blog',compact('data'));    
	}
}
