<?php

namespace App\Services;

use App\Models\User as User;
use App\Services\Interfaces\ISocial;
use Laravel\Socialite\Contracts\User as SocialUser;
use Illuminate\Support\Facades\Hash;

class SocialService implements ISocial
{
    public function findOrCreateUser(SocialUser $socialUser): User
    {
        /*
        * Если пользователь с данным email есть в БД, то авторизуем его. Если в БД нет, то создаем.
        */

        $user = User::where('email', $socialUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'avatar' => $socialUser->avatar,
                'password' => Hash::make('123')
            ]);
        }

        $user->avatar = $socialUser->avatar;
        $user->save();
        return $user;
    }
}
