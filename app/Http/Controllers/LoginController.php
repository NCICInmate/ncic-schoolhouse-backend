<?php

namespace App\Http\Controllers;

use App\Http\Requests\LearnerLoginRequest;
use App\Services\Contracts\AuthServiceContract;
use App\Services\Contracts\LearnerServiceContract;
use EscolaLms\Auth\Http\Resources\LoginResource;

use EscolaLms\Core\Http\Controllers\EscolaLmsBaseController;
use Illuminate\Http\JsonResponse;
use Exception;

class LoginController extends EscolaLmsBaseController
{
    private AuthServiceContract $authService;
    private LearnerServiceContract $learnerService;

    public function __construct(AuthServiceContract $authServiceContract, LearnerServiceContract $learnerService)
    {
        $this->authService = $authServiceContract;
        $this->learnerService = $learnerService;
    }

    public function login(LearnerLoginRequest $request): JsonResponse
    {
        try {
            $learner = $this->learnerService->login(
                $request->input('learner_id'),
                $request->input('password'),
            );

            $token = $this->authService->createTokenForLearner($learner, true);

            return $this->sendResponseForResource(LoginResource::make($token), __('Login successful'));
        } catch (Exception $exception) {
            return new JsonResponse(['message' => $exception->getMessage()], 422);
            return $this->sendError($exception->getMessage(), 422);
        }
    }
}
