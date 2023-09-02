<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLessonRequest extends FormRequest
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
            "date_show"=>["required"],
            "title"=>["required","string"],
        ];
    }

    public function messages(){
        return [
            "date_show.requird"=>"أدخل ميعاد عرض الفيديو",
            "title.requird"=>"أدخل عنوان للفيديو",
            "title.string"=>"أدخل عنوان صالح للفيديو"
        ];
    }
}
