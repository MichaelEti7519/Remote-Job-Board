<?php

namespace App\Http\Controllers;

use App\Http\Resources\FreelancerResource;
use App\Models\Freelancer;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    public function index(Request $request)
    {
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
    }

    public function show(Freelancer $freelancer)
    {
        $freelancer->load('projects');

        return new FreelancerResource($freelancer);
    }
}
