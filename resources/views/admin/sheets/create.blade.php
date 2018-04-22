@extends('layouts.app')
@section('pag_title', 'Criar Ficha')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar fichas' => route('sheets.index'), 'Nova ficha' ))!!}
@endsection

@section('h5-title')
     <h5>Nova ficha</h5>
@endsection

@section('content')
   
    {!!
    form($form->add('insert','submit', [
        'attr' => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Inserir'
    ]))
    !!}

@endsection