<?php

namespace App\Http\Controllers;

// AI: Suggested simulated payment workflow
use App\Http\Requests\HireRequest;
use App\Models\Freelancer;
use App\Models\Hire;
use Illuminate\Http\JsonResponse;

class HireController extends Controller
{
    public function store(Freelancer $freelancer, HireRequest $request): JsonResponse
    {
        $amount = (int) round($freelancer->hourly_rate * 40);

        $hire = Hire::create([
            'freelancer_id' => $freelancer->id,
            'job_title' => $request->string('job_title')->value(),
            'description' => $request->string('description')->value(),
            'duration' => $request->string('duration')->value(),
            'amount' => $amount,
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Hire created successfully',
            'hire_id' => $hire->id,
            'amount' => $hire->amount,
            'status' => $hire->status,
        ], 201);
    }

    public function confirm(Hire $hire): JsonResponse
    {
        $hire->update([
            'status' => 'paid',
        ]);

        return response()->json([
            'message' => 'Payment confirmed',
            'status' => $hire->status,
        ]);
    }
}
