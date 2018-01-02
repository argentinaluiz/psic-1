<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    
    public function cities()
    {
        return $this->hasMany(City::class);
    }




}
