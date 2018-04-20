<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassTypeChoiceRequest;
use App\Models\Painel\ClassInformation;
use App\Models\Painel\TypeChoice;

class ClassTypeChoicesController extends Controller
{
    
    public function index(Request $request,ClassInformation $class_information)
    {
        if(!$request->ajax()) {
            return view('admin.class_informations.class_type_choice', compact('class_information'));
        }else{
            return $class_information->typeChoices()->get();
        }
    }

    public function store(ClassTypeChoiceRequest $request,ClassInformation $class_information)
    {
        $type_choice = TypeChoice::find($request->get('type_choice_id'));
        $class_information->typeChoices()->save($type_choice);
        return $type_choice;
    }

    public function destroy(ClassInformation $class_information, TypeChoice $type_choice)
    {
        $class_information->typeChoices()->detach([$type_choice->id]);
        return response()->json([],204); //status code - no content
    }
}
