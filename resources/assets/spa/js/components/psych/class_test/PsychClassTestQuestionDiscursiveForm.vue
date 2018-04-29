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
                    <th>Resposta</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <!-- aqui vai o campo text-area da resposta -->
                        <textarea  name="text" disabled placeholder="Entrada de dados disativada aqui..." id="text" class="form-control"> </textarea>
                    </td>
                </tr>
            </tbody>
            <div class="cleaner_h10"></div>
             <button class="btn btn-sm btn-primary btn-block">Adicionar</button>
        </table>
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
            }
        }
    }
</script>