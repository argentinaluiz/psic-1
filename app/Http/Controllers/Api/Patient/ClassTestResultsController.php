<?php

namespace App\Http\Controllers\Api\Patient;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassTestResultsController extends Controller
{
    public function perSubject(Request $request) //?class_meetings=120
    {
        $sumClassTestPoints = "(select sum(`point`) from questions where questions.class_test_id = class_tests.id)";
        $selects = [
            'patient_class_tests.created_at',
            "(patient_class_tests.`point`/$sumClassTestPoints)*100 as percentage"
        ];
        //permite que vc crie a query mais próxima do banco de dados
        $results = \DB::table('patient_class_tests')
            ->selectRaw(implode(',', $selects))
            ->join('class_tests', 'class_tests.id', '=', 'patient_class_tests.class_test_id')
            //->join('class_meetings','class_meetings.id','=','class_tests.class_meeting_id')
            //->join('subjects','subjects.id','=','class_meetings.subject_id')
            ->where('patient_id', \Auth::user()->userable->id)
            ->where('class_tests.class_meeting_id','class_meetings.id')
           // ->where('patient_id', 15)
           // ->where('class_tests.class_meeting_id',245)
            ->orderBy('patient_class_tests.created_at', 'asc')
            ->get();
        $results->map(function ($item) { //\stdClass - acessamos as informações como se fossem uma propriedade do objeto
            $item->created_at = (new Carbon($item->created_at))->format(Carbon::ISO8601);
            return $item;
        });
        return $results;
    }



}
