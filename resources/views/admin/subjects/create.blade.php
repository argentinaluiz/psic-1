@extends('layouts.app')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar patologias' => route('subjects.index'), 'Nova patologia' ))!!}
@endsection

@section('h5-title')
     <h5>Nova patologia</h5>
@endsection

@section('content')
   
    {!!
    form($form->add('insert','submit', [
        'attr' => ['class' => 'btn btn-primary btn-block'],
        'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Inserir'
    ]))
    !!}

@endsection