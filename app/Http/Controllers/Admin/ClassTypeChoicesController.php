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
        return view('admin.class_informations.class_type_choice', compact('class_information'));
    }

    
    public function store(ClassTypeChoiceRequest $request,ClassInformation $class_information)
    {
        //
    }

   
    public function destroy(ClassInformation $class_information, TypeChoice $type_choice)
    {
        //
    }
}
