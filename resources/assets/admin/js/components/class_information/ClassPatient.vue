<template>
    <div>
        <div class="form-group">
            <label class="control-label">Selecionar paciente</label>
            <select class="form-control" name="patients"></select>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th></th>
                <th>Nome</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="patient in patients">
                    <td>Excluir</td>
                    <td>{{patient.user.name}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>


<script>
    import ADMIN_CONFIG from '../../services/adminConfig';
    import store from '../../store/store';
    export default {
        props: ['classInformation'], //para passar o id da Classe
        computed: {
            patients(){
                return store.state.classPatient.patients;
            }
        },
        mounted(){
            store.dispatch('classPatient/query', this.classInformation);
            
        }
    }
</script>

