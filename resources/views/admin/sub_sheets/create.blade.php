@extends('layouts.app')
@section('pag_title', 'Criar Sub Ficha')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar sub fichas' => route('sub_sheets.index'), 'Nova sub ficha' ))!!}
@endsection

@section('h5-title')
     <h5>Nova sub ficha</h5>
@endsection

@section('content')
   
    {!!
    form($form->add('insert','submit', [
        'attr' => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Inserir'
    ]))
    !!}

@endsection