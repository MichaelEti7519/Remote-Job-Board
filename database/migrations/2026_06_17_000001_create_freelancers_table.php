<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('freelancers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->text('bio');
            $table->text('detailed_bio');
            $table->json('skills');
            $table->decimal('hourly_rate', 10, 2);
            $table->decimal('rating', 3, 1);
            $table->integer('jobs_completed');
            $table->decimal('success_rate', 5, 2);
            $table->unsignedBigInteger('earnings');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('freelancers');
    }
};
