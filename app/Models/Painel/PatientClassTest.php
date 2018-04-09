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




}
