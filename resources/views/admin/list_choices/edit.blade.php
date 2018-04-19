@extends('layouts.app')
@section('pag_title', 'Alternativa - Editar')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar alternativas' => route('list_choices.index'), 'Editar alternativa' ))!!}
@endsection

@section('h5-title')
     <h5>Editar alternativa</h5>
@endsection

@section('content')

    {!!
    form($form->add('edit','submit', [
        'attr' => ['class' => 'btn btn-sm btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Salvar'
    ]))
    !!}

@endsection