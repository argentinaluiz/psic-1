<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class ClassMeeting extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'subject_id',
        'class_information_id',
        'psychoanalyst_id'
    ];

    public function classTests(){
        return $this->hasMany(ClassTest::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
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
        $data['class_information'] = $this->classInformation;
        return $data;
    }
}
