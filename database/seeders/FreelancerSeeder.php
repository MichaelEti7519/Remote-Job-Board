<?php

namespace Database\Seeders;

use App\Models\Freelancer;
use Illuminate\Database\Seeder;

class FreelancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // AI: Generated sample freelancer seed data using ChatGPT
        $freelancers = [
            [
                'name' => 'Avery Patel',
                'title' => 'Senior Laravel Developer',
                'bio' => 'Builds scalable SaaS APIs and internal tools for remote teams.',
                'detailed_bio' => 'Avery is a product-minded backend engineer who specializes in Laravel, API design, and system optimization for growing startups.',
                'skills' => ['Laravel', 'PHP', 'MySQL', 'API Design', 'Docker'],
                'hourly_rate' => 75,
                'rating' => 4.9,
                'jobs_completed' => 128,
                'success_rate' => 98.5,
                'earnings' => 320000,
            ],
            [
                'name' => 'Jordan Lee',
                'title' => 'Full-Stack React Developer',
                'bio' => 'Creates polished dashboards and fast user experiences.',
                'detailed_bio' => 'Jordan works closely with product teams to turn prototypes into high-converting frontend experiences backed by reliable APIs.',
                'skills' => ['React', 'TypeScript', 'Node.js', 'Tailwind', 'UX'],
                'hourly_rate' => 68,
                'rating' => 4.8,
                'jobs_completed' => 98,
                'success_rate' => 97.2,
                'earnings' => 245000,
            ],
            [
                'name' => 'Maya Thompson',
                'title' => 'DevOps & Cloud Engineer',
                'bio' => 'Improves deployment workflows and cloud infrastructure reliability.',
                'detailed_bio' => 'Maya helps teams design resilient CI/CD pipelines, cloud architecture, and observability practices for mission-critical applications.',
                'skills' => ['AWS', 'Docker', 'CI/CD', 'Linux', 'Terraform'],
                'hourly_rate' => 82,
                'rating' => 4.9,
                'jobs_completed' => 112,
                'success_rate' => 99.0,
                'earnings' => 365000,
            ],
            [
                'name' => 'Noah Brooks',
                'title' => 'UI/UX Designer',
                'bio' => 'Designs conversion-focused interfaces for modern SaaS platforms.',
                'detailed_bio' => 'Noah specializes in user research, design systems, and interactive prototypes that help teams launch confidently.',
                'skills' => ['Figma', 'Design Systems', 'Prototyping', 'Research', 'Accessibility'],
                'hourly_rate' => 58,
                'rating' => 4.7,
                'jobs_completed' => 84,
                'success_rate' => 96.8,
                'earnings' => 180000,
            ],
            [
                'name' => 'Sofia Nguyen',
                'title' => 'Data Engineer',
                'bio' => 'Builds reliable analytics pipelines and reporting systems.',
                'detailed_bio' => 'Sofia works across data ingestion, data modeling, and BI tooling to help businesses turn raw data into actionable insights.',
                'skills' => ['Python', 'SQL', 'ETL', 'Airflow', 'Analytics'],
                'hourly_rate' => 70,
                'rating' => 4.8,
                'jobs_completed' => 91,
                'success_rate' => 97.9,
                'earnings' => 230000,
            ],
            [
                'name' => 'Ethan Martinez',
                'title' => 'Mobile App Developer',
                'bio' => 'Builds fast and intuitive cross-platform mobile experiences.',
                'detailed_bio' => 'Ethan builds mobile products from concept to launch, with a strong focus on performance, accessibility, and maintainable code.',
                'skills' => ['Flutter', 'React Native', 'Swift', 'Kotlin', 'Mobile UX'],
                'hourly_rate' => 64,
                'rating' => 4.6,
                'jobs_completed' => 76,
                'success_rate' => 96.4,
                'earnings' => 175000,
            ],
            [
                'name' => 'Isabella Chen',
                'title' => 'QA Automation Engineer',
                'bio' => 'Creates robust test suites that improve product quality.',
                'detailed_bio' => 'Isabella specializes in automated testing strategies that combine unit, integration, and end-to-end coverage for fast-moving teams.',
                'skills' => ['Playwright', 'Cypress', 'PHPUnit', 'Testing', 'CI/CD'],
                'hourly_rate' => 55,
                'rating' => 4.7,
                'jobs_completed' => 69,
                'success_rate' => 97.1,
                'earnings' => 152000,
            ],
            [
                'name' => 'Liam Foster',
                'title' => 'Backend Python Engineer',
                'bio' => 'Designs APIs and data services for analytics platforms.',
                'detailed_bio' => 'Liam has a strong background in Python, distributed systems, and event-driven architecture for modern data-intensive products.',
                'skills' => ['Python', 'FastAPI', 'PostgreSQL', 'Redis', 'Microservices'],
                'hourly_rate' => 73,
                'rating' => 4.8,
                'jobs_completed' => 88,
                'success_rate' => 98.1,
                'earnings' => 240000,
            ],
            [
                'name' => 'Chloe Davis',
                'title' => 'Content Strategist',
                'bio' => 'Builds content systems that support product launches and growth.',
                'detailed_bio' => 'Chloe combines content strategy, SEO expertise, and analytics to create messaging that increases engagement and conversions.',
                'skills' => ['SEO', 'Content Strategy', 'Copywriting', 'Analytics', 'Branding'],
                'hourly_rate' => 49,
                'rating' => 4.5,
                'jobs_completed' => 57,
                'success_rate' => 95.7,
                'earnings' => 130000,
            ],
            [
                'name' => 'Henry Kim',
                'title' => 'Security Engineer',
                'bio' => 'Protects digital products through secure architecture reviews.',
                'detailed_bio' => 'Henry focuses on authentication, compliance, and proactive threat modeling for teams shipping sensitive software.',
                'skills' => ['Security Audits', 'OAuth', 'DevSecOps', 'Linux', 'Monitoring'],
                'hourly_rate' => 90,
                'rating' => 5.0,
                'jobs_completed' => 104,
                'success_rate' => 99.4,
                'earnings' => 410000,
            ],
        ];

        foreach ($freelancers as $freelancer) {
            Freelancer::create($freelancer);
        }
    }
}
