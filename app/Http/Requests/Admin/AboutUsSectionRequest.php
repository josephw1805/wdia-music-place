<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['nullable', 'image', 'max:3000'],
            'video_image' => ['nullable', 'image', 'max:3000'],
            'round_text' => ['nullable', 'string', 'max:255'],
            'subscriber_count' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:255'],
            'video_url' => ['nullable', 'string', 'max:255'],
        ];
    }
}
