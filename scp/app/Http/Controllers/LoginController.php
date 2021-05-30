<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
  public function login(Request $request)
  {
    $validator = Validator::make($request->all(), [
      "username" => "required",
      "password" => "required"
    ]);

    if (!$validator->fails()) {
      $username = $request->input('username');
      $password = $request->input('password');

      $user = User::where('username', $username)->first();
      if ($user) {
        if (Hash::check($password, $user->password)) {
          $session = UserService::makeSession($user);
          return redirect('/home')
            ->withCookie($session);
        }
      }
    }

    return redirect("/login")
      ->withErrors(["errors" => "true"])
      ->withInput();
  }

  public function logout()
  {
    UserService::clearSession();
    return redirect("/login");
  }
}
