<?php

namespace App\Services\Interfaces;

use App\Models\User;
use Laravel\Socialite\Contracts\User as SocialUser;

interface ISocial
{
    public function findOrCreateUser(SocialUser $socialUser): User;
}
