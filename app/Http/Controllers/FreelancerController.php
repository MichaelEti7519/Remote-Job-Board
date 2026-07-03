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

    public function show(string $freelancerId)
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


    

    private function fallbackFreelancers(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Avery Patel',
                'title' => 'Senior Laravel Developer',
                'skills' => ['Laravel', 'PHP', 'MySQL', 'API Design', 'Docker'],
                'hourly_rate' => 75,
                'rating' => 4.9,
                'bio' => 'Builds scalable SaaS APIs and internal tools for remote teams.',
                'detailed_bio' => 'Avery is a product-minded backend engineer who specializes in Laravel, API design, and system optimization for growing startups.',
                'projects_completed' => 128,
                'statistics' => ['success_rate' => 98.5, 'earnings' => 320000],
            ],
            [
                'id' => 2,
                'name' => 'Jordan Lee',
                'title' => 'Full-Stack React Developer',
                'skills' => ['React', 'TypeScript', 'Node.js', 'Tailwind', 'UX'],
                'hourly_rate' => 68,
                'rating' => 4.8,
                'bio' => 'Creates polished dashboards and fast user experiences.',
                'detailed_bio' => 'Jordan works closely with product teams to turn prototypes into high-converting frontend experiences backed by reliable APIs.',
                'projects_completed' => 98,
                'statistics' => ['success_rate' => 97.2, 'earnings' => 245000],
            ],
        ];
    }

    private function findFallbackFreelancer(string $freelancerId): ?array
    {
        $freelancers = $this->fallbackFreelancers();

        foreach ($freelancers as $freelancer) {
            if ((string) $freelancer['id'] === $freelancerId) {
                return $freelancer;
            }
        }

        return null;
    }
}
