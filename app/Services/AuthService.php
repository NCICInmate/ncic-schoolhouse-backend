<?php

namespace App\Services;

use App\Models\Learner;
use App\Services\Contracts\AuthServiceContract;
use Laravel\Passport\PersonalAccessTokenResult;
use Laravel\Passport\Passport;
use EscolaLms\Auth\Enums\TokenExpirationEnum;

class AuthService implements AuthServiceContract
{
    public function createTokenForLearner(Learner $learner, bool $rememberMe = false): PersonalAccessTokenResult
    {
        // NOTE: Change addMonth() or addMinutes() to make rememberMe last longer
        Passport::personalAccessTokensExpireIn(
            $rememberMe
                ? now()->addMonth()
                : now()->addMinutes(TokenExpirationEnum::SHORT_TIME_IN_MINUTES)
        );

        return $learner->createToken(config('passport.personal_access_client.secret'));
    }

}

