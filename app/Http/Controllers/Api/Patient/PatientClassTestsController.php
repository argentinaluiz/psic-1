<?php

namespace App\Http\Controllers\Api\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PatientClassTestRequest;
use App\Models\Painel\ClassTest;
use App\Models\Painel\PatientClassTest;

class PatientClassTestsController extends Controller
{
    public function store(ClassTest $classTest, PatientClassTestRequest $request)
    {
        //se eu usar o $request->all(); irei chamar todos os dados como no original. Como fizemos o merge no PatientClassTestRequest, precisamos usar o $request->input();
        $patientClassTest = PatientClassTest::createFully($request->input() + [
            'patient_id' => \Auth::user()->userable->id
        ]);
    return $patientClassTest;
    }

    public function show(ClassTest $classTest, $id)
    {
        if(!ClassTest::greatherDateEnd30Minutes($classTest->date_end)) {
            abort(403);
        }

        $result = PatientClassTest
            ::where('patient_id', \Auth::user()->userable->id)
            ->findOrFail($id);

        return $result->toArray() + [
                'choices' => $result
                    ->choices
                    ->pluck('question_choice_id', 'question_id')
                    ->toArray()
            ];
    }
}
