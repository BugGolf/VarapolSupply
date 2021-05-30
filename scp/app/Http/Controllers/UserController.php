<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

  public function index()
  {
    return view('user.view', [
      "users" => User::all()
    ]);
  }
  
  public function addUser()
  {
    return view('user.add');
  }

  public function checkUsername($username)
  {
    return User::where("username", $username)
      ->first() ? true : false;
  }
  public function store(Request $request)
  {
    if($request->filled('name') 
      && $request->filled('username')
      && $request->filled('password')
    ) {
      $username = $request->input('username');
      $checkUsername = $this->checkUsername($username);

      if(!$checkUsername) {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect('/user');
      } else {
        $request->session()->flash("USER_MESSAGE", "ชื่อผู้ใช้งานซ้ำ");
        return redirect('/user/add')->withInput();
      }
    } else {
      $request->session()->flash("USER_MESSAGE", "กรุณากรอกข้อมูลให้ครบถ้วน");
      return redirect('/user/add')->withInput();
    }
  }

  public function editUser(Request $request, $id)
  {
    return view('user.edit', [
      "user" => User::find($id)
    ]);
  }

  public function update(Request $request, $id)
  {
    if($request->filled('name'))
    {
      $user = User::find($id);
      $user->fill($request->except(["username", "password"]));
      $user->save();

      return redirect('/user');
    } else {
      return redirect('/user');
    }
  }

  public function delete(Request $request, $id)
  {
    User::find($id)->delete();
    return redirect('/user');
  }

  
}