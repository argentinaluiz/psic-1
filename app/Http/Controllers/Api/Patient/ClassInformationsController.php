<?php

namespace App\Http\Controllers\Api\Patient;

use App\Http\Controllers\Controller;
use App\Models\Painel\ClassInformation;

class ClassInformationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient = \Auth::user()->userable;
        $results = $patient->classInformations;
        /*$results = ClassInformation
            ::byStudent(\Auth::user()->userable->id)
            ->get();*/

        return $results;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = \Auth::user()->userable;
        $result = $patient->classInformations()->findOrFail($id);
        /*$result = ClassInformation
            ::byStudent(\Auth::user()->userable->id)
            ->findOrFail($id);*/
        return $result;
    }
}
