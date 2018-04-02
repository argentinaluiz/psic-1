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
}
