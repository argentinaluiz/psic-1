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


    public function toArray()
    {
        $data = parent::toArray();
        $this->question->makeHidden('questionable_type','questionable_id');
        $data['question'] = $this->question;
        return $data;
    }


}
