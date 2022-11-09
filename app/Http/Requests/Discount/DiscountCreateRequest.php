<?php

namespace App\Http\Requests\Discount;

use Illuminate\Foundation\Http\FormRequest;

class DiscountCreateRequest extends FormRequest
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
                'code' => 'required|min:6|max:8',
                'discount' => 'required|integer|min:10|max:100',
                'hour' => 'required|integer',
                'day' => 'integer|nullable',
        ];
    }
}
