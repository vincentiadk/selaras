<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use DataTables;

class UserCont extends Controller
{
    public function index()
	{
		return view('admin.userList');
	}
	public function list()
	{
		$model = User::query();
		$dataTable = \DataTables::eloquent($model)
		->addColumn('action', function($model) {
			$action = "";
			$action .= "  <a class='btn btn-success'  href='/admin/user/edit/".$model->id."' data-toggle='tooltip' title='Edit!'>  <i class='fa fa-edit'></i> </a>";

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
			$model = new User();
		}else {
			$model = User::find($id);
		}
		return view('admin.userEdit', compact('model'));
	}

	public function submit($id)
	{
		if($id == "new") {
			$model = new User();
		} else {
			$model = User::find($id);
		}
		$model->username= request('username');
		$model->password = request('password');
		$model->save();
		return redirect('/user/edit/'.$model->id);
	}
	public function delete($id)
    {
        $model= User::find($id);
        $model->delete();
        return response()->json("User berhasil di hapus");
    }
}
