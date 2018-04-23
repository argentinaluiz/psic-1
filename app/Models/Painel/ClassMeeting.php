<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class ClassMeeting extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'subject_id',
        'class_information_id',
        'sheet_id',
        'sub_sheet_id',
        'psychoanalyst_id'
    ];

    public function classTests(){
        return $this->hasMany(ClassTest::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function sheet(){
        return $this->belongsTo(Sheet::class);
    }

    public function subSheet(){
        return $this->belongsTo(SubSheet::class);
    }

    public function classInformation(){
        return $this->belongsTo(ClassInformation::class);
    }

    public function psychoanalyst(){
        return $this->belongsTo(Psychoanalyst::class);
    }
    /*
    Por padrão, o Eloquent não retornará todos os dados que queremos. Ao pesquisar a classe, o Eloquent traz as chaves primárias mas, não traz os valores dos campos de cada model relacionado para que possamos renderizar a view.
    Isso quer dizer que teremos o id do psicanalista no relacionamento mas não teremos acesso ao nome do mesmo, por exemplo. Por isso, chamamos a função toArray.
    */
    public function toArray()
    {
        $data = parent::toArray();
        $data['psychoanalyst'] = $this->psychoanalyst;
        $data['subject'] = $this->subject;
        $data['sheet'] = $this->sheet;
        $data['sub_sheet'] = $this->subSheet;
        $data['class_information'] = $this->classInformation;
        return $data;
    }
}
