@extends('layouts.app')
@section('pag_title', 'Tipo de alternativa - Editar')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar tipos de alternativas' => route('type_choices.index'), 'Editar tipo de alternativa' ))!!}
@endsection

@section('h5-title')
     <h5>Editar tipo de alternativa</h5>
@endsection

@section('content')

    {!!
    form($form->add('edit','submit', [
        'attr' => ['class' => 'btn btn-sm btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Salvar'
    ]))
    !!}

@endsection