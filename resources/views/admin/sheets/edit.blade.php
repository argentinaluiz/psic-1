@extends('layouts.app')
@section('pag_title', 'Ficha - Editar')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar fichas' => route('sheets.index'), 'Editar ficha' ))!!}
@endsection

@section('h5-title')
     <h5>Editar ficha</h5>
@endsection

@section('content')

    {!!
    form($form->add('edit','submit', [
        'attr' => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Salvar'
    ]))
    !!}

@endsection