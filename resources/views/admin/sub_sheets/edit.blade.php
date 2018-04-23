@extends('layouts.app')
@section('pag_title', 'Subficha - Editar')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar subfichas' => route('sub_sheets.index'), 'Editar subficha' ))!!}
@endsection

@section('h5-title')
     <h5>Editar subficha</h5>
@endsection

@section('content')

    {!!
    form($form->add('edit','submit', [
        'attr' => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Salvar'
    ]))
    !!}

@endsection