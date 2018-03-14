<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Psychoanalyst extends Model
{
    public function user(){
        return $this->morphOne(\App\User::class,'userable');
      }
}
