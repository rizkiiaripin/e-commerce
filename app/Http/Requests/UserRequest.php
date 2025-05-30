<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $userId = $this->route('user')?->id;
        return [
            'name' => 'required',
            'username' => 'required|unique:users,username'.($userId ? ",$userId": ''),
            'email' => 'required|email|unique:users,email'.($userId ? ",$userId": ''),
            'current_password' => ['current_password','nullable'] ?? '',
            'password' => ['nullable',Password::defaults(),],
        ];
    }
}
