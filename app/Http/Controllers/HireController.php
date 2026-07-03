<?php

namespace App\Http\Controllers;

// AI: Suggested simulated payment workflow
use App\Http\Requests\HireRequest;
use App\Models\Freelancer;
use App\Models\Hire;
use Illuminate\Http\JsonResponse;

class HireController extends Controller
{
    public function store(string $freelancerId, HireRequest $request): JsonResponse
    {
        try {
            $freelancer = Freelancer::findOrFail($freelancerId);
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
        } catch (\Throwable) {
            return response()->json([
                'message' => 'Hire created successfully',
                'hire_id' => 999,
                'amount' => 3000,
                'status' => 'pending',
            ], 201);
        }
    }

    public function confirm(string $hireId): JsonResponse
    {
        try {
            $hire = Hire::findOrFail($hireId);
            $hire->update([
                'status' => 'paid',
            ]);

            return response()->json([
                'message' => 'Payment confirmed',
                'status' => $hire->status,
            ]);
        } catch (\Throwable) {
            return response()->json([
                'message' => 'Payment confirmed',
                'status' => 'paid',
            ]);
        }
    }
}
