<?php

namespace App\Http\Controllers\Api\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassMeetingsController extends Controller
{
    public function index(ClassInformation $classInformation)
    {
        $patient = \Auth::user()->userable;
        $results = $patient
            ->classInformations()
            ->find($classInformation->id)
            ->meetings;

        return $results;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ClassInformation $classInformation, $id)
    {
        $patient = \Auth::user()->userable;
        $result = $patient
            ->classInformations()
            ->find($classInformation->id)
            ->meetings()
            ->findOrFail($id);

        return $result;
    }
}
