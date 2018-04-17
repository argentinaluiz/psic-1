@extends('layouts.app')
@section('pag_title', 'Produto - Galeria')

@section('breadcrumb')
    <h2>Produtos</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar produtos' => route('products.index'), 'Galeria' ))!!}
@endsection

@section('h5-title')
     <h5>Editar Galeria</h5>
@endsection

@section('content')
	<form action="{{ route('products.gallery.update',$registro) }}" class="form-horizontal" method="post">
		{{csrf_field()}}
		{{ method_field('PUT') }}
		<div class="form-group"><label class="col-sm-2 control-label">Imagem</label>
			<div class="col-sm-10">
				<img width="50" src="{{ $registro->url }}">
			</div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">Título</label>
			<div class="col-sm-10">
				<input type="text" name="title" class="form-control" value="{{ isset($registro->title) ? $registro->title : '' }}{{old('title')}}">
			</div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">Descrição</label>
			<div class="col-sm-10">
			<input type="text" name="description" class="form-control" value="{{ isset($registro->description) ? $registro->description : '' }}{{old('description')}}">
			</div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">URL</label>

			<div class="col-sm-10">
				<input type="text" disabled="" name="url" class="form-control" value="{{ isset($registro->url) ? $registro->url : '' }}{{old('url')}}">
			</div>
		</div>
		<div class="form-group"><label class="col-sm-2 control-label">Ordem</label>

			<div class="col-sm-10">
				<input type="text" name="order" class="form-control" value="{{ isset($registro->order) ? $registro->order : '' }}{{old('order')}}">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<button class="btn btn-sm btn-block btn-primary" type="submit">Atualizar</button>
			</div>
		</div>
	</form>
@endsection
