<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FreelancerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'title' => $this->title,
            'skills' => $this->skills,
            'hourly_rate' => (float) $this->hourly_rate,
            'rating' => (float) $this->rating,
            'bio' => $this->bio,
            'detailed_bio' => $this->detailed_bio,
            'projects_completed' => (int) $this->jobs_completed,
            'statistics' => [
                'success_rate' => (float) $this->success_rate,
                'earnings' => (int) $this->earnings,
            ],
            'projects' => ProjectResource::collection($this->whenLoaded('projects')),
        ];
    }
}
