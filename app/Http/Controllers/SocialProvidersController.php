<?php

namespace App\Http\Controllers;

use App\Events\DefineLoginEvent;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialProvidersController extends Controller
{
    public function redirect() {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callback() {

        try {
            $socialUser = Socialite::driver('vkontakte')->user();
        } catch (Exception $error) {
            return redirect('/login');
        }

        /*
        * Если пользователь с данным email есть в БД, то авторизуем его. Если в БД нет, то создаем.
        */

        $user = User::where('email', $socialUser->getEmail())->first();

        if (!$user) {
            $user = new User([
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'avatar' => $socialUser->avatar,
                'password' => Hash::make('123')
            ]);
        }

        $user->avatar = $socialUser->avatar;
        $user->save();
        Auth::login($user, true);
        event(new DefineLoginEvent($user));

        return redirect(route('welcome'));
    }
}
