<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScormRequest;
use App\Services\Contracts\ScormServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Peopleaps\Scorm\Model\ScormModel;
use Peopleaps\Scorm\Model\ScormScoModel;

class ScormController extends BaseController
{
    private ScormServiceContract $scormService;

    public function __construct(ScormServiceContract $scormService)
    {
        $this->scormService = $scormService;
    }
    public function getScorm(ScormRequest $request): JsonResponse
    {
        $list = ScormModel::all();

        return $this->sendResponse($list, 'Scorm list fetched successfully');
    }

    public function getScos(ScormRequest $request): JsonResponse
    {
        $columns = [
            'id',
            'scorm_id',
            'uuid',
            'entry_url',
            'identifier',
            'title',
            'sco_parameters',
        ];

        $list = ScormScoModel::query()->select($columns)->get();

        return $this->sendResponse($list, 'Scos list fetched successfully');
    }

    public function play(string $uuid): View
    {
        $data = $this->scormService->getScoViewDataByUuid($uuid);

        return view('scorm::player', ['data' => $data]);
    }
}
