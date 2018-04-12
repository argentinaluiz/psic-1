@extends('layouts.app')
@section('pag_title', 'Classes - Mostrar')

@section('breadcrumb')
    <h2>Configurações</h2>
    {!! Breadcrumb::withLinks(array('Home' => '/', 'Listar classes' => route('class_informations.index'), 'Detalhes da classe' ))!!}
@endsection

@section('h5-title')
     <h5>Ver classe</h5>
@endsection

@section('content')
    @php
        $linkEdit = route('class_patients.edit',['class_patients' => $class_patient->id]);
        $linkDelete = route('class_patients.destroy',['class_patients' => $class_patient->id]);
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
            <td>{{$class_patient->id}}</td>
        </tr>
        <tr>
            <th scope="row">Data Início</th>
            <td>{{$class_patient->date_start->format('d/m/Y')}}</td>
        </tr>
        <tr>
            <th scope="row">Data Fim</th>
            <td>{{$class_patient->date_start->format('d/m/Y')}}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{$class_patient->name}}</td>
        </tr>
        <tr>
            <th scope="row">Semester</th>
            <td>{{$class_patient->year}}</td>
        </tr>
        </tbody>
    </table>

@endsection
