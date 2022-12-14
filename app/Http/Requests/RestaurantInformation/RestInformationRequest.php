<?php

namespace App\Http\Requests\RestaurantInformation;

use Illuminate\Foundation\Http\FormRequest;

class RestInformationRequest extends FormRequest
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
                'phone' => 'required|string|unique:information_rests|min:10|max:11',
                'account_number' => 'required|string|min:16|max:16',
                'address' => 'required|string|min:15',
                'rest_cat' => 'required|Restaurant_type',
        ];
    }
}
