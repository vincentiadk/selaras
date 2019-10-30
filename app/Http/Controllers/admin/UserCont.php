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

			$action .= " <button class='btn btn-danger' onclick='deleteUser(".$model->id.")' data-toggle='tooltip' title='Delete!'>  <i class='fa fa-trash'></i> </button>";
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
		} else {
			$model = User::find($id);
		}
		return view('admin.userEdit', compact('model'));
	}

	public function submit($id)
	{
		$error = "";
		if($id == "new") {
			$model = new User();
			if(request('password') == "") {
				$model->password = BCrypt(request('username'));
			} else {
				$model->password = BCrypt(request('password'));
			}
		} else {
			$model = User::find($id);
			if(request('password') != "") {
				if(request('passwordconfirm') == "") {
					$error .= "Fill confirmation password. ";
				} else if( request('password') != request('passwordconfirm')){
					$error .= "Password and Confirmation must be same. ";
					return redirect()->back();
				}
				else if( request('password') == request('passwordconfirm')){
					$model->password = BCrypt(request('password'));
				}
			}
		}

		if($this->checkEmail(request('username')) > 0) {
			$error .= "Username ".request('username'). " is already exists. ";
			return redirect()->back();
		} else {
			$model->username = request('username');
		}
		
		if($this->checkEmail(request('email')) > 0) {
			$error .= "Email ".request('email'). " is already exists. ";
			return redirect()->back();
		} else {
			$model->email = request('email');
		}
		if(request('name')==""){
			$model->name = request('username');
		} else {
			$model->name = request('name');
		}
		$model->bio = request('bio');
		$model->save();
		return redirect('/user/edit/' .$model->id);
	}

	public function delete($id)
	{
		$model= User::find($id);
		$model->delete();
		return response()->json("User berhasil di hapus");
	}

	public function checkEmail($email)
	{
		$count = User::where("email",$email)->count();
		return $count;
	}

	public function checkUsername($email)
	{
		$count = User::where("username",$email)->count();
		return $count;
	}
}
