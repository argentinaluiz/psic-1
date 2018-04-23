@extends('layouts.app')
@section('pag_title', 'Sub Ficha - Editar')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar sub fichas' => route('sub_sheets.index'), 'Editar sub ficha' ))!!}
@endsection

@section('h5-title')
     <h5>Editar sub ficha</h5>
@endsection

@section('content')

    {!!
    form($form->add('edit','submit', [
        'attr' => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Salvar'
    ]))
    !!}

@endsection