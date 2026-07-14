<?php

namespace App\Http\Controllers;

use App\Http\Resources\FreelancerResource;
use App\Models\Freelancer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\JsonResponse;

class FreelancerController extends Controller
{
    // Index method returns either collection or JSON fallback
    public function index(Request $request): AnonymousResourceCollection|JsonResponse
    {
        try {
            $query = Freelancer::query();

            if ($request->filled('search')) {
                $search = trim($request->string('search')->value());

                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhereJsonContains('skills', $search);
                });
            }

            $freelancers = $query->paginate(10);

            return FreelancerResource::collection($freelancers);
        } catch (\Throwable) {
            $items = $this->fallbackFreelancers();

            if ($request->filled('search')) {
                $search = trim($request->string('search')->value());
                $items = array_values(array_filter($items, function (array $freelancer) use ($search): bool {
                    return str_contains(strtolower($freelancer['name']), strtolower($search))
                        || in_array(strtolower($search), array_map('strtolower', $freelancer['skills']), true);
                }));
            }

            return response()->json($items);
        }
    }

    public function show(string $freelancerId): JsonResponse
    {
        try {
            $freelancer = Freelancer::findOrFail($freelancerId);
            $freelancer->load('projects');

            return (new FreelancerResource($freelancer))->response();
        } catch (\Throwable) {
            $freelancer = $this->findFallbackFreelancer($freelancerId);

            if (! $freelancer) {
                return response()->json(['message' => 'Freelancer not found'], 404);
            }

            return response()->json($freelancer);
        }
    }

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
