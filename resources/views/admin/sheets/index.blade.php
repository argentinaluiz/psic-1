@extends('layouts.app')
@section('pag_title', 'Fichas')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar fichas' => route('sheets.index')))!!}
@endsection

@section('h5-title')
     <h5>Listagem de fichas</h5>
@endsection


@section('content')
    <span class="pull-right small text-muted">Total de fichas: {{ $totalSheets }} </span>
    <br/>
    {!! Button::primary(Icon::create('plus').' Nova ficha')->asLinkTo(route('sheets.create')) !!}
    <div class="cleaner_h15"></div>
        {!!
        Table::withContents($sheets->items())
        ->striped()
        ->callback('Ações', function($field,$model){
            $linkEdit = route('sheets.edit',['sheet' => $model->id]);
            $linkShow = route('sheets.show',['sheet' => $model->id]);
            return Button::link(Icon::create('pencil').' Editar')->asLinkTo($linkEdit).'|'.
                Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
        })
        !!}
    <div class="cleaner_h15"></div>
    {!! $sheets->links() !!}

@endsection