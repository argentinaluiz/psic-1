<?php

namespace App\Http\Controllers\Api\Psychoanalyst;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\ClassInformation;

class ClassInformationsController extends Controller
{
    public function index()
    {
        $results = ClassInformation::whereHas('meetings', function ($query){
            $id = \Auth::user()->userable->id;
            $query->where('psychoanalyst_id', $id);
        })->get();

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
        $result = ClassInformation::whereHas('meetings', function ($query){
            $id = \Auth::user()->userable->id;
            $query->where('psychoanalyst_id', $id);
        })->findOrFail($id);
        return $result;
    }
}
