<?php

namespace App\Http\Requests\FoodCategory;

use Illuminate\Foundation\Http\FormRequest;

class FoodCatCreateRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:10',
            'rest_cat' => 'required|string|Restaurant_type_id',
        ];
    }
}
