<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HeroRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'label' => ['nullable', 'max:255', 'string'],
            'title' => ['required', 'max:255', 'string'],
            'subtitle' => ['required', 'max:255', 'string'],
            'button_text' => ['nullable', 'max:255', 'string'],
            'button_url' => ['nullable', 'max:255', 'string'],
            'video_button_text' => ['nullable', 'max:255', 'string'],
            'video_button_url' => ['nullable', 'max:255', 'string'],
            'banner_item_title' => ['nullable', 'max:255', 'string'],
            'banner_item_subtitle' => ['nullable', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:3000'],
            'round_text' => ['nullable', 'max:255', 'string']
        ];
    }
}
