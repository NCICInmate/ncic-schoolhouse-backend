<?php

namespace App\Http\Requests;

use App\Models\Learner;
use EscolaLms\Auth\Http\Requests\ExtendableRequest;

class LearnerLoginRequest extends ExtendableRequest
{
    public function rules(): array
    {
        return [
            'learner_id' => ['required', 'string', 'max:255'],
            'password' => Learner::PASSWORD_RULES,
            'first_name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'facility_id' => ['string', 'max:255'],
        ];
    }
}
