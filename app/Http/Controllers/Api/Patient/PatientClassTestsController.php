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
        //
    }

}
