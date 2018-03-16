<template>
    <div>
        <div class="form-group">
            <label class="control-label">Selecionar paciente</label>
            <select class="form-control" name="patients"></select>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th>Nome</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="patient in patients">
                    <td>
                        <button type="button" class="btn btn-sm btn-link" @click="destroy(patient)">
                            <span class="glyphicon glyphicon-trash"></span> Excluir
                        </button>
                    </td>
                    <td>{{patient.user.name}}</td>
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
            patients(){
                return store.state.classPatient.patients;
            }
        },
        mounted(){ //invoca a action classPatient/query, que busca os dados através de uma requisição Ajax e alimenta os dados de pacientes para que seja listado no componente
            store.dispatch('classPatient/query', this.classInformation); //passo o módulo e depois a ação que desejo chamar
            $("select[name=patients]").select2({
                ajax: {
                    url: `${ADMIN_CONFIG.API_URL}/patients`,
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
                            results: data.map((patient) => {
                                return {id: patient.id, text: patient.user.name}
                            })
                        }
                    }
                },
                minimumInputLength: 1,
            });
            let self = this;
                $("select[name=patients]").on('select2:select', event => {
                    store.dispatch('classPatient/store', {
                        patientId: event.params.data.id,
                        classInformationId: self.classInformation
                    }).then(() => {
                        new PNotify({
                            title: 'Aviso',
                            text: 'Paciente adicionado com sucesso!',
                            styling: 'brighttheme',
                            type: 'success'
                        });
                    });
                })
            },
            methods: {
                destroy(patient){
                    if(confirm('Deseja remover este paciente?')){
                        store.dispatch('classPatient/destroy', {
                            patientId: patient.id,
                            classInformationId: this.classInformation
                        }).then(() => {
                        new PNotify({
                            title: 'Aviso',
                            text: 'Paciente deletado com sucesso!',
                            styling: 'brighttheme',
                            type: 'success'
                        });
                    });
                    }
                }
            }
        }
</script>

