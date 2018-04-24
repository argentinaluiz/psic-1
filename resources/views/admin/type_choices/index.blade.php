@extends('layouts.app')
@section('pag_title', 'Tipos de Alternativas')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar tipos de alternativas' => route('type_choices.index')))!!}
@endsection

@section('h5-title')
     <h5>Listagem de tipos de alternativas</h5>
@endsection


@section('content')
    <span class="pull-right small text-muted">Total de tipos de alternativas: {{ $totalTypeChoices }} </span>
    <br/>
    {!! Button::primary(Icon::create('plus').' Novo tipo de alternativa')->asLinkTo(route('type_choices.create')) !!}
    <div class="cleaner_h15"></div>
        {!!
        Table::withContents($type_choices->items())
        ->striped()
        ->callback('Ações', function($field,$model){
            $linkEdit = route('type_choices.edit',['type_choice' => $model->id]);
            $linkShow = route('type_choices.show',['type_choice' => $model->id]);
            $linkChoosings = route('type_choices.choosings.index',['type_choice' => $model->id]);
            return Button::link(Icon::create('pencil').' Editar')->asLinkTo($linkEdit).'|'.
                Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow).'|'.
                Button::link(Icon::create('list-alt').'&nbsp;&nbsp;Alternativas')->asLinkTo($linkChoosings);
        })
        !!}
    <div class="cleaner_h15"></div>
    {!! $type_choices->links() !!}

@endsection