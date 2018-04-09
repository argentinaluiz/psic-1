<template>
   <div class="col-md-12" v-if="question">
        <h3>Questão #{{questionIndex+1}}</h3>
        <div class="panel panel-default">
            <div class="panel-heading">
                {{question.question}} - {{question.point}}
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item" v-for="choice in question.choices">
                        <span class="glyphicon glyphicon-ok" v-if="choice['true']"></span>
                        {{choice.choice}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
    import store from '../../../store/store';

    export default {
        computed:{
            question(){
                return store.state.patient.classTest.question;
            },
            questionIndex(){
                return store.state.patient.classTest.questionIndex;
            }
        }
    }
</script>

