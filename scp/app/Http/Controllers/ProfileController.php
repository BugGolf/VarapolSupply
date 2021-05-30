<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

  public function index()
  {
    $session = UserService::getSession();
    $user = User::find($session->id);
    return view('profile.view', [
      'user' => $user
    ]);
  }

  public function update(Request $request)
  {
    if($request->has('name')) {
      $session = UserService::getSession();

      $user = User::find($session->id);
      $user->fill($request->all());

      if($request->filled('password'))
      {
        if(Hash::check($request->input('password'), $user->password))
        {
          if($request->input('new_password') == $request->input('confirm_password'))
          {
            $user->password = Hash::make($request->input('new_password'));
            $request->session()->flash('NEW_PASSWORD', 'เปลี่ยนรหัสผ่านแล้ว');
          } else {
            $request->session()->flash('WRONG_PASSWORD', 'รหัสผ่านไม่ตรงกัน');
          }
        } else {
          $request->session()->flash('WRONG_PASSWORD', 'รหัสผ่านไม่ถูกต้อง');
        }
      }

      $user->save();
      return redirect('/profile');
    }

    return redirect('/profile')->withInput();
  }

}