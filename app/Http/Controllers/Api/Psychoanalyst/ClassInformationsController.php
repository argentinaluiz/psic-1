<?php

namespace App\Http\Controllers\Api\Psychoanalyst;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\ClassInformation;

class ClassInformationsController extends Controller
{
    public function index()
    {
        $results = ClassInformation
            ::byPsychoanalyst(\Auth::user()->userable->id)
            ->get();

        return $results;
    }

    public function show($id)
    {
        $result = ClassInformation
            ::byPsychoanalyst(\Auth::user()->userable->id)
            ->findOrFail($id);
        return $result;
    }
}
