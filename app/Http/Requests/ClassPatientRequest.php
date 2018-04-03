<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassPatientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $class_information = $this->route('class_information');
        return [
            'patient_id' => [
                'required',
                'exists:patients,id',
                Rule::unique('class_information_patient','patient_id')
                ->where('class_information_id',$class_information->id)
            ]
        ];
    }
}
