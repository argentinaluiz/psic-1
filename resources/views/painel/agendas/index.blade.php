@extends('layouts.app')
@section('pag_title', 'Agendas')

@section('breadcrumb')
    <h2>Agendas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar agendas' => route('agendas.index')))!!}	
@endsection

@section('h5-title')
     <h5>Listagem de agendamentos</h5>
@endsection

@section('content')
	<span class="pull-right small text-muted">Total de agendamentos: </span>
	<br/>
	@can('')
		<a class="btn btn-sm btn-primary" href=""><span class="glyphicon glyphicon-plus"></span> Adicionar</a>
	@endcan
	<div class="cleaner_h15"></div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Clínica</th>
            <th>Sala</th>
            <th>Psicanalista</th>
            <th>Número de sessões</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($agendas as $agenda)
            <tr>
                <td>{{ $agenda->clinic->name}}</td>
                <td>{{ $agenda->room->name}}</td>
                <td>{{ $agenda->psychoanalyst->name}}</td>
                <td>{{ $agenda->qty_sessions}}</td>
                <td>{{formatDateAndTime($agenda->date)}}</td>
                <td>{{formatDateAndTime($agenda->time, 'H:i')}}</td>
                <td>
                    <a title="Editar" href="{{route('agendas.edit',['agenda' => $agenda->id])}}"><span class="glyphicon glyphicon-pencil"></span> Editar</a> |
                    <a title="Ver" href="{{route('agendas.show',['agenda' => $agenda->id])}}"><span class="glyphicon glyphicon-folder-open"></span> Ver</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection