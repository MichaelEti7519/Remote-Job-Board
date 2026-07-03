<?php

namespace App\Http\Controllers;

use App\Http\Resources\FreelancerResource;
use App\Models\Freelancer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse; // 👈 ADD THIS

class FreelancerController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection|Response
    {
        // ... (keep as is)
    }

    public function show(string $freelancerId): JsonResponse // 👈 CHANGE TO JsonResponse
    {
        try {
            $freelancer = Freelancer::findOrFail($freelancerId);
            $freelancer->load('projects');

            return response()->json(new FreelancerResource($freelancer));
        } catch (\Throwable) {
            $freelancer = $this->findFallbackFreelancer($freelancerId);

            if (! $freelancer) {
                return response()->json(['message' => 'Freelancer not found'], 404);
            }

            return response()->json($freelancer);
        }
    }

    // ... rest of methods unchanged
}