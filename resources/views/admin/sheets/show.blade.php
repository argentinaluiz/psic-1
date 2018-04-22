@extends('layouts.app')
@section('pag_title', 'Ver Ficha')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar fichas' => route('sheets.index'), 'Detalhes da ficha' ))!!}
@endsection

@section('h5-title')
     <h5>Ver ficha</h5>
@endsection


@section('content')
    @php
        $linkEdit = route('sheets.edit',['sheet' => $sheet->id]);
        $linkDelete = route('sheets.destroy',['sheet' => $sheet->id]);
    @endphp
    {!! Button::primary(Icon::pencil().' Editar')->asLinkTo($linkEdit) !!}
    {!!
    Button::danger(Icon::remove().' Excluir')->asLinkTo($linkDelete)
        ->addAttributes([
            'onclick' => 'event.preventDefault();if(confirm("Deseja excluir?")){document.getElementById("form-delete").submit();}'
        ])
    !!}
    @php
        $formDelete = FormBuilder::plain([
            'id' => 'form-delete',
            'url' => $linkDelete,
            'method' => 'DELETE',
            'style' => 'display:none'
        ])
    @endphp
    {!! form($formDelete) !!}
    <br/><br/>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">ID</th>
            <td>{{$sheet->id}}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{$sheet->name}}</td>
        </tr>
        </tbody>
    </table>

@endsection
