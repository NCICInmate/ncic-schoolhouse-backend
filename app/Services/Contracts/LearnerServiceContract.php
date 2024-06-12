<?php

namespace App\Services\Contracts;

use Illuminate\Contracts\Auth\Authenticatable as User;

interface LearnerServiceContract
{
    public function login(string $learner_id, string $password): User;
}
