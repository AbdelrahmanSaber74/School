<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionsRequesr extends FormRequest
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

    public function rules()
    {
        return [
            'name_section_ar' => 'required|unique:Sections,name_section_ar,'.$this->id,
            'name_section_en' => 'required|unique:Sections,name_section_en,'.$this->id,
            'grade_id' => 'required',
            'class_id' => 'required',

        ];
    }

    public function messages()
{
    return [
        'name_section_ar.required' => __('validation.required') ,
        'name_section_en.required' => __('validation.required') ,
        'grade_id.unique' => __('validation.unique') ,
        'class_id.unique' => __('validation.unique') ,

    ];
 }
}
