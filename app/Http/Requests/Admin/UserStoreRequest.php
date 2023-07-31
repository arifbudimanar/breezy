<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => ['required', Rules\Password::defaults()],
        ];
    }
}
