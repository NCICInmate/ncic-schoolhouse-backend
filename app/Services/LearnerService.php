<?php

namespace App\Services;

use App\Models\Learner;
use Illuminate\Contracts\Auth\Authenticatable as User;
use App\Repositories\Contracts\LearnerRepositoryContract;
use EscolaLms\Auth\Events\Login;
use App\Services\Contracts\LearnerServiceContract;
use Exception;

/**
 * Class LearnerService.
 */
class LearnerService implements LearnerServiceContract
{
    private LearnerRepositoryContract $learnerRepository;

    /**
     * UserService constructor.
     * @param LearnerRepositoryContract $learnerRepository
     */
    public function __construct(LearnerRepositoryContract $learnerRepository)
    {
        $this->learnerRepository = $learnerRepository;
    }

    public function login(string $learner_id, string $password): User
    {
        $learner = $this->learnerRepository->findByUsername($learner_id);

        if (is_null($learner) || ($password !== $learner->password)) {
            throw new Exception('Invalid credentials');
        }

        assert($learner instanceof Learner);

        event(new Login($learner));

        return $learner;
    }

}
