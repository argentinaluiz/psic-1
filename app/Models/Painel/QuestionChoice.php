<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class QuestionChoice extends Model
{
    protected $fillable = [
        'choice',
        'true',
        'question_id'
    ];

    public function question(){
        return $this->morphOne(\App\Models\Painel\Question::class, 'questionable');
    }

}
