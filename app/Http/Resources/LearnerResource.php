<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LearnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'motivation' => $this->motivation,
            'release_date' => $this->release_date,
            'accomplishments' => $this->accomplishments,
        ];
    }
}
