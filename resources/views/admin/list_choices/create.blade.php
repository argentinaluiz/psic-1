@extends('layouts.app')
@section('pag_title', 'Alternativa - Criar')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar alternativas' => route('list_choices.index'), 'Nova alternativa' ))!!}
@endsection

@section('h5-title')
     <h5>Nova alternativa</h5>
@endsection

@section('content')
   
    {!!
    form($form->add('insert','submit', [
        'attr' => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Inserir'
    ]))
    !!}

@endsection