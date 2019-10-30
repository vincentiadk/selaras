<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use DataTables;
use App\BlogCategory;
use App\User;


class BlogCategoryCont extends Controller
{
	public function index()
	{
		return view('admin.blogCategoryList');
	}
	public function list()
	{
		$model = BlogCategory::query();
		$dataTable = \DataTables::eloquent($model)
		->addColumn('action', function($model) {
			$action = "";
			$action .= "  <a class='btn btn-success'  href='/admin/blog-categories/edit/".$model->id."' data-toggle='tooltip' title='Edit!'>  <i class='fa fa-edit'></i> </a>";

			$action .= " <button class='btn btn-danger' onclick='Delete(".$model->id.")' data-toggle='tooltip' title='Delete!'>  <i class='fa fa-trash'></i> </button>";
			return  $action;  
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
			$model = new BlogCategory();
		}else {
			$model = BlogCategory::find($id);
		}
		return view('admin.blogCategoryEdit', compact('model'));
	}

	public function submit($id)
	{
		if($id == "new") {
			$model = new BlogCategory();
			$model->created_at = Auth::user()->id;
		} else {
			$model = BlogCategory::find($id);
		}
		if(Str::length(trim(request('name'))) > 0 ){
			$model->name = request('name');
			$model->description = request('description');
			$slug = Str::slug(request('name'));
			$checkSlug = $this->checkSlug($slug);
			if($checkSlug == 0){
				$model->slug = $slug;
			} else {
				$checkSlug ++;
				$model->slug = $slug . "_" . $checkSlug;
			}
			$model->save();
			return redirect('/admin/blog-categories/edit/'.$model->id);
		} else {
			return redirect()->back()->withErrors(['Category name cannot empty']);
		}
	}
	
	public  function checkSlug($slug)
	{
		$count = BlogCategory::where("slug",$slug)->count();
		return $count;
	}

	public function delete($id)
	{
		$model= BlogCategory::find($id);
		$model->delete();
		return response()->json("Blog post berhasil di hapus");
	}
}
