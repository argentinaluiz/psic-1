@extends('layouts.app')
@section('pag_title', 'Ver Alternativas')

@section('breadcrumb')
    <h2>Perguntas</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar alternativas' => route('list_choices.index'), 'Detalhes da alternativa' ))!!}
@endsection

@section('h5-title')
     <h5>Ver tipos de alternativas</h5>
@endsection


@section('content')
    @php
        $linkEdit = route('list_choices.edit',['list_choice' => $list_choice->id]);
        $linkDelete = route('list_choices.destroy',['list_choice' => $list_choice->id]);
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
            <td>{{$list_choice->id}}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{$list_choice->name}}</td>
        </tr>
        </tbody>
    </table>

@endsection
