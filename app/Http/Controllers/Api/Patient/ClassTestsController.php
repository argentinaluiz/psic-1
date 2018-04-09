<?php

namespace App\Http\Controllers\Api\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\ClassMeeting;
use App\Models\Painel\ClassTest;

class ClassTestsController extends Controller
{
   
    public function index(ClassMeeting $classMeeting)
    {
        $results = ClassTest
            ::where('class_meeting_id',$classMeeting->id)
            ->byPatient(\Auth::user()->userable->id)
            ->get();
        return $results;
    }

    public function show(ClassMeeting $classMeeting, $id)
    {
        $result = ClassTest
            ::byPatient(\Auth::user()->userable->id)
            ->findOrFail($id);

        $array = $result->toArray();

        $array['questions'] = array_map(function ($question) {

                $question['choices'] = array_map(function ($choice){
                    //dd($choice);
                    unset($choice['true']);
                    return $choice;
                }, $question['choices']->toArray());
            return $question;
        }, $result->questions->toArray());

        return $array;
    }   
}
