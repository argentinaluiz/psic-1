<?php

namespace App\Http\Controllers\Api\Psychoanalyst;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassTestRequest;
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

    public function store(ClassTestRequest $request, ClassMeeting $classMeeting)
    {
        return ClassTest::createFully($request->all()+['class_meeting_id' => $classMeeting->id]);
    }

    public function update(ClassTestRequest $request,ClassMeeting $classMeeting,ClassTest $classTest)
    {
        return $classTest->updateFully($request->all());
    }

    public function show(ClassMeeting $classMeeting, $id)
    {
        $result = ClassTest
            ::byPsychoanalyst(\Auth::user()->userable->id)
            ->findOrFail($id);
        $array = $result->toArray();
        $array['questions'] = $result->questions;
        return $result;
    }

    public function destroy(ClassMeeting $classMeeting, $classTestId)
    {
        $classTest = ClassTest
            ::byPsychoanalyst(\Auth::user()->userable->id)
            ->findOrFail($classTestId);
        $classTest->deleteFully();
        return response()->json([],204);
    }
}
