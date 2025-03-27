<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FeatureRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image_one' => ['nullable', 'image', 'max:3000'],
            'image_two' => ['nullable', 'image', 'max:3000'],
            'image_three' => ['nullable', 'image', 'max:3000'],
            'title_one' => ['nullable', 'string', 'max:255'],
            'title_two' => ['nullable', 'string', 'max:255'],
            'title_three' => ['nullable', 'string', 'max:255'],
            'subtotle_one' => ['nullable', 'string', 'max:255'],
            'subtotle_two' => ['nullable', 'string', 'max:255'],
            'subtotle_three' => ['nullable', 'string', 'max:255'],
        ];
    }
}
