<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolGradeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'من فضلك أدخل عنوان الصف الدراسى',
        ];
    }
}
