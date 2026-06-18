<?php

namespace App\Http\Resources;

// AI: Generated initial API resource structure
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'project_name' => $this->project_name,
            'description' => $this->description,
            'rating' => (float) $this->rating,
        ];
    }
}
