@extends('layouts.app')
@section('pag_title', 'Subcategoria - adicionar')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar categorias' => route('class_informations.index'), 'Nova subcategoria e psicanalista' ))!!}
@endsection

@section('h5-title')
     <h5>Adicionar subcategoria e psicanalista na categoria</h5>
@endsection


@section('content')

    <class-meeting class-information="{{$class_information->id}}"></class-meeting>

@endsection