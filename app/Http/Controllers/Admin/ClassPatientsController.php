<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassPatientRequest;
use App\Models\Painel\ClassInformation;
use App\Models\Painel\Patient;

class ClassPatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ClassInformation $class_information)
    {
        if(!$request->ajax()) {
            return view('admin.class_informations.class_patient', compact('class_information'));
        }else{
            return $class_information->patients()->get();
        }
    }


    public function store(ClassPatientRequest $request,ClassInformation $class_information)
    {
        $patient = Patient::find($request->get('patient_id'));
        $class_information->patients()->save($patient);
        return $patient;
    }

    public function destroy(ClassInformation $class_information, Patient $patient)
    {
        $class_information->patients()->detach([$patient->id]);
        return response()->json([],204); //status code - no content, ou seja, informa que a operação requisitada aconteceu com sucesso, mas não têm nenhum conteúdo para ser mostrado
    }
}
