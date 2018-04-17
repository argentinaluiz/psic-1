@extends('layouts.app')
@section('pag_title', 'Imagem - Editar')

@section('breadcrumb')
    <h2>Bibliotecas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar imagens' => route('imagens.index'), 'Editar Imagem' ))!!}
@endsection

@section('h5-title')
     <h5>Editar imagem</h5>
@endsection

@section('content')

    @include('form._form_errors')
	
	<div class="row">
		<div class="col-sm-12">
			<form class="form-horizontal" role="form" action="{{ route('imagens.update',$registro->id) }}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
                {{ method_field('PUT') }}
				<div class="form-group">
                    <label class="col-sm-2 control-label">Título</label> 
                     <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" value="{{ isset($registro->title) ? $registro->title : '' }}">
                    </div> 
				</div>
				<div class="form-group">
                    <label class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-10">
                        <input type="text" name="description" class="form-control" value="{{ isset($registro->description) ? $registro->description : '' }}">
                    </div>  
				</div>
				 <div class="form-group">
                    <label class="col-sm-2 control-label">Imagem</label>
                    <div class="col-sm-10">
                        <input type="file" name="imagem">
                    </div> 
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text">
					</div>
                </div>
				<button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Atualizar</button>
				
				<h3>Tamanhos gerados</h3>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="widget">
                            <img class="img-responsive" src="{{$registro->pequenaUrl()}}">
                            <div class="cleaner_h15"></div>
                            <p class="font-bold no-margins"> Pequena</p>
                            <p>{{config('app.imagemPequena')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="widget">
                            <img class="img-responsive" src="{{$registro->galeriaUrl()}}">
                            <div class="cleaner_h15"></div>
                            <p class="font-bold no-margins"> Galeria</p>
                            <p>{{config('app.imagemGaleria')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="widget">
                            <img class="img-responsive" src="{{$registro->slideUrl()}}">
                            <div class="cleaner_h15"></div>
                            <p class="font-bold no-margins"> Slide</p>
                            <p>{{config('app.imagemSlide')}}</p>
                        </div>
                    </div>
                </div>

			</form>
		</div>
	</div>

@endsection