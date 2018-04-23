<?php

namespace App\Models\Painel;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class TypeChoice extends Model implements TableInterface
{
    
    protected $fillable = [
        'name'
    ];

    public function questionChoices(){
        return $this->belongsToMany(QuestionChoice::class);
    }
       
    public function getTableHeaders()
    {
        return ['ID', 'Nome'];
    }

  
    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'ID':
                return $this->id;
            case 'Nome':
                return $this->name;
        }
    }


}
