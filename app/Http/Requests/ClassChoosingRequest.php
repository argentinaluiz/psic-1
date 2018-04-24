<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassChoosingRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $type_choice = $this->route('type_choice');
        return [
            'list_choice_id' => [
                'required',
                'exists:list_choices,id',
                Rule::unique('class_choosings','list_choice_id')
                    ->where('type_choice_id',$type_choice->id)
            ]
        ];
    }
}
