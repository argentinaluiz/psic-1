<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use Kris\LaravelFormBuilder\Form;
use App\Forms\SpecialtyForm;
use App\Models\Painel\Specialty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialtiesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('specialties-view')){
            abort(403,"Não autorizado!");
        }

        $totalSpecialties = Specialty::count();
        $specialties = Specialty::paginate(10);
        return view('admin.specialties.index',compact('specialties', 'totalSpecialties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('specialties-create')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(SpecialtyForm::class, [
            'url' => route('specialties.store'),
            'method' => 'POST'
        ]);
        return view('admin.specialties.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::denies('specialties-create')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(SpecialtyForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        Specialty::create($data);
        $request->session()->flash('message','Especialidade criada com sucesso');
        return redirect()->route('specialties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Painel\Specialty
     * @return \Illuminate\Http\Response
     */
    public function show(Specialty $specialty)
    {
        if(Gate::denies('specialties-view')){
            abort(403,"Não autorizado!");
        }

        return view('admin.specialties.show', compact('specialty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Painel\Specialty
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialty $specialty)
    {
        if(Gate::denies('specialties-edit')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(SpecialtyForm::class, [
            'url' => route('specialties.update',['specialty' => $specialty->id]),
            'method' => 'PUT',
            'model' => $specialty
        ]);

        return view('admin.specialties.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Painel\Specialty
     * @return \Illuminate\Http\Response
     */
    public function update(Specialty $specialty)
    {
        if(Gate::denies('specialties-edit')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(SpecialtyForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $specialty->update($data);
        session()->flash('message','Especialidade editada com sucesso');
        return redirect()->route('specialties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Painel\Specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialty $specialty)
    {
        if(Gate::denies('specialties-delete')){
            abort(403,"Não autorizado!");
        }

        $specialty->delete();
        session()->flash('message','Especialidade excluída com sucesso');
        return redirect()->route('specialties.index');
    }
}
