<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'course_name'=>'required|string',
            'teacher_id'=>'required|integer',
            'start_at'=>'required',
            'end_at'=>'required',
            'duration'=>'required',
            'course_description'=>'required|string',
            'course_status'=>'required|integer'
            //
        ];
    }
}
