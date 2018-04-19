@extends('layouts.app')
@section('pag_title', 'Tipo de alternativa - Criar')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar tipos de alternativas' => route('type_choices.index'), 'Novo tipo de alternativa' ))!!}
@endsection

@section('h5-title')
     <h5>Novo tipo de alternativa</h5>
@endsection

@section('content')
   
    {!!
    form($form->add('insert','submit', [
        'attr' => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Inserir'
    ]))
    !!}

@endsection