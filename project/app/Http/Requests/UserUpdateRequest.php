<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'profile_avatar' => 'file',
            'date_of_birth' => 'required|date|date_format:m/d/Y',
            'mobile_number' => 'string|max:10',
            'email' => 'required|string',
            'address'=>'required|string'
            //
        ];
    }
}
