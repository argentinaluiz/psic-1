<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Painel\ClassMeeting;


class ClassTestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $classMeeting = $this->route('class_meeting');
        $result = classMeeting
            ::where('psychoanalyst_id',\Auth::user()->userable->id)
            ->find($classMeeting->id);

        return $result != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'date_start' => 'required|date_format:Y-m-d\TH:i',
            'date_end' => 'required|date_format:Y-m-d\TH:i',
            'questions' => 'required|array',
            'questions.*.question' => 'required',
            'questions.*.point' => 'required|numeric',
            'questions.*.choices' => 'required|array|choice_true', //defino essa regra no app\Providers\AppServiceProvider
            'questions.*.choices.*.choice' => 'required',
        ];
    }
}
