<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use DataTables;
use App\Page;

class PageCont extends Controller
{
	public function index()
	{
		return view('admin.pageList');
	}
	public function list()
	{
		$model = Page::query();
		$dataTable = \DataTables::eloquent($model)
		->addColumn('action', function($model) {
			$action = "";
			$action .= "  <a class='btn btn-success'  href='/admin/page/edit/".$model->id."' data-toggle='tooltip' title='Edit!'>  <i class='fa fa-edit'></i> </a>";

			$action .= " <button class='btn btn-danger' onclick='deletePage(".$model->id.")' data-toggle='tooltip' title='Delete!'>  <i class='fa fa-trash'></i> </button>";
			return  $action;  
		})
		->editColumn('is_static', function($model){
			if($model->is_static == 1) {
				return "Static Page";
			} else return "Dynamic Page";
		})
		->addIndexColumn()
		->rawColumns(['action']);
		return $dataTable->make(true);
	}

	public function edit($id)
	{
		if($id == "new") {
			$model = new Page();
		}else {
			$model = Page::find($id);
		}
		return view('admin.pageEdit', compact('model'));
	}

	public function submit($id)
	{
		if($id == "new") {
			$model = new Page();
			$model->is_static = 1;
		} else {
			$model = Page::find($id);
		}
		$model->title= request('title');
		$model->body = request('body');
		$slug = Str::slug(request('title'), "_");
		$checkSlug = $this->checkSlug($slug);
		if($checkSlug == 0){
			$model->slug = $slug;
		} else {
			$checkSlug ++;
			$model->slug = $slug . "_" . $checkSlug;
		}
		$model->save();
		return redirect('/admin/page/edit/'.$model->id);
	}

	public  function checkSlug($slug)
	{
		$count = Page::where("slug",$link)->count();
		return $count;
	}

	public function delete($id)
    {
        $model = Page::find($id);
        $model->delete();
        return response()->json("Halaman berhasil di hapus");
    }
}
