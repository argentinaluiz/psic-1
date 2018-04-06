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
                    <th>Verd.?</th>
                    <th>Alternativa</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="choice in question.choices">
                    <td></td>
                    <td></td>
                    <td>
                        <textarea class="form-control" v-model="choice.choice"></textarea>
                    </td>
                </tr>
            </tbody>

        </table>


        <button class="btn btn-sm btn-success btn-block">Adicionar</button>
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
        }
    }
</script>