<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question',
        'point',
        'class_test_id'
    ];

    public function choices()
    {
        return $this->hasMany(QuestionChoice::class);
    }
}
