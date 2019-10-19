<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Service;

class ServiceCont extends Controller
{
    public function index()
	{
		return view('admin.serviceList');
	}
	public function list()
	{
		$model = Page::query();
		$dataTable = \DataTables::eloquent($model)
		->addColumn('action', function($model) {
			$action = "";
			$action .= "  <a class='btn btn-success'  href='/admin/service/edit/".$model->id."' data-toggle='tooltip' title='Edit!'>  <i class='fa fa-edit'></i> </a>";

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
			$model = new Page();
		}else {
			$model = Page::find($id);
		}
		return view('admin.serviceEdit', compact('model'));
	}

	public function submit($id)
	{
		if($id == "new") {
			$model = new Service();
		} else {
			$model = Service::find($id);
		}
		$model->title= request('title');
		$model->body = request('body');
		$slug = str_slug(request('title'), "_");
		$checkSlug = $this->checkSlug($slug);
		if($checkSlug == 0){
			$model->slug = $slug;
		} else {
			$checkSlug ++;
			$model->slug = $slug . "_" . $checkSlug;
		}
		$model->save();
		return redirect('/page/service/'.$model->id);
	}

	public  function checkSlug($slug)
	{
		$count = Service::where("slug",$link)->count();
		return $count;
	}

	public function delete($id)
    {
        $model= Page::find($id);
        $model->delete();
        return response()->json("Halaman berhasil di hapus");
    }
}