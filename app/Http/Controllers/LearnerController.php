<?php

namespace App\Http\Controllers;

use App\Http\Resources\LearnerResource;
use App\Models\Learner;
use Illuminate\Http\Request;

class LearnerController extends Controller
{
    public function getLearner(Learner $learner)
    {
        return new LearnerResource($learner);
    }

    public function updateLearner(Request $request, Learner $learner)
    {
        $learner->update($request->all());
        return new LearnerResource($learner);
    }

    public function getAuthLearner()
    {
        return new LearnerResource(auth()->user());
    }
}
