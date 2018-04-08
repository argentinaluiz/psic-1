<template>
    <div>
        <div class="panel panel-default" v-for="(question,index) in classTest.questions">
            <div class="panel-heading">
                <button class="btn btn-sm btn-primary" @click.prevent="editQuestion(question)">
                    <span class="glyphicon glyphicon-pencil"></span>
                </button>
                <button class="btn btn-sm btn-warning " @click.prevent="deleteQuestion(index)">
                    <span class="glyphicon glyphicon-trash"></span>
                </button>
                {{question.question}} - {{question.point}}
            </div>
            <div class="panel-body">
                <ol>
                    <li v-for="choice in question.choices">
                        <span class="glyphicon glyphicon-ok" v-if="choice['true']"></span>
                        {{choice.choice}}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import store from '../../../store/store';

    export default {
        computed: {
            classTest(){
                return this.$deepModel('patient.classTest.classTest')
            },

        },
        methods: {
            editQuestion(question){
                store.commit('patient/classTest/setQuestion',question);
            },
            deleteQuestion(index){
                store.commit('patient/classTest/deleteQuestion',index);
            }
        }
    }
</script>