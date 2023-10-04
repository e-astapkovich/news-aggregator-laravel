<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialProvidersController extends Controller
{
    public function redirect() {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callback() {
        $user = Socialite::driver('vkontakte')->user();
        dd($user);
    }
}
