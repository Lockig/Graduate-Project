<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'profile_avatar' => 'nullable',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'date_of_birth' => 'nullable',
            'mobile_number' => 'nullable',
            'email' => 'required|string'
            //
        ];
    }
}
