<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class PatientClassTest extends Model
{
    protected $fillable = [
        'class_test_id',
        'patient_id'
        //a pontuação será calculada, não é algo acessível
    ];

    public function classTest(){
        return $this->belongsTo(ClassTest::class);
    }

    public function patient(){//relacionamento de muitos para um
        return $this->belongsTo(Patient::class);
    }

    public function choices(){
        return $this->hasMany(PatientQuestionChoice::class);
    }

    public static function createFully(array $data){
        $patientClassTest = parent::create($data);
        foreach ($data['choices'] as $choice){
            //question_id and question_choice_id
            $patientClassTest->choices()->create($choice);
        }
        $patientClassTest->point = self::calculatePoint($patientClassTest);
        $patientClassTest->save();
        return $patientClassTest;
    }

    public static function calculatePoint(PatientClassTest $patientClassTest){
        $questions = $patientClassTest->classTest->questions;
        $patientChoices = $patientClassTest->choices;
        $point = 0;
        foreach ($questions as $question){
            $patientChoice = $patientChoices->where('question_id',$question->id)->first();
            if($patientChoice){
                $choiceTrue = $question->choices()->where('true',true)->first();
                $point += $choiceTrue->id == $patientChoice->question_choice_id
                    ?(float)$question->point:0;
            }
        }
        return $point;
    }

}
