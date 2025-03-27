<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AlbumBasicInfoCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'artist' => ['required', 'integer'],
            'title' => ['required', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'discount' => ['nullable', 'numeric', 'min:0'],
            'thumbnail' => ['required', 'image', 'max:3000'],
            'demo_video_source' => ['nullable']
        ];
    }
}
