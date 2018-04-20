@extends('layouts.app')
@section('pag_title', 'Categorias - Tipos de alternativas')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar categorias' => route('class_informations.index'), 'administração de tipos de alternativas' ))!!}
@endsection

@section('h5-title')
     <h5>Administração de tipos de alternativas na categoria</h5>
@endsection

@section('content')
    <!-- Componente Vue.js -->
   
@endsection