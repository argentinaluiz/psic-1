<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function user(){
        return $this->morphOne(\App\User::class,'userable');
    }

    public function classInformations(){
        return $this->belongsToMany(ClassInformation::class);
    }
    
    /*método que converte todo resultado do Eloquent em um array. 
    No método toArray removemos campos desnecessários com o método makeHidden e adicionamos ao array a chave user, que carrega os dados do usuário e inclui no array de retorno.*/
    public function toArray() 
    {
        $data = parent::toArray();
        $this->user->makeHidden('userable_type','userable_id');
        $data['user'] = $this->user; //acrescentar os dados do usuário
        return $data;
    }
}
