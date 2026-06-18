<?php

namespace Database\Seeders;

use App\Models\Freelancer;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projectTemplates = [
            [
                'project_name' => 'Customer Portal Redesign',
                'description' => 'Improved usability and onboarding for a growing B2B customer dashboard.',
                'rating' => 4.9,
            ],
            [
                'project_name' => 'Payment System Optimization',
                'description' => 'Reduced checkout latency and strengthened transaction reporting.',
                'rating' => 4.8,
            ],
            [
                'project_name' => 'Analytics Dashboard Launch',
                'description' => 'Delivered a reporting system for leadership and operational teams.',
                'rating' => 4.7,
            ],
        ];

        foreach (Freelancer::all() as $freelancer) {
            foreach ($projectTemplates as $template) {
                Project::create([
                    'freelancer_id' => $freelancer->id,
                    'project_name' => $template['project_name'],
                    'description' => $template['description'],
                    'rating' => $template['rating'],
                ]);
            }
        }
    }
}
