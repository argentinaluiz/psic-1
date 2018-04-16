@extends('layouts.app')
@section('pag_title', 'Slides')

@section('breadcrumb')
    <h2>Slides</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar slides' => route('slides.index') ))!!}
@endsection

@section('h5-title')
     <h5>Lista de Slides</h5>
@endsection

@section('content')
	<div class="cleaner_h15"></div>
	@can('slides-create')
		<a class="btn btn-sm btn-primary" href="{{route('slides.create') }}"><span class="glyphicon glyphicon-plus"></span> Criar novo</a>
	@endcan
	<div class="cleaner_h15"></div>

	    {!!
            Table::withContents($slides->items())
            ->striped()
            ->callback('Ações', function($field,$model){
                $linkEdit = route('slides.edit',['slide' => $model->id]);
                $linkShow = route('slides.show',['slides' => $model->id]);
                
                return  Button::link(Icon::create('pencil').' Editar')->asLinkTo($linkEdit).'&nbsp;&nbsp'.'|'.'&nbsp;&nbsp'.
                        Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
            })
        !!}
    <div class="cleaner_h15"></div>
    {!! $slides->links() !!}

@endsection
