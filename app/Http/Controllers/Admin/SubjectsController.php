<?php

namespace App\Http\Controllers\Admin;

use Kris\LaravelFormBuilder\Form;
use App\Forms\SubjectForm;
use App\Models\Painel\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalSubjects = Subject::count();
        $subjects = Subject::paginate(10);
        return view('admin.subjects.index',compact('subjects', 'totalSubjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(SubjectForm::class, [
            'url' => route('subjects.store'),
            'method' => 'POST'
        ]);
        return view('admin.subjects.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** @var Form $form */
        $form = \FormBuilder::create(SubjectForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        Subject::create($data);
        $request->session()->flash('message','Disciplina criada com sucesso');
        return redirect()->route('subjects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \SON\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return view('admin.subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SON\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $form = \FormBuilder::create(SubjectForm::class, [
            'url' => route('subjects.update',['subject' => $subject->id]),
            'method' => 'PUT',
            'model' => $subject
        ]);

        return view('admin.subjects.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \SON\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Subject $subject)
    {
        /** @var Form $form */
        $form = \FormBuilder::create(SubjectForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $subject->update($data);
        session()->flash('message','Patologia editada com sucesso');
        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SON\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        session()->flash('message','Patologia excluída com sucesso');
        return redirect()->route('subjects.index');
    }
}