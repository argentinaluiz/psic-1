@extends('layouts.app')
@section('pag_title', 'Patologia - Editar')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar patologias' => route('subjects.index'), 'Editar patologia' ))!!}
@endsection

@section('h5-title')
     <h5>Editar especialidade</h5>
@endsection

@section('content')

    {!!
    form($form->add('edit','submit', [
        'attr' => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Salvar'
    ]))
    !!}

@endsection