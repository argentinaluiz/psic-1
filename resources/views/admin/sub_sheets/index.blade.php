@extends('layouts.app')
@section('pag_title', 'Sub Fichas')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar sub fichas' => route('sub_sheets.index')))!!}
@endsection

@section('h5-title')
     <h5>Listagem de sub fichas</h5>
@endsection


@section('content')
    <span class="pull-right small text-muted">Total de sub fichas: {{ $totalSubSheets }} </span>
    <br/>
    {!! Button::primary(Icon::create('plus').' Nova sub ficha')->asLinkTo(route('sub_sheets.create')) !!}
    <div class="cleaner_h15"></div>
        {!!
        Table::withContents($sub_sheets->items())
        ->striped()
        ->callback('Ações', function($field,$model){
            $linkEdit = route('sub_sheets.edit',['sub_sheet' => $model->id]);
            $linkShow = route('sub_sheets.show',['sub_sheet' => $model->id]);
            return Button::link(Icon::create('pencil').' Editar')->asLinkTo($linkEdit).'|'.
                Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
        })
        !!}
    <div class="cleaner_h15"></div>
    {!! $sub_sheets->links() !!}

@endsection