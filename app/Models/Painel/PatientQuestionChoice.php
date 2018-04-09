<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class PatientQuestionChoice extends Model
{
    protected $fillable = [
        'question_id',
        'question_choice_id'
        //não precisa do patient_class_test_id, porque as escolhas serão a partir do Model PatientClassTest
    ];
}
