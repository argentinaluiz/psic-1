<?php
namespace App\Models\Painel;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class ClassInformation extends Model implements TableInterface
{
    
   
    protected $fillable = [
        'date_start',
        'date_end',
        'name',
        'semester',
        'year'
    ];

    protected $dates = [
        'date_start', //Carbon wrapper \DateTime
        'date_end'
    ];

    public function patients()
    {
        return $this->belongsToMany(Patient::class);//quando estou trabalhando com uma tabela pivot, o método correto é o belongsToMany
    }

    public function typeChoices()
    {
        return $this->belongsToMany(TypeChoice::class);
    }

    public function meetings()
    {
        return $this->hasMany(ClassMeeting::class);//não é um relacionamento com uma tabela pivot. Cada classe tem muitas sessões relacionadas
    }

    public function scopeByPsychoanalyst($query, $psychoanalystId)
    {
        return $query->whereHas('meetings', function ($query) use($psychoanalystId){
            $query->where('psychoanalyst_id', $psychoanalystId);
        });
    }

    public function scopeByPatient($query, $patientId)
    {
        return $query->whereHas('patients', function ($query) use($patientId){
            $query->where('patient_id', $patientId);
        });
    }

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return [
            'ID',
            'Data Início',
            'Data Fim',
            'Categoria',
            'Semestre',
            'Ano'
        ];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'ID':
                return $this->id;
            case 'Data Início':
                return $this->date_start->format('d/m/Y'); //Carbon
            case 'Data Fim':
                return $this->date_end->format('d/m/Y'); 
            case 'Categoria':
                return $this->name;
            case 'Semestre':
                return $this->semester;
            case 'Ano':
                return $this->year;
        }
    }
    
}
