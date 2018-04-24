<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">Selecionar alternativa</label>
                    <select class="form-control" name="list_choices"></select>
                </div>
            </div>
        </div>
        <button class="btn btn-sm btn-primary" @click="store()">Adicionar</button>
        <br/><br/>
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th>Alternativa</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="choosing in choosings">
                <td>
                    <button type="button" class="btn btn-sm btn-link" @click="destroy(choosing)">
                        <span class="glyphicon glyphicon-trash"></span> Excluir
                    </button>
                </td>
                <td>{{choosing.list_choice.name}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import ADMIN_CONFIG from '../../services/adminConfig';
    import store from '../../store/store';
    import 'select2';

    export default {
        props: ['typeChoice'],
        computed: {
            choosings(){
                return store.state.classChoosing.choosings;
            }
        },
        mounted(){
            store.dispatch('classChoosing/query', this.typeChoice);
            let selects = [
                {
                    url: `${ADMIN_CONFIG.API_URL}/list_choices`,
                    selector:"select[name=list_choices]",
                    processResults(data){
                        return {
                            results: data.map((list_choice) => {
                                return {id: list_choice.id, text: list_choice.name}
                            })
                        }
                    }
                }
            ];
            //funciona apenas no padrão ES6
            for(let item of selects){
                $(item.selector).select2({
                    ajax: {
                        url: item.url,
                        dataType: 'json',
                        delay: 250,
                        data(params){
                            return {
                                q: params.term
                            }
                        },
                        processResults: item.processResults
                    },
                    minimumInputLength: 1,
                });
            }
        },
        methods: {
            destroy(choosing){
                if(confirm('Deseja remover esta alternativa?')){
                   store.dispatch('classChoosing/destroy', {
                        choosingId: choosing.id,
                        typeChoiceId: this.typeChoice
                    }).then(response => {
                        new PNotify({
                            title: 'Aviso',
                            text: 'Alternativa deletada com sucesso!',
                            styling: 'brighttheme',
                            type: 'success'
                        });
                    })
                }
            },
            store(){
                store.dispatch('classChoosing/store',{
                    listChoiceId: $("select[name=list_choices]").val(),
                    typeChoiceId: this.typeChoice
                }).then(response => {
                    new PNotify({
                        title: 'Aviso',
                        text: 'Alternativa adicionada com sucesso!',
                        styling: 'brighttheme',
                        type: 'success'
                    });
                })
            }
        }
    }
</script>
