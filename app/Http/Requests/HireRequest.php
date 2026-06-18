<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HireRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'job_title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'duration' => ['required', 'string', 'max:255'],
        ];
    }
}
