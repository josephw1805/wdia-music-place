<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AlbumCategoryStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['required', 'image', 'max:3000'],
            'name' => ['required', 'string', 'max:255', 'unique:album_categories,name'],
            'icon' => ['required', 'max:3000', 'image'],
            'show_at_trending' => ['boolean'],
            'status' => ['boolean']
        ];
    }
}
