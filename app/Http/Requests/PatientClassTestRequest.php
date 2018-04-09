<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Painel\ClassMeeting;

class PatientClassTestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $classTest = $this->route('class_test');
        $result = ClassTest
            ::byPatient(\Auth::user()->userable->id)
            ->find($classTest->id);

        return $result != null;
    }
    //Dessa forma conseguimos formatar os dados da requisição
    protected function validationData()
    {
        $classTest = $this->route('class_test');
        $data = [
            'class_test_id' => $classTest->id,
            'date_end' => $classTest->date_end,
            'date' => (new Carbon())->format(\DateTime::ISO8601)
        ];
         /**
         * choices é recebido assim:
         * choices => [question_id => question_choice_id]
         * vai complicar na validação, porque seria necessário validar a chave do array. Será desmembrado a chave e o valor
         */
        $choices = $this->get('choices');
        $data['choices'] = $choices;
        if(is_array($choices)){
            $data['choices'] = [];
            foreach ($choices as $questionId => $choiceId){
                array_push($data['choices'],[
                    'question_id' => $questionId,
                    'question_choice_id' => $choiceId
                ]);
            }
            $this->merge($data);
        }
        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $classTest = $this->route('class_test');
        return [
            //O paciente só pode responder uma única vez
            'class_test_id' => [
                Rule::unique('patient_class_tests')
                ->where('patient_id',\Auth::user()->userable->id)
            ],
            //'date' => 'after_or_equal:date_start|before_or_equal:date_end',
            'date' => 'before_or_equal:date_end',
            'choices' => 'required|array',
            'choices.*.question_id' => [
                'required',
                Rule::exists('questions','id')
                    ->where('class_test_id',$classTest->id)
            ],
            //Cria-se uma regra de validação personalizada no app\Providers\AppServiceProvider
            'choices.*.question_choice_id' => 'required|choice_from_question'
        ];
    }
}
