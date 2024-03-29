<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\ServiceCategory;
use App\Service;
use DataTables;

class ServiceCategoryCont extends Controller
{
	public function index()
	{
		return view('admin.serviceCategoryList');
	}
	public function list()
	{
		$model = ServiceCategory::query();
		$dataTable = \DataTables::eloquent($model)
		->addColumn('action', function($model) {
			$action = "";
			$action .= "  <a class='btn btn-success'  href='/admin/service-categories/edit/".$model->id."' data-toggle='tooltip' title='Edit!'>  <i class='fa fa-edit'></i> </a>";

			$action .= " <button class='btn btn-danger' onclick='deleteServiceCat(".$model->id.")' data-toggle='tooltip' title='Delete!'>  <i class='fa fa-trash'></i> </button>";
			return  $action;  
		})
		->addColumn('total', function($model) {
			return Service::where('service_category_id',$model->id)->count() . " entri";
		})
		->addIndexColumn()
		->rawColumns(['action']);
		return $dataTable->make(true);
	}

	public function edit($id)
	{
		if($id == "new") {
			$model = new ServiceCategory();
		}else {
			$model = ServiceCategory::find($id);
		}
		return view('admin.serviceCategoryEdit', compact('model'));
	}

	public function submit($id)
	{
		if($id == "new") {
			$model = new ServiceCategory();
			$slug = Str::slug(request('name'), "-");
			$checkSlug = $this->checkSlug($slug);
			if($checkSlug == 0){
				$model->slug = $slug;
			} else {
				$checkSlug ++;
				$model->slug = $slug . "-" . $checkSlug;
			}
		} else {
			$model = ServiceCategory::find($id);
		}
		$model->name= request('name');
		$model->body = request('body');
		$model->brief_description = request('brief_description');
		$model->save();
		return redirect('/admin/service-categories/edit/'.$model->id);
	}

	public  function checkSlug($slug)
	{
		$count = ServiceCategory::where("slug",$slug)->count();
		return $count;
	}

	public function delete($id)
	{
		$model= ServiceCategory::find($id);
		$model->delete();
		return response()->json("Service Category berhasil di hapus");
	}
}
