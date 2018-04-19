@extends('layouts.app')
@section('pag_title', 'Alternativas')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar alternativas' => route('list_choices.index')))!!}
@endsection

@section('h5-title')
     <h5>Listagem de alternativas</h5>
@endsection


@section('content')
    <span class="pull-right small text-muted">Total de alternativas: {{ $totalListChoices }} </span>
    <br/>
    {!! Button::primary(Icon::create('plus').' Nova alternativa')->asLinkTo(route('list_choices.create')) !!}
    <div class="cleaner_h15"></div>
        {!!
        Table::withContents($list_choices->items())
        ->striped()
        ->callback('Ações', function($field,$model){
            $linkEdit = route('list_choices.edit',['list_choice' => $model->id]);
            $linkShow = route('list_choices.show',['list_choice' => $model->id]);
            return Button::link(Icon::create('pencil').' Editar')->asLinkTo($linkEdit).'|'.
                Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
        })
        !!}
    <div class="cleaner_h15"></div>
    {!! $list_choices->links() !!}

@endsection