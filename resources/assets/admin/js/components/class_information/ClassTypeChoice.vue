<template>
    <div>
        <div class="form-group">
            <label class="control-label">Selecionar tipos de alternativas</label>
            <select class="form-control" name="type_choices"></select>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th>Nome</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="type_choice in type_choices">
                    <td>
                        <button type="button" class="btn btn-sm btn-link" @click="destroy(type_choice)">
                            <span class="glyphicon glyphicon-trash"></span> Excluir
                        </button>
                    </td>
                    <td>{{type_choice.name}}</td>
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
        props: ['classInformation'], //para passar o id da Classe
        computed: {
            type_choices(){
                return store.state.classTypeChoice.type_choices;
            }
        },
        mounted(){ //invoca a action classTypeChoice/query, que busca os dados através de uma requisição Ajax e alimenta os dados dos Tipos de alternativas para que seja listado no componente
            store.dispatch('classTypeChoice/query', this.classInformation); //passo o módulo e depois a ação que desejo chamar
            $("select[name=type_choices]").select2({
                ajax: {
                    url: `${ADMIN_CONFIG.API_URL}/type_choices`,//a url do Ajax utiliza o serviço importado - type_choices vêm da rota definida no /routes/web.php no namespace da Api
                    dataType: 'json',
                    delay: 250,
                    data(params){
                        return {
                            q: params.term
                        }
                    },
                    processResults(data){
                        return {
                            //Com o método map eu posso alterar a posição de qualquer elemento dentro do array, isto quer dizer que, o método map percorre toda coleção e retorna apenas os campos que informamos na função
                            results: data.map((type_choice) => {
                                return {id: type_choice.id, text: type_choice.name}
                            })
                        }
                    }
                },
                minimumInputLength: 1,
            });
            let self = this;
                $("select[name=type_choices]").on('select2:select', event => {
                    store.dispatch('classTypeChoice/store', {
                        typeChoiceId: event.params.data.id,
                        classInformationId: self.classInformation
                    }).then(() => {
                        new PNotify({
                            title: 'Aviso',
                            text: 'Tipo de alternativa adicionado com sucesso!',
                            styling: 'brighttheme',
                            type: 'success'
                        });
                    });
                })
            },
            methods: {
                destroy(type_choice){
                    if(confirm('Deseja remover este tipo de alternativa?')){
                        store.dispatch('classTypeChoice/destroy', {
                            typeChoiceId: type_choice.id,
                            classInformationId: this.classInformation
                        }).then(() => {
                        new PNotify({
                            title: 'Aviso',
                            text: 'Tipo de alternativa deletado com sucesso!',
                            styling: 'brighttheme',
                            type: 'success'
                        });
                    });
                    }
                }
            }
        }
</script>

