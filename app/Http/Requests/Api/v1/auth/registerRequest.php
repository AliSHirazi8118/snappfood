<?php

namespace App\Http\Requests\Api\v1\auth;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                'name' => 'required|string|min:2|max:50',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:4|max:8'
        ];
    }
}
