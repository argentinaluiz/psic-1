<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class QuestionEssay extends Model
{
    protected $fillable = [
        'text',
        'question_id'
    ];

    public function question(){
        return $this->morphOne(\App\Models\Painel\Question::class, 'questionable');
    }
}
