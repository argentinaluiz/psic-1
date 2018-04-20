<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassTypeChoiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $class_information = $this->route('class_information');
        return [
            'type_choice_id' => [
                'required',
                'exists:type_choices,id',
                Rule::unique('class_information_type_choice','type_choice_id')
                ->where('class_information_id',$class_information->id)
            ]
        ];
    }
}
