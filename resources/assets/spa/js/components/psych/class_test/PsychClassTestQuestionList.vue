<template>
    <div>
        <div class="panel panel-default" v-for="(question,index) in classTest.questions">
            <div class="panel-heading">
                <button class="btn btn-warning btn-sm" @click.prevent="deleteQuestion(index)">
                    <span class="glyphicon glyphicon-trash"></span>
                </button>
                {{question.question}} - {{question.point}}
            </div>
            <div class="panel-body">
                <ol>
                    <li v-for="choice in question.choices">
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
                return this.$deepModel('psych.classTest.classTest')
            },

        },
        methods: {
            deleteQuestion(index){
                store.commit('psych/classTest/deleteQuestion',index);
            }
        }
    }
</script>