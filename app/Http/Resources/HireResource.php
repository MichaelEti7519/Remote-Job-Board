<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HireResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'freelancer_id' => $this->freelancer_id,
            'job_title' => $this->job_title,
            'description' => $this->description,
            'duration' => $this->duration,
            'amount' => (int) $this->amount,
            'status' => $this->status,
        ];
    }
}
