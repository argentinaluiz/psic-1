<?php

namespace App\Models\Painel;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class TypeChoice extends Model implements TableInterface
{
    
    protected $fillable = [
        'name'
    ];


    public function classInformations(){
        return $this->belongsToMany(ClassInformation::class);
    }

    public function listChoices(){
        return $this->belongsToMany(ListChoice::class);
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
