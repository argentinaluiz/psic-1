@extends('layouts.app')
@section('pag_title', 'Alternativas - adicionar')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar alternativas' => route('type_choices.index'), 'Nova alternativa' ))!!}
@endsection

@section('h5-title')
     <h5>Adicionar alternativa no tipo de alternativa</h5>
@endsection


@section('content')

    <class-choosing type-choice="{{$type_choice->id}}"></class-choosing>

@endsection