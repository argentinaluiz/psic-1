<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class ClassTest extends Model
{
    protected $fillable = [
        'date_start',
        'date_end',
        'name',
        'class_meeting_id'
    ];

    public function classMeeting()
    {
        return $this->belongsTo(ClassMeeting::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function scopeByPsychoanalyst($query, $psychoanalystId)
    {
        return $query->whereHas('classMeeting', function ($query) use($psychoanalystId){
            $query->where('psychoanalyst_id', $psychoanalystId);
        });
    }

    protected function deleteQuestions()
    {
        foreach ($this->questions()->get() as $question) {
            $question->choices()->delete();//aqui o choices é um método do relacionamento
            $question->delete();
        }
    }

    protected static function createQuestion($question){
        /** @var Question $newQuestion */
        $newQuestion = Question::create($question);
        foreach ($question['choices'] as $choice) {
            $newQuestion->choices()->create($choice);
        }
    }

    public static function createFully(array $data)
    {
        $classTest = self::create($data);
        foreach ($data['questions'] as $question) {
            self::createQuestion($question + ['class_test_id' => $classTest->id]);
        }
        return $classTest;
    }

    public function updateFully(array $data)
    {
        $this->update($data);
        $this->deleteQuestions();
        foreach ($data['questions'] as $question) {
            self::createQuestion($question + ['class_test_id' => $this->id]);
        }
        return $this;
    }

    public function toArray()
    {
        $data = parent::toArray();
        $data['questions'] = $this->questions;
        return $data;
    }


}
