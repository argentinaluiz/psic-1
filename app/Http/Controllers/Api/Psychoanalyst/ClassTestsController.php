<?php

namespace App\Http\Controllers\Api\Psychoanalyst;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\ClassTest;
use App\Models\Painel\ClassMeeting;

class ClassTestsController extends Controller
{

    public function index(ClassMeeting $classMeeting)
    {
        $results = ClassTest
            ::where('class_meeting_id', $classMeeting->id)
            ->byPsychoanalyst(\Auth::user()->userable->id)
            ->get();
        return $results;
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, ClassTest $classTest)
    {
        //
    }

    public function show(ClassMeeting $classMeeting, $id)
    {
        $result = ClassTest
            ::byPsychoanalyst(\Auth::user()->userable->id)
            ->findOrFail($id);
        return $result;
    }

    public function destroy(ClassTest $classTest)
    {
        //
    }
}
