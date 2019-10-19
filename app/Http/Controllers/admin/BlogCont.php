<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Blog;

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

			$action .= " <button class='btn btn-danger' onclick='Delete(".$model->id.")' data-toggle='tooltip' title='Delete!'>  <i class='fa fa-trash'></i> </button>";
			return  $action;  
		})
		->addIndexColumn()
		->rawColumns(['action']);
		return $dataTable->make(true);
	}

	public function edit($id)
	{
		if($id == "new") {
			$model = new Blog();
		}else {
			$model = Blog::find($id);
		}
		return view('admin.blogEdit', compact('model'));
	}

	public function submit($id)
	{
		if($id == "new") {
			$model = new Blog();
		} else {
			$model = Blog::find($id);
		}
		$model->title = request('title');
		$model->abstract= request('abstract');
		$model->body = request('body');
		$slug = str_slug(request('title'), "_");
		$checkSlug = $this->checkSlug($slug);
		if($checkSlug == 0){
			$model->slug = $slug;
		} else {
			$checkSlug ++;
			$model->slug = $slug . "_" . $checkSlug;
		}
		$model->blog_category_id = request('blog_category_id');
		$model->tags = request('tags');
		$model->save();
		return redirect('/blog/edit/'.$model->id);
	}
	
	public  function checkSlug($slug)
	{
		$count = Blog::where("slug",$link)->count();
		return $count;
	}

	public function delete($id)
    {
        $model= Blog::find($id);
        $model->delete();
        return response()->json("Blog post berhasil di hapus");
    }
}
