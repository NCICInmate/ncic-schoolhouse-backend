<?php

namespace App\Repositories;

use App\Models\Learner;
use App\Repositories\Contracts\LearnerRepositoryContract;
use EscolaLms\Core\Repositories\BaseRepository;
use Illuminate\Contracts\Auth\Authenticatable as AuthUser;

class LearnerRepository extends BaseRepository implements LearnerRepositoryContract
{
    /**
     * @var array
     */
    protected $fieldSearchable = [];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return config('auth.providers.learners.model', Learner::class);
    }

    public function findByUsername(string $learner_id): ?AuthUser
    {
        return $this->model->newQuery()->where('learner_id', $learner_id)->first();
    }
}
