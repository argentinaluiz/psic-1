<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class ClassChoosing extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'type_choice_id',
        'list_choice_id'
    ];

    public function typeChoice(){
        return $this->belongsTo(TypeChoice::class);
    }

    public function listChoice(){
        return $this->belongsTo(ListChoice::class);
    }

    public function toArray()
    {
        $data = parent::toArray();
        $data['list_choice'] = $this->listChoice;
        $data['type_choice'] = $this->typeChoice;
        return $data;
    }
}
