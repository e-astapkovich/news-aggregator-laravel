<?php

namespace App\Http\Controllers;

use App\Events\DefineLoginEvent;
use App\Models\User;
use App\Services\Interfaces\ISocial;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialProvidersController extends Controller
{
    public function redirect($driver) {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(ISocial $socialServise) {

        try {
            $socialUser = Socialite::driver($driver)->user();
        } catch (Exception $error) {
            return redirect('/login');
        }

        $user = $socialServise->findOrCreateUser($socialUser);

        dd($user);

        Auth::login($user, true);
        event(new DefineLoginEvent($user));

        return redirect(route('welcome'));
    }
}
