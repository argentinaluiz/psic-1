<?php

namespace App\Http\Controllers\Api\Psychoanalyst;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\ClassMeeting;

class ClassMeetingsController extends Controller
{
    public function index()
    {
        $results = ClassMeeting
            ::where('psychoanalyst_id', \Auth::user()->userable->id)
            ->get()
            ->toArray();

        return array_map(function ($item) {
            unset($item['psychoanalyst']);
            return $item;
        }, $results);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = ClassMeeting
            ::where('psychoanalyst_id', \Auth::user()->userable->id)
            ->findOrFail($id)
            ->toArray();

        unset($result['psychoanalyst']);
        return $result;
    }
}
