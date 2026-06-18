# Remote Job Board API

This backend provides employer-facing endpoints for browsing freelancers, viewing freelancer details, creating hire requests, and confirming simulated payments.

## Features

- List freelancers with pagination and search
- View freelancer detail with projects and statistics
- Create hire records with simulated payment calculation
- Confirm payment status

## Database Schema

### freelancers
- id
- name
- title
- bio
- detailed_bio
- skills (JSON)
- hourly_rate
- rating
- jobs_completed
- success_rate
- earnings

### projects
- id
- freelancer_id
- project_name
- description
- rating

### hires
- id
- freelancer_id
- job_title
- description
- duration
- amount
- status (pending, paid)

## Setup

1. Install PHP 8.2+ and Composer.
2. Copy the environment file:
   ```bash
   cp .env.example .env
   ```
3. Configure your MySQL connection in `.env`.
4. Install dependencies:
   ```bash
   composer install
   ```
5. Generate an application key:
   ```bash
   php artisan key:generate
   ```

## Migration Commands

```bash
php artisan migrate
php artisan migrate:fresh --seed
```

## Seeder Commands

```bash
php artisan db:seed
```

## API Examples

### List freelancers
```bash
GET /api/freelancers
```

### Search freelancers by name or skill
```bash
GET /api/freelancers?search=laravel
```

### Get freelancer details
```bash
GET /api/freelancers/1
```

### Hire freelancer
```bash
POST /api/hire/1
Content-Type: application/json

{
  "job_title": "Laravel API Development",
  "description": "Build a new backend for a SaaS dashboard.",
  "duration": "4 weeks"
}
```

### Confirm payment
```bash
POST /api/payment/1/confirm
```

## Environment Variables

```env
APP_NAME=RemoteJobBoard
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=remote_job_board
DB_USERNAME=root
DB_PASSWORD=
```

## Railway Deployment

1. Create a new Railway project.
2. Add a MySQL service and connect it to the app.
3. Set the environment variables shown above.
4. Configure the app to run the following command:
   ```bash
   php artisan migrate --force && php artisan db:seed --force
   ```
5. Deploy the repository.

## Dummy Data Assumptions

The sample freelancer records were created to represent realistic remote professionals across design, development, cloud, QA, and data roles. The data assumptions include:

- Each freelancer has a believable title, short bio, and skill set for a remote hiring platform.
- Project history is fictional but modeled to look like real portfolio work.
- Hourly rates and ratings are representative placeholders used to test the hiring flow.
- Hire durations and job descriptions are sample content for UI and API validation.

## AI Prompts Used

1. "Generate realistic freelancer profiles, skills, bios, and past project examples for a remote job board platform."
2. "Create a Laravel 11 employer hiring flow with endpoints for listing freelancers, viewing details, creating hires, and confirming simulated payments."

## What I Learned Using AI

AI was especially useful for shaping realistic seed data and quickly structuring the backend flow, but the final logic and validation still needed manual review to match the exact requirements.

## Notes

- Authentication is intentionally not included.
- Payments are simulated and do not use third-party payment providers.
- A real public deployment URL is not available from this environment yet; once the repo is connected to Railway, the app can be deployed using the steps above.
