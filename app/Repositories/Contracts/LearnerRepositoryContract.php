<?php

namespace App\Repositories\Contracts;

use Illuminate\Contracts\Auth\Authenticatable as AuthUser;

interface LearnerRepositoryContract
{
    public function findByUsername(string $learner_id): ?AuthUser;
}
