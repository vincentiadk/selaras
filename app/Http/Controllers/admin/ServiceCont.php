<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use DataTables;
use App\Service;
use App\ServiceCategory;

class ServiceCont extends Controller
{
    public function index()
	{
		return view('admin.serviceList');
	}
	public function list()
	{
		$model = Service::query();
		$dataTable = \DataTables::eloquent($model)
		->addColumn('action', function($model) {
			$action = "";
			$action .= "  <a class='btn btn-success'  href='/admin/service/edit/".$model->id."' data-toggle='tooltip' title='Edit!'>  <i class='fa fa-edit'></i> </a>";

			$action .= " <button class='btn btn-danger' onclick='deleteService(".$model->id.")' data-toggle='tooltip' title='Delete!'>  <i class='fa fa-trash'></i> </button>";
			return  $action;  
		})
		->editColumn('service_category_id', function($model) {
			if($model->service_category_id != "") {
				return ServiceCategory::find($model->service_category_id)->name;
			}
		})
		->addIndexColumn()
		->rawColumns(['action']);
		return $dataTable->make(true);
	}

	public function edit($id)
	{
		if($id == "new") {
			$model = new Service();
		}else {
			$model = Service::find($id);
		}
		$serviceCat = ServiceCategory::all();
		return view('admin.serviceEdit', compact('model', 'serviceCat'));
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
		$model->category_id = request('category_id');
		$slug = Str::slug(request('title'), "_");
		$checkSlug = $this->checkSlug($slug);
		if($checkSlug == 0){
			$model->slug = $slug;
		} else {
			$checkSlug ++;
			$model->slug = $slug . "_" . $checkSlug;
		}
		$model->save();
		return redirect('/admin/service/edit/'.$model->id);
	}

	public  function checkSlug($slug)
	{
		$count = Service::where("slug",$slug)->count();
		return $count;
	}

	public function delete($id)
    {
        $model= Service::find($id);
        $model->delete();
        return response()->json("Halaman berhasil di hapus");
    }
}
