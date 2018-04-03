<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Psychoanalyst extends Model
{
    public function user(){
        return $this->morphOne(\App\User::class,'userable');
    }

    public function toArray()
    {
        $data = parent::toArray();
        $this->user->makeHidden('userable_type','userable_id');
        $data['user'] = $this->user;
        return $data;
    }
}
