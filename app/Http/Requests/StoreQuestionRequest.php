<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'title' => ['required'],
            'chooses' => ['required'],
            'answer' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'من فضلك أدخل عنوان السؤال',
            'title.required' => 'من فضلك أدخل عنوان السؤال',
            'chooses.required' => 'من فضلك أدخل اختيارات السؤال',
            'answer.required' => 'من فضلك أدخل الاجابة الصحيحة للسؤال',
        ];
    }
}
