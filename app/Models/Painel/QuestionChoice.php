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

    public function typeChoices()
    {
        return $this->belongsToMany(TypeChoice::class);//quando estou trabalhando com uma tabela pivot, o método correto é o belongsToMany
    }

}
