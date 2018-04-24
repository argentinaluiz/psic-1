<?php

namespace App\Models\Painel;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class TypeChoice extends Model implements TableInterface
{
    
    protected $fillable = [
        'name'
    ];

    public function list_choices()
    {
    return $this->hasMany(ListChoice::class);
    }

    public function choosings()
    {
    return $this->hasMany(ClassChoosing::class);
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
