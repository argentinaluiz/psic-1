@extends('layouts.app')
@section('pag_title', 'Ver Subficha')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar subfichas' => route('sub_sheets.index'), 'Detalhes da subficha' ))!!}
@endsection

@section('h5-title')
     <h5>Ver subficha</h5>
@endsection


@section('content')
    @php
        $linkEdit = route('sub_sheets.edit',['sub_sheet' => $sub_sheet->id]);
        $linkDelete = route('sub_sheets.destroy',['sub_sheet' => $sub_sheet->id]);
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
            <td>{{$sub_sheet->id}}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{$sub_sheet->name}}</td>
        </tr>
        </tbody>
    </table>

@endsection
