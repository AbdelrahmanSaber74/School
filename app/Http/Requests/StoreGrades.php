<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGrades extends FormRequest
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
            'name_ar' => 'required|unique:Grades,name_ar,'.$this->id,
            'name_en' => 'required|unique:Grades,name_en,'.$this->id,

        ];
    }

    public function messages()
{
    return [
        'name_en.required' => __('validation.required') ,
        'name_en.required' => __('validation.required') ,
        'name_ar.unique' => __('validation.unique') ,
        'name_en.unique' => __('validation.unique') ,

    ];
 }
}
