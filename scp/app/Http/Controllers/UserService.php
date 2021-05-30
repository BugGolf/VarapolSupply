<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class UserService
{

  public static function makeSession($user)
  {
    $sessionId = Str::random(32);
    Cache::put("session_{$sessionId}", $user);
    return Cookie::make("SCP_USER", $sessionId, 600);
  }

  public static function getSessionId()
  {
    return "session_" . Cookie::get('SCP_USER');
  }

  public static function getSession()
  {
    return Cache::get(self::getSessionId());
  }

  public static function verify()
  {
    return Cache::get(self::getSessionId()) ? true : false;
  }

  public static function isAdmin()
  {
    $session = self::getSession();
    return $session->is_admin == 1 ? true : false;
  }

  public static function clearSession()
  {
    Cache::forget(self::getSessionId());
  }

}