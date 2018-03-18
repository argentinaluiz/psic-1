<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassPatientRequest;
use App\Http\Requests\ClassMeetingRequest;
use App\Models\Painel\ClassInformation;
use App\Models\Painel\ClassMeeting;
use App\Models\Painel\Patient;

class ClassMeetingsController extends Controller
{
    public function index(Request $request,ClassInformation $class_information)
    {
        if(!$request->ajax()) {
            return view('admin.class_informations.class_meeting', compact('class_information'));
        }else{
            return $class_information->meetings()->get();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassMeetingRequest $request,ClassInformation $class_information)
    {
        $meeting = $class_information->meetings()->create([
            'subject_id' => $request->get('subject_id'),
            'psychoanalyst_id' => $request->get('psychoanalyst_id'),
        ]);
        return $meeting;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassInformation $class_information, ClassMeeting $meeting)
    {
        $meeting->delete();
        return response()->json([],204); //status code - no content
    }
}
