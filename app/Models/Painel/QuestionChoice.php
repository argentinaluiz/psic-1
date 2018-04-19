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

    protected $casts = [
        'true' => 'boolean'
    ];

    public function question(){
        return $this->morphOne(\App\Models\Painel\Question::class, 'questionable');
    }

    public function toArray()
    {
        $data = parent::toArray();
        $this->question->makeHidden('questionable_type','questionable_id');
        $data['question'] = $this->question;
        return $data;
    }

}
