<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileEditRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
					'name' => ['required', 'max:40'],
					'insurance_company' => 'max:60',
					'family_structure' => 'max:190',
					'home' => 'integer',
					'pref' => 'max:60',
					'image' => ['image', 'mimes:jpeg,png', 'max:2048']
        ];
    }
}
