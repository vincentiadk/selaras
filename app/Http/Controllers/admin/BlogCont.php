<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use DataTables;
use App\Blog;
use App\BlogCategory;
use App\User;

class BlogCont extends Controller
{
	public function index()
	{
		return view('admin.blogList');
	}
	public function list()
	{
		$model = Blog::query();
		$dataTable = \DataTables::eloquent($model)
		->addColumn('action', function($model) {
			$action = "";
			$action .= "  <a class='btn btn-success'  href='/admin/blog/edit/".$model->id."' data-toggle='tooltip' title='Edit!'>  <i class='fa fa-edit'></i> </a>";

			$action .= " <button class='btn btn-danger' onclick='deleteBlog(".$model->id.")' data-toggle='tooltip' title='Delete!'>  <i class='fa fa-trash'></i> </button>";
			return  $action;  
		})
		->editColumn('blog_category_id',function($model) {
			if($model->blog_category_id != "") {
				return BlogCategory::find($model->blog_category_id)->name;
			}
		})
		->editColumn('created_at',function($model) {
			$return  = $model->created_at;
			if($model->created_by != "") {
				$return .= "<br/> By : ". User::find($model->created_by)->name;
			}
			return $return;
		})
		->addIndexColumn()
		->rawColumns(['action','created_at']);
		return $dataTable->make(true);
	}

	public function edit($id)
	{
		if($id == "new") {
			$model = new Blog();
		}else {
			$model = Blog::find($id);
		}
		$blogCat = BlogCategory::all();
		return view('admin.blogEdit', compact('model','blogCat'));
	}

	public function submit($id)
	{
		if($id == "new") {
			$model = new Blog();
			$model->created_by = Auth::user()->id;
		} else {
			$model = Blog::find($id);
		}

		if(Str::length(trim(request('title'))) > 0 ){
			$model->title = request('title');
			$model->abstract= request('abstract');
			$model->body = request('body');

			$slug = Str::slug(request('title'), "_");
			$checkSlug = $this->checkSlug($slug);
			if($checkSlug == 0){
				$model->slug = $slug;
			} else {
				$checkSlug ++;
				$model->slug = $slug . "_" . $checkSlug;
			}

			$model->blog_category_id = request('blog_category_id');
			$model->tags = request('tags');

			if (!empty(request('savedraft'))) {
				$model->is_publish = 0;
			} else if (!empty(request('savepub'))) {
				$model->is_publish = 1;
			}

			$model->save();
			return redirect('/admin/blog/edit/'.$model->id);
		} else {
			return redirect()->back()->withErrors(['Title cannot empty']);
		}
	}
	
	public  function checkSlug($slug)
	{
		$count = Blog::where("slug",$slug)->count();
		return $count;
	}

	public function delete($id)
	{
		$model= Blog::find($id);
		$model->delete();
		return response()->json("Blog post berhasil di hapus");
	}
}
