<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassChoosingRequest;
use App\Models\Painel\ClassChoosing;
use App\Models\Painel\TypeChoice;

class ClassChoosingsController extends Controller
{
    public function index(Request $request,TypeChoice $type_choice)
    {
        if(!$request->ajax()) {
            return view('admin.type_choices.class_choosing', compact('type_choice'));
        }else{
            return $type_choice->choosings()->get();
        }
    }

   public function store(ClassChoosingRequest $request,TypeChoice $type_choice)
    {
        $choosing = $type_choice->choosings()->create([
            'list_choice_id' => $request->get('list_choice_id'),
        ]);
        return $choosing;
    }
    
    public function destroy(TypeChoice $type_choice, ClassChoosing $choosing)
    {
        $choosing->delete();
        return response()->json([],204); //status code - no content
    }
}
