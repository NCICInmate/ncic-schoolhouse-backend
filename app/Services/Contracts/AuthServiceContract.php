<?php

namespace App\Services\Contracts;

use App\Models\Learner;
use Laravel\Passport\PersonalAccessTokenResult;

interface AuthServiceContract
{
    public function createTokenForLearner(Learner $learner, bool $rememberMe = false): PersonalAccessTokenResult;
}
