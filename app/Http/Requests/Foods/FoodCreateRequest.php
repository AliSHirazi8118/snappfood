<?php

namespace App\Http\Requests\Foods;

use Illuminate\Foundation\Http\FormRequest;

class FoodCreateRequest extends FormRequest
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
                'name' => 'required|string|min:2|max:30',
                'price' => 'required',
                'food_cat' => 'required|Food_type',
                'photo' => 'mimes:png,jpg'
        ];
    }
}
