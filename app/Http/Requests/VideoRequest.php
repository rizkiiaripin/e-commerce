<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $video = $this->route('video'); // ini akan mengembalikan model Video dari route binding

        return [
           'video' => $video
            ? 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:204800'
            : 'required|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:204800',
            
            'title' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('videos', 'slug')->ignore($video?->id),
            ],
            'description' => 'nullable|string|max:1000',
        ];
    }
}
