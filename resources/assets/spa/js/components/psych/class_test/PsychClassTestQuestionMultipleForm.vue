<template>
    <form class="form-horizontal" @submit.prevent="addQuestion">
        <div class="form-group">
            <label for="question" class="col-sm-2 control-label">Questão</label>
            <div class="col-sm-6">
                <textarea  name="question" id="question" class="form-control" v-model="question.question" > </textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="point" class="col-sm-2 control-label">Pontos</label>
            <div class="col-sm-6"><input  id="point" name="point" class="form-control" v-model="question.point"></div>
        </div>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th style="width: 10px">Selec.?</th>
                    <th>Tipos de Alternativa</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a class="btn btn-warning btn-sm" href="#" @click.prevent="deleteChoice(index)">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                    <td>
                        <!-- ver com o professor em que tabela e campo devo guardar se está ou não selecionado. Fazer as alterações abaixo, no Model e no Método -->
                        <input type="radio" name="" value="">
                    </td>
                    <td>
                        <!-- aqui chama os tipos de alternativas -->
                    </td>
                </tr>
            </tbody>

        </table>
        <button class="btn btn-sm btn-primary btn-block">Adicionar</button>
    </form>
</template>

<script type="text/javascript">
    import store from '../../../store/store';

    export default {
        computed: {
            question(){
                return this.$deepModel('psych.classTest.question')
            }

        },
        mounted() {
           
        },
        methods: {
            addQuestion() {
                store.commit('psych/classTest/addQuestion');
            },
            addChoice(){
                store.commit('psych/classTest/addChoice');
            },
            deleteChoice(index){
                store.commit('psych/classTest/deleteChoice',index);
            },
            uncheck(choice){
               store.commit('psych/classTest/setChoiceTrue',choice);
            }
        }
    }
</script>