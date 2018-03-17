@extends('layouts.app')
@section('pag_title', 'Patologias')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar Patologias' => route('subjects.index')))!!}
@endsection

@section('h5-title')
     <h5>Listagem de patologias</h5>
@endsection


@section('content')
    <span class="pull-right small text-muted">Total de patologias: {{ $totalSubjects }} </span>
    <br/>
    {!! Button::primary(Icon::create('plus').' Nova patologia')->asLinkTo(route('subjects.create')) !!}
    <div class="cleaner_h15"></div>
        {!!
        Table::withContents($subjects->items())
        ->striped()
        ->callback('Ações', function($field,$model){
            $linkEdit = route('subjects.edit',['subject' => $model->id]);
            $linkShow = route('subjects.show',['subject' => $model->id]);
            return Button::link(Icon::create('pencil').' Editar')->asLinkTo($linkEdit).'|'.
                Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
        })
        !!}
    <div class="cleaner_h15"></div>
    {!! $subjects->links() !!}

@endsection