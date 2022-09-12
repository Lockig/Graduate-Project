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
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'date_of_birth'=>'date|date_format:m/d/Y',
            'mobile_number'=>'string|max:10',
            'email'=>'string|unique:users',
            'avatar'=>'image|nullable|mimes:jpg,png,jpeg|max:10000'
            //
        ];
    }
}
