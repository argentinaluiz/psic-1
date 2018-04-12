<?php

namespace App\Http\Controllers\Api\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\ClassMeeting;
use App\Models\Painel\ClassTest;
use App\Models\Painel\PatientClassTest;

class ClassTestsController extends Controller
{
   
    public function index(ClassMeeting $classMeeting)
    {
        $patientId = \Auth::user()->userable->id;
        $results = ClassTest
            ::where('class_meeting_id',$classMeeting->id)
            ->byPatient(\Auth::user()->userable->id)
            ->get();
        $results = array_map(function($classTest) use($patientId){
            $patientClassTest = PatientClassTest
                ::where('class_test_id',$classTest['id'])
                ->where('patient_id',$patientId)
                ->first();
            if($patientClassTest){
                $classTest['patient_class_test']['id'] = $patientClassTest->id;
                if(ClassTest::greatherDateEnd30Minutes($classTest['date_end'])){
                    $classTest['patient_class_test']['point'] = $patientClassTest->point;
                }
            }
            return $classTest;
        },$results->toArray());
        return $results;
    }

    public function show(ClassMeeting $classMeeting, $id)
    {
        $result = ClassTest
            ::byPatient(\Auth::user()->userable->id)
            ->findOrFail($id);

        $array = $result->toArray();

        $array['questions'] = array_map(function ($question) use($array) {
           // dd($array['date_end']);
           
            if(!ClassTest::greatherDateEnd30Minutes($array['date_end'])) {
                $question['choices'] = array_map(function ($choice) use ($array){
                    unset($choice['true']);
                    return $choice;
                }, $question['choices']->toArray());
            }
            return $question;
        }, $result->questions->toArray());

        return $array;
    }   
}
