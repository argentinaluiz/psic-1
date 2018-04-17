@component('form._form_group',['field' => 'name'])
    {{ Form::label('name','Nome',['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
    	{{ Form::text('name',null,['class' => 'form-control']) }}
    </div> 
@endcomponent

@component('form._form_group',['field' => 'description'])
    {{ Form::label('description', 'Descrição',['class' => 'col-sm-2 control-label']) }}
     <div class="col-sm-10">
    	{{ Form::text('description', null,['class' => 'form-control'])}}
    </div> 
@endcomponent